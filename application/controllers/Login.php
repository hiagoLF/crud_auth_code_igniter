<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index(){
		$data['title'] = 'Login - Codeigniter';
		$this->load->view('pages/login', $data);
	}

	public function store(){
		$email = $_POST["email"];
		$password = md5($_POST["password"]);
		$this->load->model("login_model");
		$user = $this->login_model->store($email, $password);

		if($user){
			$this->session->set_userdata("logged_user", $user);
			redirect("dashboard");
		}else{
			redirect('login');
		}
	}

	public function logout(){
		$this->session->unset_userdata("logged_user", $user);
		redirect("login");
	}
}
