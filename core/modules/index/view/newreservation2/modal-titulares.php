<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/receta.css">
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">El Paciente no tiene un titular registrado</h4>
      </div>
      <div class="modal-body">
        <form role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Es el Titular o beneficiario del Seguro</label>
            
					    <select class="form-control" name="hay_titular" id="hay_titular" onchange="actualizar_datos_titular();">
		              	<option selected value="inf"></option>
                    <option value="0">Titular</option>
		                <option value="1">Beneficiario</option>
		          </select>

              <label for="usrname" class="hidden"><span class="glyphicon glyphicon-user"></span> Nombre del titular</label>

              <input type="text" name="name_titular" class="form-control hidden">
				
            </div>
            <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span>Registrar</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


