<?php

declare(strict_types=1);

namespace App\Controllers;
use App\Request\CategoriesUpdateRequest;
use App\Request\CategoriesCreateRequest;
use App\Models\Categories;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Micro\Collection as MicroCollection;

final class CategoriesController extends Controller
{
    public static function routes(): MicroCollection
    {
        $collection = new MicroCollection();
        $collection->setHandler(new self()); // Используем текущий класс
        $collection->setPrefix('/categories');

        $collection->get('/', 'index');          // GET /products
        $collection->post('/add', 'create');     // POST /products/add
        $collection->get('/delete/{id}', 'delete'); // GET /products/delete/1
        $collection->post('/update','update');
        

        return $collection;
    }

    public function index():string
    {
        $categories = Categories::find();
        return json_encode($categories);
    }

    public function create()
    {
        $validate = new CategoriesCreateRequest();
        $categories = new Categories();

        $json = $this->request->getJsonRawBody();

        if($validate->validate($json))
        {
            $categories->name = $json->name;

            $categories->create();
        }
        else{
            $validate->errorOutput();
        }
        
    }

    public function delete($id):string
    {
        $categories = Categories::findFirstById($id);
        if ($categories && $categories->delete()) {
            return json_encode(['status' => 'Deleted!']);
        }
        return json_encode(['status' => 'Not found']);
    }

    public function update():void
    {
        $validate = new CategoriesUpdateRequest();

        $json = $this->request->getJsonRawBody();

        if($validate->validate($json)){
            $categories = Categories::findFirstById($json->id);
            $categories->name = $json->name;
            $categories->update();
        }
        
    }

   
}
