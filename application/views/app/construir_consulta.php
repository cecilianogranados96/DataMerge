<body id="page-top">
        <div class="container-fluid">
            <center>
          <h1 class="h3 mb-2 text-gray-800">Objetivos</h1>
                <a href="#" onclick="window.print()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Imprimir</a>
            </center>

          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Objetivos del proyecto</h6>
            <pre>

            </div>
            <div class="card-body">
              <div class="table-responsive">

                <table class="table" id="formulario">
    <tr>
        <td>
            <center><b>Espacio #1</b></center>
        </td>

        <td>
            <center><b>Comparacion</b></center>
        </td>
        <td>
            <center><b>Espacio #2</b></center>
        </td>

        <td>
            <center><b>Especial</b></center>
        </td>
        <td>
            <center><b>Guardar</b></center>
        </td>
        <td>
            <center><b>Añadir Campo </b></center>
        </td>
    </tr>

    <tr id="clonedInput1" class="clonedInput">
      <td>
          <select id="tabla1" name="tabla1[]" class="tipo tabla1 form-control input-md" onchange="verificar(this);" required>
              <option value="">Seleccionar</option> <!--TABLA 1-->
                <?php
                  $this->load->database();
                  $query = $this->db->query(" SELECT REPLACE(TABLE_NAME, 'data_' , '') as nombre_tabla FROM INFORMATION_SCHEMA.TABLES where TABLE_SCHEMA = 'datamerge' and TABLE_NAME like '%data_%'  ");
                  $datos = $query->result();
                  foreach($datos as $row) {
                    echo '<option value="data_'.$row->nombre_tabla.'" disabled>'.$row->nombre_tabla.'</option>';
                    $query1 = $this->db->query(" SELECT COLUMN_NAME as nombre_columuna FROM INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA = 'datamerge' and TABLE_NAME = 'data_".$row->nombre_tabla."'  ");;
                    $datos1 = $query1 ->result();
                    foreach($datos1 as $row1) {
                      echo '<option value="'.$row->nombre_tabla.'-'.$row1->nombre_columuna.'"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row1->nombre_columuna.'</option>';
                    }
                  }
                ?>
          </select>
      </td>
        <!-- COMPARATIVOS -->
        <td>
            <select id="comparacion" name="comparacion[]" class="tipo comparacion form-control input-md" onchange="verificar(this);" required>
                <option value="">Seleccionar</option>
                <?php
                    $query1 = $this->db->query(" SELECT * FROM `comparacion` ")->result();
                    foreach($query1 as $row) {
                      echo '<option value="'.$row->id.'"> '.$row->nombre.'</option>';
                    }
                ?>
            </select>
        </td>
        <!-- TABLA 2 -->
        <td>
            <select id="tabla2" name="tabla2[]" class="tipo tabla2 form-control input-md"  required>
                <option value="">Seleccionar</option> <!--TABLA 2-->
                <?php
                  $this->load->database();
                  $query = $this->db->query(" SELECT REPLACE(TABLE_NAME, 'data_' , '') as nombre_tabla FROM INFORMATION_SCHEMA.TABLES where TABLE_SCHEMA = 'datamerge' and TABLE_NAME like '%data_%'  ");
                  $datos = $query->result();
                  foreach($datos as $row) {
                    echo '<option value="data_'.$row->nombre_tabla.'" disabled>'.$row->nombre_tabla.'</option>';
                    $query1 = $this->db->query(" SELECT COLUMN_NAME as nombre_columuna FROM INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA = 'datamerge' and TABLE_NAME = 'data_".$row->nombre_tabla."'  ");;
                    $datos1 = $query1 ->result();
                    foreach($datos1 as $row1) {
                      echo '<option value="'.$row->nombre_tabla.'-'.$row1->nombre_columuna.'"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row1->nombre_columuna.'</option>';
                    }
                  }
                ?>
            </select>
        </td>
        <td>
            <select id="especial" name="especial[]" class="tipo especial form-control input-md"  required>
                <option value="">Seleccionar</option>
                <?php
                    $query1 = $this->db->query(" SELECT * FROM `especiales` ")->result();
                    foreach($query1 as $row) {
                      echo '<option value="'.$row->id.'"> '.$row->nombre.'</option>';
                    }
                ?>
            </select>
        </td>
        <td>
            <center> <input type="checkbox"  name="guardar[]" onclick="guardar()"> </center> 
        </td>

        
        <td>
            <button type="button" class="clone btn btn-success">Añadir Campo</button>
        </td>
    </tr>
</table>
<center><button class="btn btn-success" type="submit">Enviar</button></center>
</form>
</div>
</div>
<script type="text/javascript" src="//code.jquery.com/jquery-1.6.4.js"></script>


              </div>
            </div>
          </div>
        </div>
<script>
    function guardar(){
        var tabla1 = [];
        $( ".tabla1" ).each(function() {
            tabla1.push($(this).val());
        }); 
        var tabla2 = [];
        $( ".tabla2" ).each(function() {
            tabla2.push($(this).val());
        });
        var comparador = [];
        $( ".comparacion" ).each(function() {
            comparador.push($(this).val());
        });
        var especial = [];
        $( ".especial" ).each(function() {
            especial.push($(this).val());
        }); 

    
        $.post( "guardar_contructor", { tabla1: tabla1 , tabla2: tabla2, comparador: comparador, especial:especial } )function(data) {
          alert( "Data Loaded: " + data )
        });

        
    }
    
    </script>


        <script type="text/javascript">
  

        $(window).load(function(){
        var regex = /^(.+?)(\d+)$/i;
        var cloneIndex = $(".clonedInput").length+1;
        function clone(){
        $(this).parents(".clonedInput").clone()
        .appendTo("table")
        .attr("id", "clonedInput" +  cloneIndex)
        .find("*")
        .each(function() {
            var id = this.id || "";
            var match = id.match(regex) || [];
            if (match.length == 3) {
                this.id = match[1] + (cloneIndex);
            }
        })
        .on('click', 'button.clone', clone);
        cloneIndex++;
        }
        function remove(){
        $(this).parents(".clonedInput").remove();
        }
        $("button.clone").on("click", clone);
        });
        </script>