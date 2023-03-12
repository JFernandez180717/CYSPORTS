  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
         
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-grey-900 mb-4">Editar Unidad medida</h1>
              </div>
              <form class="user" enctype="multipart/form-data" method="POST" action="<?php echo getUrl("Unidad_Medida", "UnidadMedida", "postEditar");?>">
                <div class="form-group row">
                  <?php foreach ($unidadmedida as $uni) {} ?>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    Codigo <input type="number" class="form-control form-control-user" id="Codigo" readonly name="Codigo" value="<?php echo $uni['uni_med_id']; ?>">
                  </div>
                  <div class="col-sm-6">
                   Descripcion <input type="text" class="form-control form-control-user" id="Descripcion" name="Descripcion" value="<?php echo $uni['uni_med_descripcion']; ?>">
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
                      if($uni['est_id']==$est['est_id'])
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