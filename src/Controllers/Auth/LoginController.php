<?php

declare(strict_types=1);

namespace App\Controllers\Auth;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Micro\Collection as MicroCollection;

class LoginController extends Controller
{
    public static function routes(): MicroCollection
    {
        $collection = new MicroCollection();
        $collection->setHandler(new self()); // Используем текущий класс
        $collection->setPrefix('/auth');

        $collection->post('/login', 'login'); // POST /auth/login

        return $collection;
    }

    // public function onConstruct()
    // {
    //     $this->auth->access("guest");
    // }

    public function loginAction()
    {
        var_dump(123);
        // $credentials = [
        //     'email' => $this->request->getJsonRawBody()->email,
        //     'password' => $this->request->getJsonRawBody()->password
        // ];

        // $this->auth->claims(['aud' => [
        //     $this->request->getURI()
        // ]]);

        // if (! $token = $this->auth->attempt($credentials)) {
        //     return $this->response->setJsonContent(['error' => 'Unauthorized'])->send();
        // }

        // return $this->respondWithToken($token);
    }

    // public function meAction()
    // {
    //     $this->response->setJsonContent($this->auth->user())->send();
    // }

    // public function logoutAction()
    // {
    //     $this->auth->logout();

    //     $this->response->setJsonContent(['message' => 'Successfully logged out'])->send();
    // }

    // public function refreshAction()
    // {
    //     return $this->respondWithToken($this->auth->refresh());
    // }

    // protected function respondWithToken($token)
    // {
    //     $this->response->setJsonContent($token->toResponse())->send();
    // }
}
