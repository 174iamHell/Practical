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
        $collection->setPrefix('/OrderProducts');

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
        $userId = $id;

        $cartItems = $this->modelsManager->createBuilder()
            ->columns([
                'p.id as product_id',
                'p.price',
            ])
            ->from(['c' => Carts::class])
            ->innerJoin(Products::class, 'c.product_id = p.id', 'p')
            ->where("c.user_id", [
                'id' => $userId
            ])
            ->getQuery()
            ->execute();

        $this->db->begin();

        $order = new Orders();
        $order->user_id = $userId;
        $order->create();

        // 4. Цикл по товарам из корзины
        foreach ($cartItems as $item) {
            for ($i = 0; $i < $item->quantity; $i++) {
                $orderProduct = new OrderProducts();
                $orderProduct->order_id   = $order->id;
                $orderProduct->product_id = $item->product_id;
                $orderProduct->price      = $item->price;

                if (!$orderProduct->create()) {
                    $this->db->rollback();
                }
            }
        }
        // Надо удалить из корзины товары

        $this->db->commit();
        echo "Заказ успешно создан!";
    }
}
