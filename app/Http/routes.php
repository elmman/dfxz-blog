<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

define('ROUTE_BASE','dfxz-blog/public');

// $app->get('/', function () use ($app) {
//     return 'hello! come on~~';
// });
// echo '1' . '<br>';

//下面这种方式是直接返回一个方法
$app->get(ROUTE_BASE . '/foo', function() {
    return 'Hello lumenWorld~~';
});

//定义中间件的路由，前一步要在app.php中注册这个中间件
$app->routeMiddleware([
	'firstMw' => 'App\Http\Middleware\Test\showHelloCenter'
]);

//下面这个为啥不用加上命名空间App\Http\Controllers呢，默认会加上？试试看
$app->get(ROUTE_BASE . '/hello',['uses'=>'test\ShowHelloWorld@sayHello','as'=>'showHelloWorld']);
//经过测试默认在app\http\controllers上找，也就是默认会加上app\http\controllers
// echo '2' . '<br>';

$app->get(ROUTE_BASE . '/showMiddleware/{key}',['uses'=>'test\showHelloWorld@showMiddleware','as'=>'showMiddleware']);
