<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\CustomModel;

class Blog extends BaseController
{
	
	public function index()

	{
		$db=db_connect();
		$model=new CustomModel($db);
		echo "<pre>";
		print_r($model->getPosts());
		echo "</pre>";
		
		$data=[
			'meta_title'=>'CodeIgniter4 Blog',
			'title'=>'CodeIgniter4',
		];
		$posts=[
			['Title 1','Lorem mi so'],
			['Title 2'],
			['Title 3'],
		];
		$data['posts']=$posts;
		
		echo view('header');
		echo view('blogger');
		echo view("footer",$data);
		
	}
	public function Shop(){
		echo "How was shopping";
	}
	public function Mike(){
		return view("indexmike");
	}
	public function Post($id){
		$model=new BlogModel();
		$post=$model->find($id);

		if($post){
			$data=[
				'meta_title'=>$post['post_title'],
				'title'=>$post['post_title'],
				'post'=>$post
			];

		}
		else{
			$data=[
				'meta_title'=>"Post not found",
				'title'=>"Post not found",
			];
		}
		return view('post',$data);
		
	}
	public function Header(){
		return view('header');
	}
	public function new(){
		
		
		
		$data=[
			'meta_title'=>'New Post',
			'title'=>'Create new post',
		];
		if($this->request->getMethod()=='post'){
			$db = db_connect();
			$model= new BlogModel();
            print_r($_POST);
			$userDetails=$model->save($_POST);
			//echo "<pre>";print_r($userDetails);
			//return redirect()->to('/blog');
			
		}
		return view('new_post',$data);
	}
	public function delete($id){
			
		$model=new BlogModel();
		$post=$model->find($id);
		if($post){
			$model->delete($id);
			return redirect()->to('blog');
		}
		
	}
	public function edit(){
		$model=new BlogModel();
		$_POST['post_id']=$id;
		$post=$model->find($id);
		$data=[
			'meta_title'=>$post['post_title'],
			'title'=>$post['post_title'],
			'post'=>$post
		];
		if($this->request->getMethod()=='post'){
			$model=new BlogModel();
			$_POST['post_id']=$id;
			$post=$model->find($id);
			$model->save($_POST);

		}
		return view('edit_post',$data);

		
	}

	
}