<div class="row">
	<div class="col-md-8">
	   <h1>Nuevo Titular del Seguro</h1>
	   <br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=adduser" role="form">


      <div class="form-group">
        <label for="inputEmail1" class="col-md-2 col-form-label">Nombre</label>
        <div class="col-md-10">
          <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail1" class="col-md-2 col-form-label">Apellido</label>
        <div class="col-md-10">
          <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
        </div>
      </div>
      
      <div class="form-group">
        <label for="inputEmail1" class="col-md-2 col-form-label">Departamento</label>
        <div class="col-md-10">
          <input type="text" name="username" class="form-control" required id="username" placeholder="Nombre de usuario">
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-3 col-form-label"> Numero de Beneficiarios</label>
          <div class="col-md-9">
            <select class="form-control">
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
          <button type="submit" class="btn btn-primary">Agregar Titular</button>
        </div>
      </div>

    </form>
	</div>

  <div class="col-md-4">
    <div class="row">
      <div class="user_image">
        <img src="core/modules/index/view/img/Koala.jpg" alt="">
      </div>
      
      <div class="form-group">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Tomar foto</button>
        </div>
      </div>
    </div>
  </div>
  
</div>