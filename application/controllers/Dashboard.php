<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		permission();
		$this->load->model("games_model");
	}

	public function index(){
		$pageData['games'] = $this->games_model->index();
		$headerData['title'] = 'Dashboard - Codeigniter';

		$this->load->view('templates/header', $headerData);
		$this->load->view('templates/nav-top',);
		$this->load->view('pages/dashboard', $pageData);
		$this->load->view('templates/footer',);
		$this->load->view('templates/js', );
	}

	public function search(){
		$this->load->model("search_model");
		$headerData['title'] = "Resultado da pesquisa por *".$_POST["busca"]."*.";
		$pageData['result'] = $this->search_model->search($_POST);

		$this->load->view('templates/header', $headerData);
		$this->load->view('templates/nav-top',);
		$this->load->view('pages/resultado', $pageData);
		$this->load->view('templates/footer',);
		$this->load->view('templates/js', );
	}
}
