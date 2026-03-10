<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Request\BrandsUpdateRequest;
use App\Request\BrandsCreateRequest;
use App\Models\Brands;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Micro\Collection as MicroCollection;

final class CategoriesController extends Controller
{
    public static function routes(): MicroCollection
    {
        $collection = new MicroCollection();
        $collection->setHandler(new self()); // Используем текущий класс
        $collection->setPrefix('/brands');

        $collection->get('/', 'index');          // GET /products
        $collection->post('/add', 'create');     // POST /products/add
        $collection->get('/delete/{id}', 'delete'); // GET /products/delete/1
        $collection->post('/update','update');
        

        return $collection;
    }

    public function index():string
    {
        $brands = Brands::find();
        return json_encode($brands);
    }

    public function create()
    {
        $validate = new BrandsCreateRequest();
        $brands = new Brands();

        $json = $this->request->getJsonRawBody();

        if($validate->validate($json))
        {
            $brands->name = $json->name;

            $brands->create();
        }
        else{
            $validate->errorOutput();
        }
        
    }

    public function delete($id):string
    {
        $brands = Brands::findFirstById($id);
        if ($brands && $brands->delete()) {
            return json_encode(['status' => 'Deleted!']);
        }
        return json_encode(['status' => 'Not found']);
    }

    public function update():void
    {
        $validate = new BrandsUpdateRequest();

        $json = $this->request->getJsonRawBody();

        if($validate->validate($json)){
            $brands = Brands::findFirstById($json->id);
            $brands->name = $json->name;
            $brands->update();
        }
       
    }


   
}
