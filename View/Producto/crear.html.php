<div class="container">
  <div class="card o-hidden border-0 shadow-lg mx-auto my-2">
      <div class="card-body">
        <div class="text-center"><h1 class="h4 text-grey-900 mb-4">CREAR PRODUCTO</h1></div>
        <form enctype="multipart/form-data" method="POST" action="<?php echo getUrl("Producto", "Producto", "postCrear");?>">
          <!--div class="form-group"-->
            <div class="row">
              <div class="form-label col-12 col-md-2">
                Código
                <input
                  type="number"
                  id="Codigo"
                  class="form-control-user form-control"
                  placeholder="Codigo producto"
                  readonly name="Codigo"
                  value="<?php echo $num_pro; ?>"
                >
              </div>
              <div class="form-label col-12 col-md-7">
                Descripcion
                <input
                  type="text"
                  id="Descripcion"
                  class="form-control-user form-control"
                  placeholder="Nombre Producto"
                  name="Descripcion"
                >
              </div>
              <div class="form-label col-12 col-md-3">
                <div class="form-label-group">
                  Estado
                  <select class="form-control" id="Estado" name="Estado">
                    <option value="">Selecione un Estado</option>
                    <option value="A">Activo</option>
                    <option value="I">Inactivo</option>
                    <option value="X">Anulado</option>
                  </select>
                </div>
              </div>
            </div>
          <!--/div-->
          <!--div class="form-group"-->
			      <div class="row">
				      <div class="form-label col-12 col-md-4">
                Precio
                <input
                  type="number"
                  id="Precio"
                  class="form-control"
                  placeholder="Precio"
                  name="Precio"
                >
				      </div>
              <div class="form-label col-12 col-md-4">
                <div class="form-label-group">
                  Color 
                  <select class="form-control" id="Color" name="Color">
                    <option value="">Selecione un Color</option>
                    <?php
                      foreach($colors as $col)
                      {
                        echo "<option value='".$col['idcolor']."'>".$col['nombrecolor']."</option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-label col-12 col-md-4">
                Cantidad
                <input
                  type="number"
                  id="Cantidad"
                  class="form-control"
                  placeholder="Cantidad"
                  name="Cantidad"
                >
              </div>
			      </div>
          <!--/div-->
		      <!--div class="form-group"-->
            <div class="row">
              <div class="form-label col-12 col-md-6">
                Imagen Producto
                <input
                  type="file"
                  id="ImagenProducto"
                  class="form-control"
                  placeholder="ImagenProducto"
                  name="ImagenProducto"
                >
              </div>
              <div class="form-label col-12 col-md-3">
                Fecha Registro
                <input
                  type="date"
                  id="FechaRegistro"
                  class="form-control"
                  placeholder="FechaRegistro"
                  name="FechaRegistro"
                >
              </div>
              <div class="form-label col-12 col-md-3">
                Tipo 
                <select class="form-control" id="Tipo" name="Tipo">
                  <option value="">Selecione un tipo</option>
                  <?php
                    foreach($tiposProductos as $tpro)
                    {
                      echo "<option value='".$tpro['codtipoproducto']."'>".$tpro['descripcion']."</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
		      <!--/div-->
          <!--div class="form-group"-->
            <div class="row">
              <div class="col d-grid" style="text-align: center;">
                <button
                  class="btn btn-cysports"
                  type="submit"
                  name="crear"
                  id="btn-cy"
                >
                    <i class="fas fa-save"></i>
                    Crear
                </button>
              </div>
            </div>
          <!--/div-->
        </form>
      </div>
    </div>
  </div>