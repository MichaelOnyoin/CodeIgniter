<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\AdminModel;
use App\Models\CategoriesModel;
use App\Models\SubcategoriesModel;
use App\Models\OrderModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\ApiuserModel;
use App\Models\FashionModel;
use App\Models\CartModel;
use App\Models\WalletModel;
use App\Models\UserloginModel;

class Cloth extends BaseController
{
	public function index()
	{
		return view('land');
	}
	
	public function Login(){
		return view('aplogin');
	}

	public function Chart(){
		return view('chart');
		
	}

	public function More(){
		return view('more');
	}

	public function AnalyticsChart(){
		return view('chart1');
	}

	public function Ajax(){
		return view('ajaax');
	}
	public function ProcessLogin(){
		$db = \Config\Database::connect();
        
			$email=$this->request->getPost('Email');
			$password=$this->request->getPost('Password');
			
		
			$query   = $db->query("SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'");


            

			if($query->getNumRows() == 1){  
				echo "<h1><center> Login successful </center></h1>"; 
				echo "<br>";
				//session_start();
				$session=session();
				
		        $session->set('user_details',$email);
			
				
				
				return redirect()->to('/cloth/men');
				
				
			   
			}  
			else{  
				echo "<h1> Login failed. Invalid username or category.</h1>"; 
				return redirect()->to('/cloth/login');
			} 

			
		
	}
	
	public function AdminLogin(){
		return view('admin_login');
		
	}
	public function ProcessAdminLogin(){
		$db = \Config\Database::connect();

		$email=$this->request->getPost('Email');
		$password=$this->request->getPost('Password');
		
	
		$query   = $db->query("SELECT * FROM `admin` WHERE `email`='$email' AND `password`='$password'");
		
		
		 $query1   = $db->query("SELECT `admin_id` FROM `admin` WHERE `email` ='$email' AND `password` = '$password' ");
		 $admin_id = $query1->getRowArray();
			if($query->getNumRows() == 1){  
				echo "<h1><center> Login successful </center></h1>"; 
				echo "<br>";
				
				$session=session();
				
		        $session->set('admin_details',$email,$admin_id);

				return redirect()->to('/cloth/main');
				//header("Location:http://localhost:8080/Cloth/Men");
				
			   
			}  
			else{  
				echo "<h1> Login failed. Invalid username or category.</h1>";
				return redirect()->to('cloth/adminLogin'); 
			} 


	}
	
	public function Register(){
		return view('register');

	}
	public function ProcessRegister(){
		if($this->request->getMethod()=='post'){
			$db = db_connect();
			$model= new UserModel();
     		$model->save($_POST);
		
		}
		return redirect()->to('cloth/');
	}
	public function AdminRegister(){
		return view('admin_register');
	}

	public function ProcessAdminRegister(){

		if($this->request->getMethod()=='post'){
			$db = db_connect();
			$model= new AdminModel();
            print_r($_POST);
			$model->save($_POST);
		
		}
		return redirect()->to('cloth/');
		


	}
	public function UserEdit(){
		$db=db_connect();
		$model=new UserModel();
		$email=$this->request->getPost('email');
	    $password=$this->request->getPost('password');
		$user_id=$this->request->getPost('user_id');
	    $firstname=$this->request->getPost('firstname');
		$lastname=$this->request->getPost('lastname');
	    $category=$this->request->getPost('category');
		$subcategory=$this->request->getPost('subcategory');
		$gender=$this->request->getPost('gender');
		
		$sql="UPDATE `user` SET `email`='$email',`lastname`='$firstname',`lastname`='$lastname',`password`='$password',`category`='$category',`gender`='$gender',`category`='$category',`subcategory`='$subcategory' WHERE `user_id`='$user_id'";
		$query  = $db->query($sql);
		
		if($db->query($sql)==TRUE){
			echo "<br>";
			echo "Edited successfully";
			
		}else{
			echo "Error in update".$db->error();
		}
		$db->close();
		return redirect()->to('cloth/clientEdit');
	}

