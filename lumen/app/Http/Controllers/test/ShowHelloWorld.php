<?php

namespace app\http\Controllers\test;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class showHelloWorld extends Controller{
	public function __construct(){

	}
	public function sayHello(){
		#第一次进入到controller，yes！say hello and redirect to a controller including middleware
		echo "hello lumen, this is our first Controller. " ."<br><br>";
		return redirect('/showMiddleware/{middleware}');
	}
	public function showMiddleware($key){
		echo "hey this is second controller including middleware,hello {$key}"  . '<br><br>';
		$this->middleware('firstMw',['name'=>'zsdai']);
		// $url = route('showHelloWorld');
		// $url = route('showHelloWorld',['id'=>1]);

		#返回试图，也可以使用方法二直接从文件路径获取试图
		#参数一：resources/view下的模版文件名
		#参数二：需要传递的参数
		return view('test.test_view',['name'=>'zsdai']);

		#方法二
		//return view()->file($filePath,$data);


		// return "hello first_controller";
		// return view("user.profile",["user"=>User::findOrFail($id)]);
	}
}