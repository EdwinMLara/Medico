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
        <form role="form" id="modal-form" autocomplete="off" method="post" action="index.php?view=newtitular">
            

              <div class="form-group" id="div_paciente">
                <input type="text" id="name_paciente" name="name_paciente" class="form-control" value="<?php
                  $aux = str_replace(' ', '', $pacientsid->name);  
                  echo $aux." ".$pacientsid->lastname;
                ?>">
              </div>

              <div class="form-group">

              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Es el Titular del Seguro?</label>

					    <select class="form-control" name="hay_titular" id="hay_titular" onchange="actualizar_datos_titular();">
		              	<option selected value="inf">Si</option>
		                <option value="1">No</option>
		          </select>

              <div class="hidden" id="div_titular">
                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Nombre del titular</label>

                <input type="text" id="name_titular" name="name_titular" class="form-control">
              </div>
				
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


