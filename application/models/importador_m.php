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
        $this->db->query("DELETE FROM `tareas` WHERE 1=1");
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
            $file = file_get_contents("upload/".$url_archivo);
            $array = json_decode($file, true);                    
            foreach ($array['data'] as $arreglo){
            echo "<pre>";
           //print_r($arreglo);
            if ($arreglo['assignee'] == ''){
                if ($arreglo['resource_subtype'] == 'section'){
                    $asignado = $arreglo['followers'][0]['name'];
                    $id_persona = $this->importador_m->acortar($arreglo['followers'][0]['id']);
                }else{
                    $asignado = '*No Asignado*';
                    $id_persona = 0;
                }

            }else{
                $asignado = $arreglo['assignee']['name']; 
                $id_persona = $this->importador_m->acortar($arreglo['assignee']['id']);
            }
            $consulta = "INSERT INTO `tareas`(`id`, `id_persona`, `nombre`, `descripcion`, `tarea_padre`, `fecha_creacion`, `fecha_limite`, `fecha_cierre`, `estado`) VALUES (
                    ".$this->importador_m->acortar($arreglo['id']).",
                    '".$this->importador_m->mach_nombre($asignado,$id_persona)."',
                    '".$arreglo['name']."',
                    '".$arreglo['notes']."',
                    '".$this->importador_m->acortar($arreglo['memberships'][0]['section']['id'])."',
                    '".$arreglo['created_at']."',
                    '".$arreglo['due_on']."',
                    '".$arreglo['completed_at']."',
                    '".$this->importador_m->complete($arreglo['completed'])."' 
                    );"; 
                 $this->db->query($consulta);
            }
            unlink("upload/".$url_archivo);
            echo "<script>alert('TERMINADO CON EXITO');</script>";
            echo "<script>window.location.href = '../../index.php/profesores/objetivos';</script>";    
        }
	}
}
?>