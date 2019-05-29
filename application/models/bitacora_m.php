<?php
class bitacora_m extends CI_Model {

   public function registrar(){

       $this->load->database();
       $this->load->helper('string');
       $config['upload_path']          = './upload/';
       $config['allowed_types']        = '*';
       $countfiles = count($_FILES['archivos']['name']);
       for($i=0;$i<$countfiles;$i++){
        if(!empty($_FILES['archivos']['name'][$i])){
          $_FILES['file']['name'] = $_FILES['archivos']['name'][$i];
          $_FILES['file']['type'] = $_FILES['archivos']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['archivos']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['archivos']['error'][$i];
          $_FILES['file']['size'] = $_FILES['archivos']['size'][$i];
          $config['upload_path'] = 'upload/'; 
          $config['allowed_types'] = '*';
          $config['file_name'] = random_string('numeric', 4).'-'.$_FILES['archivos']['name'][$i];
          $this->load->library('upload',$config); 
          if($this->upload->do_upload('file')){
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];
            $data['filenames'][] = $filename;
          }else{
              echo "ERROR";
          }
        }
      }       
       $query = $this->db->query("INSERT INTO `bitacora`(`nombre`, `id_tarea`, `id_persona`, `porcentaje`, `descripcion`, `evidencias`) VALUES (
       '".$this->input->post('nombre_bitacora')."',
       '".$this->uri->segment(3)."',
       '".$_SESSION['usuario']."',
       '".$this->input->post('porcentaje')."',
       '".$this->input->post('descripcion_bitacora')."',
       '".json_encode($data['filenames'],true)."')
       ");
       if ($this->input->post('porcentaje') == 100){
           $this->db->query("UPDATE `tareas` SET estado= 0, fecha_cierre = now() WHERE `id`='".$this->uri->segment(3)."'");
       }
       echo "<script>alert('Registrado con exito');</script>";
       echo "<script>window.location.href = '../historial/".$this->uri->segment(3)."';</script>"; 
    }
    public function maximo_porcentaje(){
        $query = $this->db->query("SELECT MAX(porcentaje) as porcentaje FROM `bitacora` WHERE `id_tarea` = ".$this->uri->segment(3)."");
        $row = $query->row();
        $select = "<select name='porcentaje' class='form-control' >";
        for($x= (($row->porcentaje == '')?0:$row->porcentaje ); $x<=100;$x+=20){
            $select .= "<option value='$x' >$x%</option>";
        }
        $select .= "</select>";
        return $select;
    }
}
?>
