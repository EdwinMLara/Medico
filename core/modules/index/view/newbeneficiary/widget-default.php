  <div class="row">

	<div class="col-md-8">
	  <h1>Nuevo Beneficiario de: <?php echo $_GET["Nombre"]." ".$_GET["Apellido"];?> </h1><br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addbeneficiary" role="form">
      <input type="hidden" name="id_titular" id="id_titular">
      <input type="hidden" name="Nombre_titular" id="Nombre_titular">
      <input type="hidden" name="Apellido_titular" id="Apellido_titular">
      <?php
        $Nombre = $_GET["Nombre"];
        $Apellido = $_GET["Apellido"];
        $id =  IncumbentData::getId_titular($_GET["Nombre"],$_GET["Apellido"]);
        $id_num = $id->id_titular;

        echo "<script>
                document.getElementById('id_titular').value = $id_num;
                document.getElementById('Nombre_titular').value = '$Nombre';
                document.getElementById('Apellido_titular').value = '$Apellido';
             </script>";
      ?>
      <div class="form-group">
        <label for="inputEmail1" class="col-md-2 col-form-label">Nombre</label>
        <div class="col-md-10">
          <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre">
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail1" class="col-md-2 col-form-label">Apellido</label>
        <div class="col-md-10">
          <input type="text" name="Apellido" required class="form-control" id="Apellido" placeholder="Apellido">
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-3 col-form-label">Parentesco</label>
          <div class="col-md-9">
            <select class="form-control" id="Departamento" name="Parentesco">
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
        <!--<img src="core/modules/index/view/img/Koala.jpg" alt="">-->
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