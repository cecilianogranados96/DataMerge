<?php
class tareas_m extends CI_Model {
    
    public function avance_tarea($id){
        $this->load->database();
        $query = $this->db->query("SELECT MAX(porcentaje) as porcentaje FROM `bitacora` WHERE `id_tarea` = $id");
        $row = $query->row();
        if($row->porcentaje < 40 ){
            $clase = 'progress-bar bg-danger';
        }else{
            if($row->porcentaje == 100){
                $clase = 'progress-bar bg-success';
            }else{
                $clase = 'progress-bar bg-warning';
            }
        }
        $resultado = '
        <div class="progress mb-4">
            <div class="'.$clase.'" role="progressbar" style="width: '.$row->porcentaje.'%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
        </div>';
        return $resultado;
    }
    
    public function get_nombre_objetivo(){
        $this->load->database();
        $query = $this->db->query("SELECT nombre FROM `tareas` WHERE tareas.id = ".$this->uri->segment(3)." and  tareas.id = tareas.tarea_padre");
        $row = $query->row();
        return $row->nombre;
    }
    
    public function get_nombre_objetivo_id($id){
        $this->load->database();
        $query = $this->db->query("SELECT nombre FROM `tareas` WHERE tareas.id = ".$id." and  tareas.id = tareas.tarea_padre");
        $row = $query->row();
        return $row->nombre;
    }
    
    public function get_nombre_tarea(){
        $this->load->database();
        $query = $this->db->query("SELECT nombre FROM `tareas` WHERE tareas.id = ".$this->uri->segment(3)."");
        $row = $query->row();
        return $row->nombre;
    }
    
    public function procesar_asignar_tarea(){
        $this->load->database();        
        $query = $this->db->query("UPDATE `tareas` SET `id_persona`= '".$this->input->post('responsable')."' WHERE `id` = '".$this->uri->segment(3)."' ");
        echo "<script>alert('Asignado con exito');</script>";
        echo "<script>window.location.href = '../../tareas/".$this->uri->segment(4)."';</script>";  
    }
    
    public function get_tareas(){
        $this->load->database();        
        $query = $this->db->query("SELECT 
            tareas.id,tareas.nombre,
            DATE_FORMAT(tareas.fecha_creacion, '%d/%b/%Y') as fecha_creacion ,
            DATE_FORMAT(tareas.fecha_limite, '%d/%b/%Y') as fecha_limite,
            IF (tareas.estado = 0,DATEDIFF(tareas.fecha_limite,tareas.fecha_cierre),DATEDIFF(now(),tareas.fecha_limite)) as tiempo
            ,tareas.estado,usuarios.nombre as encargado FROM `tareas`,usuarios WHERE tareas.id_persona = usuarios.id_usuario and  tareas.id != tareas.tarea_padre and tareas.tarea_padre = ".$this->uri->segment(3)."");
        return $query->result();
    }
    
    public function progreso($tiempo){
        $regresar = "";
        if ($tiempo < 0){
            $regresar = '<td class="table-danger"><b><h3><center>'.$tiempo.'</h3></b></td>';
        }else{
            $regresar = '<td><b><h3><center>'.$tiempo.'</h3></b></td>';
        }
        return $regresar;
    }
    
    
    public function get_tareas_estudiante(){
        $this->load->database();
        $query = $this->db->query("
        SELECT 
            `id`, `id_persona`, `nombre`, `descripcion`, `tarea_padre`, 
            DATE_FORMAT(tareas.fecha_creacion, '%d/%b/%Y') as fecha_creacion , 
            DATE_FORMAT(tareas.fecha_limite, '%d/%b/%Y') as fecha_limite, 
            `fecha_cierre`, 
            `estado`, 
            IF(estado = 0,DATEDIFF(tareas.fecha_limite,tareas.fecha_cierre),DATEDIFF(tareas.fecha_limite,now()) ) as tiempo 
        FROM `tareas` 
        WHERE 
            (`id` != `tarea_padre`) and 
            (`id_persona` = ".$_SESSION['usuario'].") ORDER BY `fecha_cierre` DESC, estado DESC");
       
        return $query->result();
    }
    
    public function get_nombre_persona($id){
        $this->load->database();
        $query = $this->db->query("SELECT nombre FROM `usuarios` WHERE id_usuario = ".$id."");
        $row = $query->row();
        return $row->nombre;
    }
    
    public function avance_bitacora($porcentaje){
        if($porcentaje < 40 ){
            $clase = 'progress-bar bg-danger';
        }else{
            if($porcentaje == 100){
                $clase = 'progress-bar bg-success';
            }else{
                $clase = 'progress-bar bg-warning';
            }
        }
        $resultado = '
        <div class="progress mb-4">
            <div class="'.$clase.'" role="progressbar" style="width: '.$porcentaje.'%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
        </div>';
        return $resultado;
    }
    
    public function print_evidencias($json){
        if ($json != "null"){
            $evidencias_json = json_decode($json,true);
            $evidencias = "";
            $contador = 0; 
            foreach ($evidencias_json as $valor){
                $evidencias .= "<a href='../../../upload/$valor'  target='_blanck' >$valor</a><br>";
            }
            return $evidencias;
        }
        return "";
    }
    
    public function get_bitacora(){
        $this->load->database();
        $query = $this->db->query("SELECT bitacora.nombre,DATE_FORMAT(bitacora.fecha_registro, '%d/%b/%Y') as fecha_registro,porcentaje, descripcion , usuarios.nombre as encargado,bitacora.evidencias FROM bitacora,usuarios WHERE bitacora.id_persona = usuarios.id_usuario and `id_tarea` = ".$this->uri->segment(3)." order by porcentaje DESC");
        return $query->result();
    }
    
    function get_estudiantes(){
        $this->load->database();    
        $query = $this->db->query("SELECT id_usuario, nombre FROM usuarios");
        return $query->result();
    }
    
    function get_objetivos(){
 
        $this->load->database();    
        $query = $this->db->query("SELECT `id`,`nombre` FROM `tareas` WHERE `id` =`tarea_padre`");
        return $query->result();
    }
}
?>