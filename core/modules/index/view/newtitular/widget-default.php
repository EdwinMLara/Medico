<div class="row">
	<div class="col-md-8">
	   <h1>Nuevo Titular del Seguro</h1>
	   <br>
      <?php
        if(isset($_POST["id_paciente"])){
          $paciente_titular = PacientData::getById($_POST["id_paciente"]);
          $Nombre = $paciente_titular->name;
          $Apellido = $paciente_titular->lastname;
          $departamento = $paciente_titular->departament;
          $alergias = $paciente_titular->alergias;
          echo "<input type='hidden' name='id_paciente' value='".$_POST['id_paciente']."'>";
        }else if(isset($_GET["Nombre"])){
          $Nombre = $_GET["Nombre"];
          $Apellido = $_GET["Apellido"];
        }
      ?>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addincumbent" role="form">

      <div class="form-group">
        <label for="inputEmail1" class="col-md-2 col-form-label">Nombre</label>
        <div class="col-md-10">
          <input type="text" name="Nombre" class="form-control" id="Nombre" value="<?php
          if(isset($_POST['id_paciente']) || isset($_GET['Nombre'])){
            echo $Nombre;
          }?>" placeholder="Nombre">
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail1" class="col-md-2 col-form-label">Apellido</label>
        <div class="col-md-10">
          <input type="text" name="Apellido" required class="form-control" id="Apellido" value="<?php
          if(isset($_POST['id_paciente']) || isset($_GET['Nombre'])){
            echo $Apellido;
          }?>"

          placeholder="Apellido">
        </div>
      </div>
      
      <div class="form-group">
        <label for="inputEmail1" class="col-md-2 col-form-label">Departamento</label>
        <div class="col-md-10">
          <?php
            if(isset($_POST['id_paciente'])){
               ?><input type="text" name="Departamento" class="form-control" required id="Departamento" value="<?php
                    if(isset($_POST['id_paciente'])){
                        echo $departamento; 
                      }
                  ?>"
                 placeholder="Departamento"><?php
            }else{
              $departamentos = new DepartamentosData(); 
              $departamentos_array = $departamentos->get_dptos();
              ?>
              <select class="form-control" id="Departamento" name="Departamento">
              <option selected>Seleciona deparatamentos</option>
              <?php
              foreach ($departamentos_array as $departamento) {
                $nombre = $departamento->nombre;
                echo "<option value='$nombre'>$nombre</option>";
              }
              echo "</select>";
            }
          ?>
          
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 col-form-label"> Alergias</label>
          <div class="col-md-10">
            <input type="text" name="alergias" required class="form-control" id="alergias" placeholder="Alergias" value="<?php
            if(isset($alergias)){
              echo $alergias;
            }else{
              echo 'Ninguna';
            }
            ?>">
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
          <button type="submit" class="btn btn-primary">Agregar Titular</button>
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