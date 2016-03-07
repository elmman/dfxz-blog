<?php 
namespace App\Http\Middleware\Test;
use Illuminate\Http\Request;
class ShowHelloMiddleware{
	public function handle($request,$next){
		//能进到这个中间件，但是这个地方暂时不清楚为什么获取不到参数
		if($request->input('name') == 'zsdai'){
			return 'yes you are auth!';
			// return $next($request);
		}else{
			return $next($request);
		}	
	}
}