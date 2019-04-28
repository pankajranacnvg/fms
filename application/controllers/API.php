<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

class API extends CI_Controller {
    
	private $success;
    private $input_rs;
	public function __construct(){
		parent::__construct();
		$this->input_rs = json_decode(file_get_contents("php://input"), true);
	}

	public function index(){
		echo "<h1>Welcome to ULB API</h1>";
	}

	public function check_login(){


		

		$username = $this->input_rs['username'];
		$password = $this->input_rs['password'];

		$response = $this->Login_user->check_login($username, $password);
		if($response != 0 ){

			if($response['login_type'] == 'SUPERVISOR'){
				$status = "success";
				$code = "200";
				$message = "Login Successfull";
				$error = "NA";
				$data = $response;
			}else{
				$status = "failure";
				$code = "500";
				$message = "Login Failed";
				$error = "NA";
				$data = array('status' => false);
			}

			echo $this->response_json($status, $data, $code, $message, $error);
				
		}else{

			$status = "failure";
			$code = "500";
			$message = "Login Failed";
			$error = "NA";
			$data = array('status' => false);


			echo $this->response_json($status, $data, $code, $message, $error);
		}
	}


	
	
	public function response_json($status, $data, $code, $message, $error, $appversion = "1.0", $apiname = "ULB API"){
			$this->success = array (
				'status'=>$status,
				'code'=>$code,
				'success message'=>$message,
				'appversion'=>$appversion,
				'apiname'=>$apiname,
				'error'=>$error,
				'data'=>$data
			); 

			return json_encode($this->success);

	}
}