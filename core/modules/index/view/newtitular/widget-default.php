<div class="row">
	<div class="col-md-8">
	   <h1>Nuevo Titular del Seguro</h1>
	   <br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addincumbent" role="form">


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
        <label for="inputEmail1" class="col-md-2 col-form-label">Departamento</label>
        <div class="col-md-10">
          <input type="text" name="Departamento" class="form-control" required id="Departamento" placeholder="Departamento">
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