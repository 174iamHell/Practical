<?php

namespace App\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Micro\Collection as MicroCollection;
use App\Model\Products; // ОБЯЗАТЕЛЬНО импортируем модель

final class ProductsController extends Controller
{
    public static function routes(): MicroCollection
    {
        $collection = new MicroCollection();
        $collection->setHandler(new self()); // Используем текущий класс
        $collection->setPrefix('/categories');

        $collection->get('/', 'index');          // GET /products
        $collection->post('/add', 'create');     // POST /products/add
        $collection->get('/delete/{id}', 'delete'); // GET /products/delete/1

        return $collection;
    }

    public function index()
    {
        $created_at = Products::find();
        return json_encode($created_at);
    }

    public function create()
    {
        $created_at = new Products();
        // Берем данные из POST-запроса
        $created_at->Name = $this->request->getPost('name');

        if ($created_at->save()) {
            return json_encode(['status' => 'Success! Product saved in DB']);
        } else {
            return json_encode(['status' => 'Error', 'messages' => $created_at->getMessages()]);
        }
    }

    public function delete($id)
    {
        $created_at = Products::findFirstById($id);
        if ($created_at && $created_at->delete()) {
            return json_encode(['status' => 'Deleted!']);
        }
        return json_encode(['status' => 'Not found']);
    }
}
