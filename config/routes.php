<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance ` $builder` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder  $builder) {
    /*
     * The default class to use for all routes
     *
     * The following route classes are supplied with CakePHP and are appropriate
     * to set as the default:
     *
     * - Route
     * - InflectedRoute
     * - DashedRoute
     *
     * If no call is made to `Router::defaultRouteClass()`, the class used is
     * `Route` (`Cake\Routing\Route\Route`)
     *
     * Note that `Route` does not do any inflections on URLs which will result in
     * inconsistently cased URLs when used with `{plugin}`, `{controller}` and
     * `{action}` markers.
     */
     $builder->setRouteClass(DashedRoute::class);

     $builder->scope('/', function (RouteBuilder $builder) {
        /*
         * Here, we are connecting '/' (base path) to a controller called 'Pages',
         * its action called 'display', and we pass a param to select the view file
         * to use (in this case, templates/Pages/home.php)...
         */
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        /*
         * ...and connect the rest of 'Pages' controller's URLs.
         */
        $builder->connect('/pages/*', 'Pages::display');
$builder->connect('/usuario',  ['controller' => 'Usuario', 'action' => 'index']);
 $builder->connect('/usuario/view/id', ['controller' => 'Usuario', 'action' => 'view']);
 $builder->connect('/usuario/add', ['controller' => 'Usuario', 'action' => 'add']);

$builder->connect('/cargo',  ['controller' => 'Cargo', 'action' => 'index']);
 $builder->connect('/cargo/view/id', ['controller' => 'Cargo', 'action' => 'view']);
 $builder->connect('/cargo/add', ['controller' => 'Cargo', 'action' => 'add']);

$builder->connect('/empresa',  ['controller' => 'Empresa', 'action' => 'index']);
 $builder->connect('/empresa/view/id', ['controller' => 'Empresa', 'action' => 'view']);
 $builder->connect('/empresa/add', ['controller' => 'Empresa', 'action' => 'add']);

$builder->connect('/vaga',  ['controller' => 'Vaga', 'action' => 'index']);
 $builder->connect('/vaga/view/id', ['controller' => 'Vaga', 'action' => 'view']);
 $builder->connect('/vaga/edit/id', ['controller' => 'Vaga', 'action' => 'edit']);
 $builder->connect('/vaga/add', ['controller' => 'Vaga', 'action' => 'add']);


/*
         * Connect catchall routes for all controllers.
         *
         * The `fallbacks` method is a shortcut for
         *
         * ```
         * $builder->connect('/{controller}', ['action' => 'index']);
         * $builder->connect('/{controller}/{action}/*', []);
         * ```
         *
         * You can remove these routes once you've connected the
         * routes you want in your application.
         */
        $builder->fallbacks();
    });

    /*
     * If you need a different set of middleware or none at all,
     * open new scope and define routes there.
     *
     * ```
     *  $builder->scope('/api', function (RouteBuilder $builder) {
     *     // No $builder->applyMiddleware() here.
     *
     *     // Parse specified extensions from URLs
     *     // $builder->setExtensions(['json', 'xml']);
     *
     *     // Connect API actions here.
     * });
     * ```
     */
};
