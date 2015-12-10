<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		$this->load->model('Registros_model');
		$dados['produtos'] = $this->Registros_model->getProdutosEdicao();
		$this->load->view('templates/header');
		$this->load->view('cadastro/index', $dados);
	}

	public function cadastrar() {
		$this->load->model('Registros_model');
		$this->Registros_model->cadastrar();
		echo "Produto cadastrado com sucesso!";
	}
}