	public function UserDeleter(){
		$db=db_connect();
		$model=new UserModel();
		$user_id=$this->request->getPost('user_id');
		$sql="DELETE FROM `user` WHERE `user_id`='$user_id'";
		$query  = $db->query($sql);
		
		if($db->query($sql)==TRUE){
			echo "<br>";
			echo "Deleted successfully";
			
		}else{
			echo "Error in deletion".$db->error();
		}
		$db->close();
		return redirect()->to('cloth/clientEdit');
	}

	public function AdminEditer(){
		$db=db_connect();
		$model=new AdminModel();
		$email=$this->request->getPost('email');
	    $password=$this->request->getPost('password');
		$admin_id=$this->request->getPost('admin_id');
	    $firstname=$this->request->getPost('firstname');
		$lastname=$this->request->getPost('lastname');
	    
		$role=$this->request->getPost('role');
		$gender=$this->request->getPost('gender');
		
		$sql="UPDATE `admin` SET `email`='$email',`firstname`='$firstname',`lastname`='$lastname',`password`='$password',`gender`='$gender',`role`='$role' WHERE `admin_id`='$admin_id'";
		$query  = $db->query($sql);
		//$result = $query->getResult();
		if($db->query($sql)==TRUE){
			echo "<br>";
			echo "Edited successfully";
			
		}else{
			echo "Error in update".$db->error();
		}
		$db->close();
		return redirect()->to('cloth/adminEdit');
	}

	public function AdminDeleter(){
		$db=db_connect();
		$model=new AdminModel();
		$admin_id=$this->request->getPost('admin_id');
		$sql="DELETE FROM `admin` WHERE `admin_id`='$admin_id'";
		$query  = $db->query($sql);
		//$result = $query->getResult();
		if($db->query($sql)==TRUE){
			echo "<br>";
			echo "Deleted successfully";
			
		}else{
			echo "Error in deletion".$db->error();
		}
		$db->close();
		return redirect()->to('cloth/adminEdit');
	}



	public function AdminEdit(){
		echo view('editheader');
		echo view('apadminedit');
	}
	public function ClientEdit(){
		echo view('editheader');
		echo view('apclientedit');
	}
	public function Main(){
		return view('editheader');
	}
	public function FashionInsertion(){
		echo view('editheader');
		echo view('FashInsertion');
	}

	public function FashionInserter(){
		if($this->request->getMethod()=='post'){
			$db = db_connect();
			$model= new FashionModel();
            print_r($_POST);
			$model->save($_POST);
			
			//return redirect()->to('/cloth/fashionInsertion');
			
		}
		return redirect()->to('cloth/fashionInsertion');

	}


	public function FashionEdit(){
		echo view('editheader');
		echo view('FashEdit');
	}

	public function FashionEditer(){
		$db=db_connect();
		$model=new FashionModel();
		$fashion_item=$this->request->getPost('fashion_item');
	    $category=$this->request->getPost('category');
		$subcategory=$this->request->getPost('subcategory');
	    $unit_price=$this->request->getPost('unit_price');
		$fashion_image=$this->request->getPost('fashion_image');
	    $fashion_id=$this->request->getPost('fashion_id');
		
		
		
		$sql="UPDATE `fashion` SET `fashion_item`='$fashion_item',`unit_price`='$unit_price',`fashion_image`='$fashion_image',`category`='$category' WHERE `fashion_id`='$fashion_id'";
		$query  = $db->query($sql);
		//$result = $query->getResult();
		if($db->query($sql)==TRUE){
			echo "<br>";
			echo "Edited successfully";
			
		}else{
			echo "Error in update".$db->error();
		}
		$db->close();
		return redirect()->to('cloth/fashionEdit');

	}

	public function EditHeader(){
		return view('editheader');
	}
	public function Men(){
		return view('men');
	}

	public function Women(){
		return view('women');
	}

	public function Pets(){
		return view('pets');
	}

	public function Children(){
		return view('children');
	}

	public function Product(){
		echo view('editheader');

		echo view('product');
	}

	public function ProductInsert(){
		if($this->request->getMethod()=='post'){
			$db = db_connect();
			$model= new ProductModel();
            print_r($_POST);
			$model->save($_POST);
			//echo "<pre>";print_r($userDetails);
			//return redirect()->to('/blog');
			
		}
		return view('product');


	}
	public function Table(){
		return view('table');
    }

