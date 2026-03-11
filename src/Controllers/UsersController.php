<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\UsersProducts;
use App\Models\Users;
use App\Request\UsersCreateRequest;
use App\Request\UsersUpdateRequest;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Micro\Collection as MicroCollection;

final class UsersController extends Controller
{
    public static function routes(): MicroCollection
    {
        $collection = new MicroCollection();
        $collection->setHandler(new self()); // Используем текущий класс
        $collection->setPrefix('/users');

        $collection->get('/', 'index');          // GET /products
        $collection->post('/add', 'create');     // POST /products/add
        $collection->get('/delete/{id}', 'delete'); // GET /products/delete/1
        $collection->post('/update', 'update');


        return $collection;
    }

    public function index(): string
    {
        $products = Users::find();
        return json_encode($products);
    }

    public function create(): string
    {
        $validate = new UsersCreateRequest;

        $json = $this->request->getJsonRawBody();
        if ($validate->validate($json)) {

            $products = new Users();

            $products->name =  $json->name;
            $products->create();

            return json_encode(['success' => true]);
        }

        return $validate->errorOutput();
    }

    public function delete($id): string
    {
        $products = Users::findFirst($id);
        if ($products && $products->delete()) {
            return json_encode(['status' => 'Deleted!']);
        }
        return json_encode(['status' => 'Not found']);
    }

    public function update(): string
    {
        $validate = new UsersUpdateRequest();

        $json = $this->request->getJsonRawBody();

        if ($validate->validate($json)) {
            $user = Users::findFirstById($json->id);
            $user->brand_id = $json->brand_id;
            $user->price = $json->price;
            $user->mnp = $json->mnp;
            $user->name = $json->name;

            $user->update();
        }

        return $validate->errorOutput();
    }
}
