<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		//Verifica que no este protegido
		$this->load->database();
		$query = $this->db->query("SELECT * FROM usuarios where password != '' and email != '' ");
		$row = $query->row_array();
		if ($query->num_rows() == 0){
			$_SESSION['usuario'] = 1;
			header('Location: index.php/app/');
		}

        $this->load->view('header');
        $this->load->model('login_m');
		$this->load->view('login');
	}

    public function ingresar()
	{
        $this->load->model('login_m');
		$this->login_m->ingresar();
	}

    public function registrarse()
	{
        $this->load->model('login_m');
		$this->login_m->registrarse();
	}

    public function profesores()
	{
        $this->load->view('header');
        $this->load->view('profesores/menu_profesores');
		$this->load->view('profesores/profesores');
        $this->load->view('fotter');
	}

    public function registro()
	{
        $this->load->view('header');
        $this->load->view('registro');
	}

    public function pass_olvidado()
	{
        $this->load->view('header');
        $this->load->view('pass_olvidado');
	}

    public function recuperar()
	{
        $this->load->model('login_m');
		$this->login_m->recuperar();
	}

    public function actualizar()
	{
        $this->load->model('login_m');
		$this->login_m->actualizar();
	}


    public function salir()
	{
        session_destroy();
        header('Location: '.base_url().'');
	}
}
