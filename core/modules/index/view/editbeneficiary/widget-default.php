<div class="row">
	<div class="col-md-8">
	   <h1>Benefiario del Seguro</h1>
	   <br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatebeneficiary&&id=<?php echo $_GET["id"] ?>&id_beneficiario=<?php echo $_GET["id_beneficiario"] ?>&id_titular=<?php echo $_GET["id_titular"] ?>&act=1" role="form">


      <div class="form-group">
        <label for="inputEmail1" class="col-md-2 col-form-label">Nombre</label>
        <div class="col-md-10">
          <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre" value="<?php echo $_GET["Nombre"]?>">
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail1" class="col-md-2 col-form-label">Apellido</label>
        <div class="col-md-10">
          <input type="text" name="Apellido" required class="form-control" id="Apellido" placeholder="Apellido" value="<?php echo $_GET["Apellido"]?>">
        </div>
      </div>
      
      <div class="form-group">
        <label for="inputEmail1" class="col-md-2 col-form-label">Parentesco</label>
        <div class="col-md-10">
          <input type="text" name="Departamento" class="form-control" required id="Departamento" placeholder="Parentesco" value="<?php echo $_GET["Departamento"]?>">
        </div>
      </div>

      <div class="form-group">

        <div class="col-md-3"></div>
        <div class="col-md-4">
          <!--<div class="user_image">
            <img src="uploads/images/<?php echo $_GET["Ruta_foto"] ?>" alt="">
          </div>-->
          <div id="prueba">
              <canvas id="canvas">
              </canvas>
            </div>
        </div>

        <div class="col-md-3">
          <div class="col-md-4"></div>
          <div class="col-md-8">
            <div class="form-group">

              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
          </div>
        </div>
      </div>

    </form>
	</div>

  <div class="col-md-4">
    <div class="row">
      <div class="user_image">
        <video id="player" autoplay></video><br>
        <button class="btn btn-primary" id="btn-foto">Tomar foto</button>
      </div>
    </div>
  </div>

</div>

<script src="js/Camara/Fotos.js"></script>