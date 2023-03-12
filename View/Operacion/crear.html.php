<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header text-center">Crear Operacion</div>
      <div class="card-body">
        <form class="user" enctype="multipart/form-data" method="POST" action="<?php echo getUrl("operacion", "operacion", "postCrear");?>">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  Codigo <input type="number" id="Codigo" class="form-control" placeholder="Codigo" readonly name="Codigo"  value="<?php echo $num_ope; ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  Descripcion <input type="text" id="Descripcion" class="form-control-user form-control" placeholder="Descripcion" name="Descripcion">
                </div>
              </div>
            </div>
          </div>
      <div class="form-group">
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-label-group">
          Estado <select class="form-control" id="Estado" name="Estado">
                    <option value="">Selecione un Estado</option>
                    <?php
                    foreach($estados as $est)
                    {
                      echo "<option value='".$est['est_id']."'>".$est['est_descripcion']."</option>";
                    }
                    ?>
          </select>
        </div>
        </div>
      </div>
    </div>
				<button type="submit" name="crear" id="crear" class="btn btn-primary btn-user btn-block">
                  Crear
                </button>
        </form>
      </div>
    </div>
  </div>