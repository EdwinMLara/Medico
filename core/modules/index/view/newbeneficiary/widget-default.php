  <div class="row">

	<div class="col-md-8">
	  <h1>Nuevo Beneficiario de: 
      <?php
        if(!isset($_POST["name_titular"])){
          echo $_GET["Nombre"]." ".$_GET["Apellido"];
        }else{
          echo $_POST["name_titular"];
        }
      ?> 
    </h1><br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addbeneficiary" role="form">
      <input type="hidden" name="id_titular" id="id_titular">
      <input type="hidden" name="id_paciente_beneficiario" id="id_paciente_beneficiario" value="<?php if(isset($_POST['name_id'])){ echo $_POST['name_id']; }?>">
      <?php
        if(!isset($_POST["name_titular"])){
          $Nombre = $_GET["Nombre"];
          $Apellido = $_GET["Apellido"];
          $id =  IncumbentData::getId_titular($_GET["Nombre"],$_GET["Apellido"]);
          $id_titular = $id->id_titular;
        }else{
          $aux_name_titular = trim($_POST["name_titular"]);
          $array = explode(" ",$_POST["name_titular"]);
          $num_name = count($array);
          if($num_name > 3){
            $num_name = count($array) - 3;
          }
          else{
            $num_name = count($array) - 2;
          }
          $Nombre = "";
          $Apellido = "";
          for($i=0;$i<$num_name;$i++){
            $Nombre = $Nombre.$array[$i]." ";
          } 
          $Nombre = trim($Nombre);
          $Apellido = $array[$num_name]." ".$array[$num_name+1];
          $Apellido = trim($Apellido);
          $id_paciente_titular = $_POST["name_id"];
          $Paciente = PacientData::getById($id_paciente_titular); 
          
          echo "<script> document.getElementById('id_titular').value = '$Paciente->id_titular' </script>";
        }

        if(isset($_POST['id_paciente'])){
          $paciente = PacientData::getById($_POST['id_paciente']);
          $Nombre_beneficiario = $paciente->name;
          $Apellido_beneficiario = $paciente->lastname;
        }

      ?>
      <div class="form-group">
        <label for="inputEmail1" class="col-md-2 col-form-label">Nombre</label>
        <div class="col-md-10">
          <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre" value="<?php
            if(isset($_POST['id_paciente'])){
              echo $Nombre_beneficiario;
            }
          ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail1" class="col-md-2 col-form-label">Apellido</label>
        <div class="col-md-10">
          <input type="text" name="Apellido" required class="form-control" id="Apellido" placeholder="Apellido" value="<?php
            if(isset($_POST['id_paciente'])){
              echo $Apellido_beneficiario;
            } 
           ?>">
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 col-form-label"> Alergias</label>
          <div class="col-md-10">
            <input type="text" name="alergias" required class="form-control" id="alergias" placeholder="Alergias" value="Ninguna">
          </div>
      </div>

      <div class="form-group">
        <label class="col-md-3 col-form-label">Parentesco</label>
          <div class="col-md-9">
            <select class="form-control" id="Departamento" name="Parentesco">
              <option selected>Padre</option>
                <option>Madre</option>
                <option>Hijo(a)</option>
                <option>Esposa</option>
              </select>
          </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 col-form-label"> Foto </label>
          <div class="col-md-3"></div>
          <div class="col-md-4">
            <div id="prueba">
              <canvas id="canvas">
                
              </canvas>
            </div>
          </div>
          <div class="col-md-3"></div>
      </div>

      <div class="form-group">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Agregar Beneficiario</button>
        </div>
      </div>
    </form>
	</div>

  <div class="col-md-4">
    <div class="row">
      <div class="user_image">
        <video id="player" autoplay></video>
      </div>
      
      <div class="form-group">
        <div class="col-md-12">
          <button  class="btn btn-primary" id="btn-foto">Tomar foto</button>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="js/Camara/Fotos.js"></script>