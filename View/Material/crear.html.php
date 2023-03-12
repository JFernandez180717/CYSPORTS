<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header text-center">Crear Material</div>
      <div class="card-body">
        <form class="user" enctype="multipart/form-data" method="POST" action="<?php echo getUrl("Material", "Material", "postCrear");?>">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  Codigo <input type="number" id="Codigo" class="form-control" placeholder="Codigo Material" readonly name="Codigo"  value="<?php echo $num_mat; ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  Descripcion <input type="text" id="Descripcion" class="form-control-user form-control" placeholder="Descripcion Material" name="Descripcion">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
			<div class="form-row">
				<div class="col-md-6">
          <div class="form-label-group">
             Imagen Material <input type="file" id="ImagenMaterial" class="form-control" placeholder="ImagenMaterial" name="ImagenMaterial">
          </div>
        </div>
				<div class="col-md-6">
					<div class="form-label-group">
						Costo de unidad <input type="number" id="CostoUnidad" class="form-control" placeholder="Costo" name="CostoUnidad">
					</div>
				</div>
			</div>
          </div>
		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  Unidad Medida <select class="form-control" id="UnidadMedida" name="UnidadMedida">
                    <option value="">Selecione Unidad medida</option>
                    <?php
                    foreach($UniMed as $umed)
                    {
                      echo "<option value='".$umed['uni_med_id']."'>".$umed['uni_med_descripcion']."</option>";
                    }
                    ?>
                        </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  Color <select class="form-control" id="Color" name="Color">
                    <option value="">Selecione un Color</option>
                    <?php
                    foreach($colors as $col)
                    {
                      echo "<option value='".$col['col_id']."'>".$col['col_nombre']."</option>";
                    }
                    ?>
                      </select>
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
        <div class="col-md-6">
                <div class="form-label-group">
                 Cantidad <input type="number" id="Cantidad" class="form-control" placeholder="Cantidad" name="Cantidad">
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