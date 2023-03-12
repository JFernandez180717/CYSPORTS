<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header text-center">Crear Producto</div>
      <div class="card-body">
        <form class="user" enctype="multipart/form-data" method="POST" action="<?php echo getUrl("Producto", "Producto", "postCrear");?>">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  Código <input type="number" id="Codigo" class="form-control" placeholder="Codigo producto" readonly name="Codigo"  value="<?php echo $num_pro; ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  Nombre <input type="text" id="Nombre" class="form-control-user form-control" placeholder="Nombre Producto" name="Nombre">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
			<div class="form-row">
				<div class="col-md-6">
					<div class="form-label-group">
						Descripcion <input type="text" id="Descripcion" class="form-control" placeholder="Descripcion" name="Descripcion">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-label-group">
						Precio <input type="number" id="Precio" class="form-control" placeholder="Precio" name="Precio">
					</div>
				</div>
			</div>
          </div>
		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  Imagen Producto <input type="file" id="ImagenProducto" class="form-control" placeholder="ImagenProducto" name="ImagenProducto">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  Imagen Despiece <input type="file" id="ImagenDespiece" class="form-control" placeholder="ImagenDespiece" name="ImagenDespiece">
                </div>
              </div>
            </div>
		  </div>
      <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                 Imagen Figurin <input type="file" id="ImagenFigurin" class="form-control" placeholder="ImagenFigurin" name="ImagenFigurin">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  Imagen Proceso Operacion <input type="file" id="ImagenProcesoOp" class="form-control" placeholder="ImagenProcesoOp" name="ImagenProcesoOp">
                </div>
              </div>
            </div>
      </div>
      <div class="form-group">
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-label-group">
           Fecha Registro <input type="date" id="FechaRegistro" class="form-control" placeholder="FechaRegistro" name="FechaRegistro">
          </div>
        </div>
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
    <div class="form-group">
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-label-group">
            Linea <select class="form-control" id="Linea" name="Linea">
                    <option value="">Selecione una Linea</option>
                    <?php
                    foreach($lineas as $lin)
                    {
                      echo "<option value='".$lin['lin_id']."'>".$lin['lin_nombre']."</option>";
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
    </div>
          <div class="form-group">
            <div class="form-row">
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