  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
         
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-grey-900 mb-4">Listar Unidad Medida</h1>
              </div>

              <table class="table table-bordered dataTable" id="table_unidad_medida">
                <thead>
                  <th style="background-color:gray; color:white; text-align:center;">Codigo</th>
                  <th style="background-color:gray; color:white; text-align:center;">Descripcion</th>
                  <th style="background-color:gray; color:white; text-align:center;">Estado</th>
                  <th style="background-color:gray; color:white; text-align:center;">editar</th>
                  <th style="background-color:gray; color:white; text-align:center;">eliminar</th>
                </thead>
                <tbody>
                  <?php
                    foreach($unidadmedida as $uni)
                  {
                    echo "<tr>";
                      echo "<td>".$uni['uni_med_id']."</td>";
                      echo "<td>".$uni['uni_med_descripcion']."</td>";
                      echo "<td>".$uni['est_descripcion']."</td>";
                      echo "<td style='text-align:center'> <a 
                              href='index.php?modulo=Unidad_Medida&controlador=UnidadMedida&funcion=getEditar&Codigo=".$uni['uni_med_id']."'>
                              <button type='button'  
                              class='btn btn-success' title='editar registro'>
                              <i class='fas fa-edit'></i>
                              </button>
                              </a>
                          </td>";
                          echo "<td style='text-align:center'> <a 
                              href='index.php?modulo=Unidad_Medida&controlador=UnidadMedida&funcion=postEliminar&Codigo=".$uni['uni_med_id']."'>
                              <button type='button'  
                              class='btn btn-danger' title='eliminar registro'>
                              <i class='fas fa-trash'></i>
                              </button>
                              </a>
                          </td>";
                      
                    echo "</tr>";
                  }
                  ?>
                </tbody>
             </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   <div class="modal fade" id="modalUnidadMedida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el registro?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      <form method="POST" action="<?php echo getUrl ("Unidad_Medida", "UnidadMedida", "postEliminar");?>">
        <div class="modal-body">
              <input type="text" id="Codigo" name="Codigo">
            Seleccione "eliminar" para borrar el registro.
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <button class="btn btn-warning" type="submit">Eliminar</button>
        </div>
      </form>
      </div>
    </div>
  </div>