	public function API(){
		return view('API/api');
	}
	public function Base(){
	// 	//$db=db_connect('default');
	 	$db = \Config\Database::connect();
		$query   = $db->query('SELECT `user_id`, `email`, `firstname`, `lastname`, `password`, `gender`, `category`, `subcategory` FROM `user` ');
        $results = $query->getResultArray();
        //print_r($results);

        foreach ($results as $row) {
			echo "<pre>";
			echo "<br>";
            echo $row['user_id'];
            echo "<br>";
             echo $row['email'];
			 echo "<br>";
             echo $row['firstname'];
			 echo "<br>";
			 echo "</pre>";
       } 

	
	
		$this->db = db_connect();
	
	$query = $db->table('user')->get();

	foreach ($query->getResult() as $row) {
		echo "<pre>";
	    echo $row->lastname;
		echo "</pre>";

	}
	echo "<h2>New Builder Here</h2>";
	$builder=$this->db->table('subcategories');
	$builder->join('categories','subcategories.category_id=categories.category_id');
	$table=$builder->get()->getResultArray();
	echo "<pre>";
	print_r($table);
	echo "<h4>New Builder Here</h4>";
	$builder1=$this->db->table('categories')->where(['is_deleted'=>0])->like(['category_name'=>'%men%']);
	$table1=$builder1->get()->getResultArray();
	echo "<pre>";
	print_r($table1);





	}

	public function Cart(){
		echo view('cart');
	}
	public function Cart1(){
		return view('cart1');
	}

	public function ProcessCart1(){
		if($this->request->getMethod()=='post'){
			$db = db_connect();
			$model= new CartModel();
           
			$model->save($_POST);
			
		}
		//return view('cart1');
		return redirect()->to('cloth/cart1');
	}

	public function Profile(){
		return view('profile');
	}
	public function Profile1(){
		return view('profile1');
	}



	public function ClientProfile(){
		echo view('userheader');
		echo view('client_profile');
	}

	public function AdminProfile(){
		echo view('editheader');
		echo view('admin_profile');
	}



	public function Logout(){
		$session=session();
        $session->get('user_details');
		
		$db = db_connect();
		$model= new UserloginModel();
		$email =$session->get('user_details');
		$query1   = $db->query("SELECT `user_id` FROM user WHERE `email` = '$email' ");
		$results = $query1->getResult();
		foreach($results as $row){
		   //echo $row->user_id;
		}
		$user_id= $row->user_id;
		$sql="UPDATE `userlogins` SET `logout_time`= CURRENT_TIMESTAMP() WHERE `user_id`='$user_id'";
		$query=$db->query($sql);
		if($db->query($sql)==TRUE){
			echo "<br>";
			echo "Edited successfully";
			
		}else{
			echo "Error in update".$db->error();
		}
		$db->close();
        echo "<script>";
		echo "alert('You have been logged out')"; 
		echo "</script>";


		$session->destroy();
	    return redirect()->to('/cloth');
		//require('/cloth');
		
	}

	public function Logout1(){
		$session=session();
        $session->get('admin_details');
		echo "<script>";
		echo "alert('You have been logged out')";
		echo "</script>";
		$session->destroy();
	    return redirect()->to('/cloth');
	}

	public function Category(){
		echo view('more');
		echo view('category');

	}
	public function CategoryInsert(){
		if($this->request->getMethod()=='post'){
			$db = db_connect();
			$model= new CategoriesModel();
            
			$model->save($_POST);
			
		}
		return redirect()->to('cloth/category');

	}

	public function CategoryEdit(){
		echo view('more');
		echo view('categoryedit');
	}

	public function CategoryEditer(){
		$db=db_connect();
		$model=new CategoriesModel();
		
	    $category_id=$this->request->getPost('category_id');
		$category_name=$this->request->getPost('category_name');
	   
		$sql="UPDATE `categories` SET `category_name`='$category_name' WHERE `category_id`='$category_id'";
		$query  = $db->query($sql);
		
		if($db->query($sql)==TRUE){
			echo "<br>";
			echo "Edited successfully";
			
		}else{
			echo "Error in update".$db->error();
		}
		$db->close();
		return redirect()->to('cloth/categoryEdit');
	}
	public function Subcategory(){
		echo view('more');
		echo view('subcategory');

	}
	public function SubcategoryInsert(){
		if($this->request->getMethod()=='post'){
			$db = db_connect();
			$model= new SubcategoriesModel();
            print_r($_POST);
			$model->save($_POST);
			
		}
		return redirect()->to('cloth/subcategory');
		


	}

