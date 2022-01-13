<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends CI_Controller {
	public function __construct(){
		parent::__construct();
		permission();
		$this->load->model("games_model");
	}

	public function index(){

		$pageData['games'] = $this->games_model->index();
		$headerData['title'] = 'Games - Codeigniter';

		$this->load->view('templates/header', $headerData);
		$this->load->view('templates/nav-top',);
		$this->load->view('pages/games', $pageData);
		$this->load->view('templates/footer',);
		$this->load->view('templates/js', );

	}

	public function new(){

		$headerData['title'] = 'Games - Codeigniter';

		$this->load->view('templates/header', $headerData);
		$this->load->view('templates/nav-top');
		$this->load->view('pages/form-games');
		$this->load->view('templates/footer');
		$this->load->view('templates/js');

	}

	public function store(){
		$game = $_POST;
		$game['user_id'] = 1;
		$this->games_model->store($game);
		redirect("dashboard");
	}

	public function edit($id){

		$pageData['game'] = $this->games_model->show($id);
		$headerData['title'] = 'Editar Game - Codeigniter';

		$this->load->view('templates/header', $headerData);
		$this->load->view('templates/nav-top',);
		$this->load->view('pages/form-games', $pageData);
		$this->load->view('templates/footer',);
		$this->load->view('templates/js', );
	}

	public function update($id){
		$game = $_POST;
		$this->games_model->update($id, $game);
		redirect("games");
	}

	public function delete($id){
		$this->games_model->destroy($id);
		redirect("games");
	}
}
