<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class App extends CI_Controller {

	public function index(){
        $this->load->view('header');
        $this->load->view('app/menu_profesores');
        $this->load->view('app/importador');
        $this->load->view('fotter');
	}

    public function nuevo_objetivo(){
        $this->load->view('header');
        $this->load->view('app/menu_profesores');
				$this->load->view('app/nuevo_objetivo');
        $this->load->view('fotter');
	}

    public function construir_consulta(){
        $this->load->view('header');
        $this->load->view('app/menu_profesores');
        $this->load->view('app/construir_consulta');
        $this->load->view('fotter');
	}

    public function proceso_importacion(){
        $this->load->model('importador_m');
        $this->importador_m->proceso_importacion();
	}



    public function exportar(){
        $this->load->view('header');
        $this->load->view('app/menu_profesores');
		$this->load->view('app/construir_consulta');
        $this->load->view('fotter');
	}

    public function visualizador(){
        $this->load->view('header');
        $this->load->view('app/menu_profesores');
		$this->load->view('app/visualizador');
        $this->load->view('fotter');
	}

    public function proyectos_archivados()
	{
        $this->load->view('header');
        $this->load->view('app/menu_profesores');
		$this->load->view('app/proyectos_archivados');
        $this->load->view('fotter');
	}



    public function usuarios()
	{
        $this->load->view('header');
        $this->load->model('login_m');
        $this->load->view('app/menu_profesores');
		$this->load->view('app/usuarios');
        $this->load->view('fotter');
	}

    public function modificar_usuario()
	{
        $this->load->view('header');
        $this->load->model('login_m');
        $this->load->view('app/menu_profesores');
		$this->load->view('app/modificar_usuario');
        $this->load->view('fotter');
	}

    public function actualizar_usuario()
	{
        $this->load->model('login_m');
        $this->login_m->actualizar_usuario();
	}

    
    public function guardar_contructor(){
        $this->load->database();

        $this->db->query("DELETE FROM `constructor`");
        
        $tabla1 = $_POST['tabla1']; 
        $tabla2 = $_POST['tabla2']; 
        $comparador = $_POST['comparador']; 
        $especial = $_POST['especial']; 
        if ($tabla1 != ""){
            for($a =0; $a < sizeof($tabla1);$a++){
                $tabla1_datos = explode("-", $tabla1[$a]);
                $tabla2_datos = explode("-", $tabla2[$a]);
                
                $this->db->query("INSERT INTO `constructor`(`nombre_tabla1`, `nombre_campo1`, `nombre_tabla2`, `nombre_campo2`, `especial`, `comparacion`) VALUES ('".$tabla1_datos[0]."','".$tabla1_datos[1]."','".$tabla2_datos[0]."','".$tabla2_datos[1]."','".$especial[$a]."','".$comparador[$a]."')");
            }
        }
        
	}
    
    

    public function cuenta()
	{
        $this->load->view('header');
        $this->load->view('app/menu_profesores');
		$this->load->view('cuenta');
        $this->load->view('fotter');
	}

}
