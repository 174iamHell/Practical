<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\CategoriesProducts;
use App\Models\Products;
use App\Request\ProductsCreateRequest;
use App\Request\ProductsUpdateRequest;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Micro\Collection as MicroCollection;

final class ProductsController extends Controller
{
    public static function routes(): MicroCollection
    {
        $collection = new MicroCollection();
        $collection->setHandler(new self()); // Используем текущий класс
        $collection->setPrefix('/products');

        $collection->get('/', 'index');          // GET /products
        $collection->post('/add', 'create');     // POST /products/add
        $collection->get('/delete/{id}', 'delete'); // GET /products/delete/1
        $collection->post('/update', 'update');


        return $collection;
    }

    public function index(): string
    {
        $products = Products::find();
        return json_encode($products);
    }

    public function create()
    {
        $validate = new ProductsCreateRequest;

        $json = $this->request->getJsonRawBody();
        if ($validate->validate($json)) {
            $products = new Products();
            $products->name =  $json->name;
            $products->mpn = $json->mnp;
            $products->brand_id = $json->brand_id;
            $products->price = $json->price;
            if ($products->create()) {
                return $this->response->setJsonContent(['status' => 'Created!']);
            }

            // 1. Извлекаем реальные ошибки из модели
            $errors = [];
            foreach ($products->getMessages() as $message) {
                $errors[] = $message->getMessage();
            }
            return $errors;
        } else {
            return $validate->errorOutput();
        }
    }

    public function delete($id): string
    {
        $products = Products::findFirstById($id);
        if ($products && $products->delete()) {
            return json_encode(['status' => 'Deleted!']);
        }
        return json_encode(['status' => 'Not found']);
    }

    public function update(): void
    {
        $validate = new ProductsUpdateRequest();

        $json = $this->request->getJsonRawBody();

        if ($validate->validate($json)) {
            $product = Products::findFirstById($json->id);
            $product->brand_id = $json->brand_id;
            $product->price = $json->price;
            $product->mnp = $json->mnp;
            $product->name = $json->name;
        }
    }
}
