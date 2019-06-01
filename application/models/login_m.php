<?php
class login_m extends CI_Model {

    public function registrarse()
	{
        $this->load->database();
        $datos = array(
            'nombre' => $this->input->post('nombre'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
        );
        $this->db->db_debug = false;
        if(!$this->db->insert('usuarios', $datos)){
            echo "<script>alert('ERROR Usuario registrado anteriormente');</script>";
        }else{
            echo "<script>alert('Usuario registrado con éxito');</script>";
        }
        echo "<script>window.location.href = '../../index.php';</script>";
	}

    public function ingresar()
    {
        $this->load->database();
        $email = $this->input->post('email');
        $pass = md5($this->input->post('password'));
        $query = $this->db->query("SELECT email FROM usuarios where email = '".$email."' ");
        if ($query->num_rows() == 0){
            header('Location: ../../?error_login=1');
        }else{
            $query = $this->db->query("SELECT password FROM usuarios where password = '".$pass."' ");
            if ($query->num_rows() == 0){
               header('Location: ../../?error_login=2');
            }else{
              $query = $this->db->query("SELECT email,password,id_usuario FROM usuarios where password = '".$pass."' and email = '".$email."'  ");
               $row = $query->row_array();
                $_SESSION['usuario'] = $row['id_usuario'];
                header('Location: ../app/');

            }
        }

	}



    public function get_usuarios()
    {
        $this->load->database();
        $query = $this->db->query("SELECT *, IF(tipo = 2, 'Profesor','Estudiante') as rol from usuarios  where id_usuario != 0 order by tipo DESC");
        return $query->result();
	}


    public function actualizar_usuario()
    {
        $this->load->database();
        if ($this->input->post('password') == ''){
            $this->db->query("UPDATE `usuarios` SET `nombre`='".$this->input->post('nombre')."', tipo = '".$this->input->post('rol')."'  WHERE `id_usuario` = ".$this->uri->segment(3)."");
        }else{
            $this->db->query("UPDATE `usuarios` SET `nombre`='".$this->input->post('nombre')."',`password`='".md5($this->input->post('password'))."', tipo = '".$this->input->post('rol')."' WHERE `id_usuario` = ".$this->uri->segment(3)."");
        }
        echo "<script>alert('Actualizado con exito');</script>";
        echo "<script>window.location.href = '../usuarios';</script>";
	}


    public function actualizar()
    {
        $this->load->database();
        if ($this->input->post('password') == ''){
            $this->db->query("UPDATE `usuarios` SET `nombre`='".$this->input->post('nombre')."',`email`='".$this->input->post('email')."' WHERE `id_usuario` = ".$_SESSION['usuario']."");
        }else{
            $this->db->query("UPDATE `usuarios` SET `nombre`='".$this->input->post('nombre')."',`email`='".$this->input->post('email')."',`password`='".md5($this->input->post('password'))."' WHERE `id_usuario` = ".$_SESSION['usuario']."");
        }
        echo "<script>alert('Actualizado con exito, ingresa nuevamente para ver reflejados los cambios');</script>";
        echo "<script>window.location.href = '../../index.php/login/salir';</script>";
	}
}
?>
