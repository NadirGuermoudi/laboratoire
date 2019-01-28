<?php
if (! function_exists("set_active_route")){
	function set_active_route($route){
		return Route::is($route) ? 'active' : '';
	}
}

if(! function_exists("generateRandomString")){
	function generateRandomString($length = 10) {
		// $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$characters = 'abcdefghijklmnopqrstuvwxyz';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}	
}