	public function Payment(){
		return view('payment');
	}

	public function Order(){
		return view('orderform');
	}
	public function Orderer(){
		if($this->request->getMethod()=='post'){
			$db = db_connect();
			$model= new OrderModel();
            print_r($_POST);
			$model->save($_POST);
			
		}
		return view('orderform');
	}

	public function Apiform(){
		echo view('more');
		echo view('apiform');
	}

    use ResponseTrait;
	public function ViewApi(){
		$db=db_connect();
		$sql="SELECT * FROM apiusers";
		$query=$db->query($sql);
		$result=$query->getResultArray();
		header('Content-Type:application/json');
		return json_encode($result);

	

        // Respond with 201 status code
        return $this->respondCreated();
		return $this->setResponseFormat('json')->respond(['error' => false]);
		printf( $this->setResponseFormat('json')->respond(['error' => false]));
	}

	public function ViewUserApi(){
		$db=db_connect();
		$sql="SELECT * FROM user";
		$query=$db->query($sql);
		$result=$query->getResultArray();
		header('Content-Type:application/json');
		return json_encode($result);
	}

	public function ip(){
		return view('ip');
	}
	
	

    public function createAPIUser()
    {
		
		if($this->request->getMethod()=='post'){
			$db=db_connect();
			$model = new ApiuserModel();
			
            $user  = $model->save($_POST);

		}
		
        

		return redirect()->to('cloth/apiform');
    }

	public function ProcessPayment(){
		$db=db_connect();
		// $model=new OrderModel();
		// $customer_id=$this->request->getPost('customer_id');
	    // $order_amount=$this->request->getPost('order_amount');
		// $order_status=$this->request->getPost('order_status');
	    // $payment_type=$this->request->getPost('payment_type');
		// $is_deleted=$this->request->getPost('is_deleted');
	    //$sql="INSERT INTO `order`(`order_id`, `customer_id`, `order_amount`, `order_status`, `created_at`, `payment_type`, `updated_at`, `is_deleted`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])";
		if($this->request->getMethod()=='post'){
			$db = db_connect();
			$model= new OrderModel();
            print_r($_POST);
			$model->save($_POST);
			
		}
		return redirect()->to('cloth/payment');
	}

	public function Print(){
		return view("print");
	}

	public function Wallet(){
		return view('wallet');
	}

	public function ProcessWallet(){
		if($this->request->getMethod()=='post'){
			$db = db_connect();
			$model= new WalletModel();
            print_r($_POST);
			$model->save($_POST);
			
		}
		return redirect()->to('cloth/wallet');
	}

	public function UserLogtime(){
		if($this->request->getMethod()=='post'){
			$db = db_connect();
			$model= new UserloginModel();
        	$model->save($_POST);
			
		}
		return redirect()->to('cloth/men');
	}

	

	public function Encryption(){
		$string="My name is Mike";
		//
		//$key = \CodeIgniter\Encryption\Encryption::createKey(32);
		// $key = \CodeIgniter\Encryption\Encryption::createKey(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
		// $key = sodium_crypto_secretbox_keygen();
		// $encrypter = \Config\Services::encrypter($key);
		// $config         = new \Config\Encryption();
		// $config->key    = 'aBigsecret_ofAtleast32Characters';
		// $config->driver = 'OpenSSL';

		$encrypter = \Config\Services::encrypter();
		$ciphertext = $encrypter->encrypt($string);
		echo $ciphertext;

		$category="12345";
		$categoryhash=category_hash($category,category_DEFAULT);
		echo $categoryhash;
		echo "<h2>category convertion</h2>";
		$passcode=category_needs_rehash($categoryhash,category_DEFAULT);
	    echo $passcode;

		
	}
    
}

