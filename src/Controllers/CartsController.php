<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Request\CartsUpdateRequest;
use App\Models\Carts;
use App\Request\CartsCreateRequest;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Micro\Collection as MicroCollection;

final class CategoriesController extends Controller
{
    public static function routes(): MicroCollection
    {
        $collection = new MicroCollection();
        $collection->setHandler(new self()); // Используем текущий класс
        $collection->setPrefix('/carts');

        $collection->get('/', 'index');          // GET /products
        $collection->post('/add', 'create');     // POST /products/add
        $collection->get('/delete/{id}', 'delete'); // GET /products/delete/1
        $collection->post('/update', 'update');


        return $collection;
    }

    public function index(): string
    {
        $carts = Carts::find();
        return json_encode($carts);
    }

    public function create()
    {
        $validate = new CartsCreateRequest();

        $carts = new Carts();

        $json = $this->request->getJsonRawBody();

        if ($validate->validate($json)) {
            $carts->name = $json->name;

            $carts->create();
        }
    }

    public function delete($id): void
    {
        $carts = Carts::findFirstById($id);
        $carts->delete();
    }

    public function update(): void
    {
        $validate = new CartsUpdateRequest();

        $json = $this->request->getJsonRawBody();

        if ($validate->validate($json)) {
            $carts = Carts::findFirstById($json->id);
            $carts->name = $json->name;
            $carts->update();
        }
    }
}
