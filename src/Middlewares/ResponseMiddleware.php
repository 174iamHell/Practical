<?php

namespace App\Middlewares;

use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\MiddlewareInterface;

final class ResponseMiddleware  implements MiddlewareInterface
{
    public function call(Micro $application): void
    {
        $content = $application->getReturnedValue();

        if (!is_string($content) || !json_validate($content)) {
            $content = json_encode($content);
        }

        $application->response->setContentType('application/json')
            ->setContent($content)
            ->send();
    }
}
