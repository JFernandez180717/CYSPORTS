  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-2">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-3">
              <div class="text-center">
                <h1 class="h4 text-grey-900 mb-4">EDITAR PRODUCTO</h1>
              </div>
              <form class="user" enctype="multipart/form-data" method="POST" action="<?php echo getUrl("producto", "producto", "postEditar");?>">
                <?php foreach ($producto as $prod) {} ?>
                <div class="form-row">
                  <div class="col-md-12 p-1" style="text-align:center;">
                    <img class="img-cysports" src="<?php echo $prod['imagenproducto']?>" style="height: 170px;">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-2">
                      Codigo 
                      <input
                        type="number"
                        class="form-control form-control-user"
                        id="Codigo"
                        readonly
                        name="Codigo"
                        value="<?php echo $prod['idproducto']; ?>"
                      >
                    </div>
                    <div class="col-sm-7">
                      Descripcion 
                      <input
                        type="text"
                        class="form-control form-control-user"
                        id="Descripcion"
                        name="Descripcion"
                        value="<?php echo $prod['descripcion']; ?>"
                      >
                    </div>
                    <div class="col-md-3">
                      Estado <select class="form-control" id="Estado" name="Estado">
                              <option value="">Selecione un estado</option>
                              <option <?php if($prod['estado'] == 'A'){echo("selected");} ?> value="A">Activo</option>
                              <option <?php if($prod['estado'] == 'I'){echo("selected");} ?> value="I">Inactivo</option>
                              <option <?php if($prod['estado'] == 'X'){echo("selected");} ?> value="X">Anulado</option>
                            </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-sm-4">
                      Precio <input type="number" class="form-control form-control-user" id="Precio" name="Precio" value="<?php echo $prod['precio']; ?>">
                    </div>
                    <div class="col-md-4">
                      Color
                      <input 
                        type="text"
                        class="form-control"
                        id="Color"
                        name="Color"
                        readonly
                        value="<?php echo $prod['nombrecolor']; ?>"
                      >
                    </div>
                    <div class="col-md-4">
                      Cantidad
                      <input
                        type="number"
                        id="Cantidad"
                        class="form-control"
                        placeholder="Cantidad"
                        name="Cantidad"
                        value="<?php echo $prod['cantidad']; ?>"
                      >
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="form-label-group">
                        Imagen Producto <input type="file" id="ImagenProducto" class="form-control" placeholder="ImagenProducto" name="ImagenProducto" value="<?php echo $prod['imagenproducto']; ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      Fecha Registro
                      <input
                        type="date"
                        id="fecharegistro"
                        class="form-control"
                        placeholder="FechaRegistro"
                        name="fecharegistro"
                        value="<?php echo $prod['fecharegistro']; ?>"
                      >
                    </div>
                    <div class="col-md-3">
                      Tipo
                      <select class="form-control" id="Tipo" name="Tipo">
                        <option value="">Selecione una opcion</option>
                        <?php
                          foreach($tiposProductos as $tipos)
                          {
                            if($prod['codtipoproducto'] == $tipos['codtipoproducto']){
                              echo "<option selected value=".$tipos['codtipoproducto'].">".$tipos['descripcion']."</option>";
                            } else {
                              echo "<option value=".$tipos['codtipoproducto'].">".$tipos['descripcion']."</option>";
                            }
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-label-group">
                      <input type="hidden" name="RutaProImg" value="<?php echo $prod['imagenproducto']; ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-12"  style="text-align: center;">
                  <div class="form-label-group">
                    <button type="submit" class="btn btn-cysports btn-user" style="width: 10rem">
                      <i class="fas fa-edit"></i>
                      Guardar
                    </button>
                  </div>
                </div>
              </form>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>