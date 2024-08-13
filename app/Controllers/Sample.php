<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomModel;

class Sample extends BaseController
{
	public function index()
	{
		//
		return view('welcome_message');
	}
	public function Auth(){
		return view('auth/login');
	}
	public function processLogin(){
		$customModel= new CustomModel();
		$user_details=$customModel->getOneUser();
		echo "<pre>";
		print_r($user_details);
		echo "</pre>";
		$session=session();
		$session->set('user_details',$user_details);
		return redirect()->to('/Sample/homePage');
		//header('Location:home.php');
	}
	public function homePage(){
		return view('auth/home');
	}
}
