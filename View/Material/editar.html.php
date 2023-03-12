  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
         
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-grey-900 mb-4">Editar Material</h1>
              </div>
              <form class="user" enctype="multipart/form-data" method="POST" action="<?php echo getUrl("material", "material", "postEditar");?>">
                <div class="form-group row">
                  <?php foreach ($material as $mat) {} ?>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    Codigo <input type="number" class="form-control form-control-user" id="Codigo" readonly name="Codigo" value="<?php echo $mat['mat_id']; ?>">
                  </div>
                  <div class="col-sm-6">
                   Descripcion <input type="text" class="form-control form-control-user" id="Descripcion" name="Descripcion" value="<?php echo $mat['mat_descripcion']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <div class="form-label-group">
                      Imagen Material <input type="file" id="ImagenMaterial" class="form-control" placeholder="ImagenMaterial" name="ImagenMaterial">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-label-group">
                      Costo de unidad <input type="number" id="CostoUnidad" class="form-control" placeholder="Costo" name="CostoUnidad" value="<?php echo $mat['mat_costo_unidad']; ?>">
                    </div>
                  </div>
                </div>
                 <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  Unidad Medida <select class="form-control" id="UnidadMedida" readonly name="UnidadMedida">
                    <option value="">Selecione Unidad medida</option>
                    <?php
                    $seleccion="";
                    foreach($UniMed as $umed)
                    {
                      if($mat['uni_med_id']==$umed['uni_med_id'])
                      {
                        $seleccion="selected";
                      }
                      echo "<option value='".$umed['uni_med_id']."' $seleccion>".$umed['uni_med_descripcion']."</option>";
                      $seleccion="";
                    }
                    ?>
                        </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  Color <select class="form-control" id="Color" readonly name="Color">
                    <option value="">Selecione un Color</option>
                    <?php
                    $seleccion="";
                    foreach($colors as $col)
                    {
                      if($mat['col_id']==$col['col_id'])
                      {
                        $seleccion="selected";
                      }
                      echo "<option value='".$col['col_id']."' $seleccion>".$col['col_nombre']."</option>";
                      $seleccion="";
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
          Estado <select class="form-control form-control-lg btn-user" id="Estado" readonly name="Estado">
                    <option value="">Selecione un estado</option>
                    <?php
                    $seleccion="";
                    foreach($estados as $est)
                    {
                      if($mat['est_id']==$est['est_id'])
                      {
                        $seleccion="selected";
                      }
                      echo "<option value='".$est['est_id']."' $seleccion>".$est['est_descripcion']."</option>";
                      $seleccion="";
                    }
                    ?>
                  </select>
        </div>
        </div>
        <div class="col-md-6">
                <div class="form-label-group">
                 Cantidad <input type="number" id="Cantidad" class="form-control" placeholder="Cantidad" name="Cantidad" value="<?php echo $mat['mat_cantidad']; ?>">
                </div>
              </div>
      </div>
      </div>
    </div>
          <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                 <input type="hidden" name="RutaMatImg" value="<php echo $mat['mat_imagen']; ?>">
                </div>
              </div>
            </div>
          </div> 
              <div class="col-md-12">
                <div class="form-label-group">
                  <button type="submit" class="btn btn-success btn-user btn-block">
                    Actualizar
                  </button>
                </div>
              </div>
              
                <hr>
              </form>
              <hr>
          
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>