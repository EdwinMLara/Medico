	<div class="col-md-8">
	   <h3>Titular del Seguro</h3>
	   <br>
      <?php
        if(isset($_GET["id_paciente"])){
          $paciente = PacientData::getById($_GET["id_paciente"]);
          $Nombre_beneficiario = $paciente->name;
          $Apellido_beneficiario = $paciente->lastname;
        
          echo "<input type='hidden' name='id_paciente' value='".$_GET['id_paciente']."'>";
          $Nombre = $_GET["Nombre"];
          $Apellido = $_GET["Apellido"];
        }else if(isset($_GET["Nombre"])){
          $Nombre = $_GET["Nombre"];
          $Apellido = $_GET["Apellido"];
        }
      ?>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addbeneficiary-titular" role="form">

      <div class="form-group">
        <label for="inputEmail1" class="col-md-2 col-form-label">Nombre del titular</label>
        <div class="col-md-10">
          <input type="text" name="Nombre_titular" class="form-control" id="Nombre_titular" value="<?php
          if(isset($_GET['id_paciente']) || isset($_GET['Nombre'])){
            echo $Nombre;
          }?>" placeholder="Nombre">
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail1" class="col-md-2 col-form-label">Apellido del titular</label>
        <div class="col-md-10">
          <input type="text" name="Apellido_titular" required class="form-control" id="Apellido_titular" value="<?php
          if(isset($_GET['id_paciente']) || isset($_GET['Nombre'])){
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

      <h3>Beneficiario del Seguro</h3>

      <div class="form-group">
        <label for="inputEmail1" class="col-md-2 col-form-label">Nombre del beneficiario</label>
        <div class="col-md-10">
          <input type="text" name="Nombre_beneficiario" class="form-control" id="Nombre" placeholder="Nombre" value="<?php
            if(isset($_GET['id_paciente'])){
              echo $Nombre_beneficiario;
            }
          ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail1" class="col-md-2 col-form-label">Apellido del beneficiario</label>
        <div class="col-md-10">
          <input type="text" name="Apellido_beneficiario" required class="form-control" id="Apellido" placeholder="Apellido" value="<?php
            if(isset($_GET['id_paciente'])){
              echo $Apellido_beneficiario;
            } 
           ?>">
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-3 col-form-label">Parentesco</label>
          <div class="col-md-9">
            <select class="form-control" id="Parentesco" name="Parentesco">
              <option selected>Padre</option>
                <option>Madre</option>
                <option>Hijo</option>
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