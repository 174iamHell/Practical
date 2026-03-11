<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Orders;
use App\Request\OrdersCreateRequest;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Micro\Collection as MicroCollection;

final class OrdersController extends Controller
{
    public static function routes(): MicroCollection
    {
        $collection = new MicroCollection();
        $collection->setHandler(new self());
        $collection->setPrefix('/orders');

        $collection->get('/', '/index');
        $collection->post('/add', 'create');

        return $collection;
    }

    public function index(): string
    {
        $orders = Orders::find();
        return json_encode($orders);
    }

    public function create()
    {
        $validate = new OrdersCreateRequest();
        $orders = new Orders();

        $json = $this->request->getJsonRawBody();

        if ($validate->validate($json)) {
            $orders->user_id = $json->user_id;
            $orders->create();
        }
    }
}
