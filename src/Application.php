<?php
declare(strict_types=1);

namespace App;

use Cake\Core\Configure;
use Cake\Core\ContainerInterface;
use Cake\Datasource\FactoryLocator;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Http\Middleware\BodyParserMiddleware;
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Http\MiddlewareQueue;
use Cake\ORM\Locator\TableLocator;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;
use Kaz29\CakePhpCors\Middleware\CorsMiddleware;

class Application extends BaseApplication
{
    public function bootstrap(): void
    {
        parent::bootstrap();

        if (PHP_SAPI === 'cli') {
            $this->bootstrapCli();
        } else {
            FactoryLocator::add(
                'Table',
                (new TableLocator())->allowFallbackClass(false)
            );
        }

        if (Configure::read('debug')) {
            $this->addPlugin('DebugKit');
        }
    }

    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {
        $middlewareQueue
            ->add(new ErrorHandlerMiddleware(Configure::read('Error')))
            ->add(new AssetMiddleware([
                'cacheTime' => Configure::read('Asset.cacheTime'),
            ]))
            ->add(new RoutingMiddleware($this))
            ->add(new BodyParserMiddleware())

        // Adicione o CorsMiddleware com as configurações apropriadas apenas uma vez
        ->add(function($request, $response, $next) {
            return $next($request, $response)
                ->withHeader('Access-Control-Allow-Origin', 'http://localhost:19006')
                ->withHeader('Access-Control-Allow-Methods', '*')
                ->withHeader('Access-Control-Allow-Credentials', 'true')
                ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With')
                ->withHeader('Access-Control-Allow-Headers', 'Content-Type')
                ->withHeader('Access-Control-Allow-Type', 'application/json');
        });

        return $middlewareQueue;
    }

    public function services(ContainerInterface $container): void
    {
    }

    protected function bootstrapCli(): void
    {
        $this->addOptionalPlugin('Cake/Repl');
        $this->addOptionalPlugin('Bake');
        $this->addPlugin('Migrations');
    }
}
