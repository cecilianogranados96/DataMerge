<?php
class importador_m extends CI_Model {
    
    public function mach_nombre($nombre,$id){
        $this->load->database();
        $consulta = "SELECT * from usuarios where nombre = '$nombre' or nombre like '%$nombre%' ORDER by id_usuario Desc LIMIT 1";
        $query = $this->db->query($consulta);
        $row = $query->row();
        return $row->id_usuario;
    }
    
    public function acortar($id){
        return substr($id, -6);
    }
    
    public function complete($completo){
        if ($completo == ""){
            return 1;
        }else{
            return 0;
        }
    }
    
    public function proceso_importacion()
	{
        $this->load->model('importador_m');
        $this->load->database();
       // $this->db->query("DELETE FROM `tareas` WHERE 1=1");
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = '*';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('archivo'))
        {
                $error = array('error' => $this->upload->display_errors());
                echo "ERROR";
        }else{
            $data = array('upload_data' => $this->upload->data());
            $url_archivo = $data['upload_data']['file_name'];
            echo "<script>alert('TERMINADO CON EXITO');</script>";
            //echo "<script>window.location.href = '../../index.php/app/importador';</script>";    
        }
	}
}
?>