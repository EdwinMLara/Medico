<div class="row">
	<div class="col-md-8">
	   <h1>Titular del Seguro</h1>
	   <br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateincumbent&id=<?php echo $_GET["id_titular"]?>" role="form">


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
        <label for="inputEmail1" class="col-md-2 col-form-label">Departamento</label>
        <div class="col-md-10">
          <input type="text" name="Departamento" class="form-control" required id="Departamento" placeholder="Departamento" value="<?php echo $_GET["Departamento"]?>">
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-3 col-form-label"> Numero de Beneficiarios</label>
          <div class="col-md-9">
            <select class="form-control" name="Num_familiares">
              <option selected>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
          </div>
      </div>

      <div class="form-group">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
      </div>

    </form>
	</div>

  <div class="col-md-4">
    <div class="row">
      <div class="user_image">
        <img src="uploads/images/<?php echo $_GET["Ruta_foto"]?>" alt="">
      </div>
      
    </div>
  </div>
</div>