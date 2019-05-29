<?php
class objetivos_m extends CI_Model {
    
    public function registrar_objetivo(){
        $this->load->database();  
        $this->db->select_max('id');
        $result= $this->db->get('tareas')->row_array();
        if ($this->input->post('responsable') == ''){
            $persona = $_SESSION['usuario'];
        }else{
            $persona = $this->input->post('responsable');
        }
        $data = array(
                'id' => $result['id']+1,
                'tarea_padre' => $result['id']+1,
                'nombre' => $this->input->post('nombre_objetivo'),
                'fecha_limite' => $this->input->post('fecha_limite'),
                'descripcion' => $this->input->post('descripcion_objetivo'),
                'id_persona' => $persona,
                'estado' => 1
        );
        $this->db->insert('tareas', $data);
        echo "<script>alert('Insertado con exito');</script>";
        echo "<script>window.location.href = '".$this->input->post('url')."';</script>";
    }
    
    public function avance_objetivo($id){
        $this->load->database();
        $query = $this->db->query("SELECT COUNT(*) as total, (select COUNT(*) from tareas WHERE estado = 0 and tarea_padre = $id) as terminadas FROM `tareas` WHERE `tarea_padre` = $id and `id` != `tarea_padre`");
        $row = $query->row();
        
        $totales = $row->total;
        $porcentaje_terminado = round((($row->terminadas*100)/$row->total),2);
        if($porcentaje_terminado < 40 ){
            $clase = 'progress-bar bg-danger';
        }else{
            if($porcentaje_terminado == 100){
                $clase = 'progress-bar bg-success';
            }else{
                $clase = 'progress-bar bg-warning';
            }
        }
        $resultado = '
        <div class="progress mb-4">
            <div class="'.$clase.'" role="progressbar" style="width: '.$porcentaje_terminado.'%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="'.$totales.'"></div>
            '.$row->terminadas.'/'.$totales.'
        </div>';
        return $resultado;
    }
    
    
    public function get_objetivos(){
        $this->load->database();
        $query = $this->db->query("SELECT tareas.id,tareas.nombre,
        DATE_FORMAT(tareas.fecha_limite, '%d/%b/%Y') as fecha_limite
        ,TIMESTAMPDIFF(DAY, now(),tareas.fecha_limite) as duracion,usuarios.nombre as encargado FROM `tareas`,usuarios WHERE `id` = `tarea_padre` and usuarios.id_usuario = tareas.id_persona");
        return $query->result();
    }
    
    
}
?>