<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Carts;
use App\Models\OrderProducts;
use App\Models\Orders;
use App\Models\Products;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Micro\Collection as MicroCollection;

final class OrderProductsController extends Controller
{
    public static function routes(): MicroCollection
    {
        $collection = new MicroCollection();
        $collection->setHandler(new self()); // Используем текущий класс
        $collection->setPrefix('/orderProducts');

        $collection->get('/', 'index');          // GET /products
        $collection->post('/add/{id}', 'create');     // POST /products/add
        $collection->get('/delete/{id}', 'delete'); // GET /products/delete/1
        $collection->post('/update', 'update');


        return $collection;
    }

    public function index(): string
    {
        $categories = OrderProducts::find();
        return json_encode($categories);
    }

    public function create($id)
    {
        $userId = (int)$id;

        $cartItems = $this->modelsManager->createBuilder()
            ->columns([
                'p.id as product_id',
                'p.price'
            ])
            ->from(['c' => Carts::class])
            ->innerJoin(Products::class, 'c.product_id = p.id', 'p')
            ->where("c.user_id = :id:", [
                'id' => $userId
            ])
            ->getQuery()
            ->execute();

        $this->db->begin();

        $order = new Orders();
        $order->user_id = $userId;
        $order->create();

        foreach ($cartItems as $item) {


            $orderProduct = new OrderProducts();
            $orderProduct->order_id   = (int)$order->id;
            $orderProduct->product_id = (int)$item->product_id;
            $orderProduct->price      = (float)$item->price;

            if (!$orderProduct->create()) {
                $errors = [];
                foreach ($orderProduct->getMessages() as $message) {
                    $errors[] = $message->getMessage();
                }
                $this->db->rollback();
                return $errors;
            }
        }
        $this->db->commit();
        return "Заказ успешно создан!";
    }
}
