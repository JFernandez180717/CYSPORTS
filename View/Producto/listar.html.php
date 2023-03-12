  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-2">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-3">
              <div class="text-center">
                <h1 class="h4 text-grey-900 mb-4">LISTA DE PRODUCTOS</h1>
              </div>
              <div class="form-row">
                <div class="col-md-4">
                  <input type="text" class="form-control" id="inputBuscar" placeholder="Buscar...">
                </div>
              </div>
              <table class="table table-bordered dataTable" id="table_producto">
                <thead>
                  <th style="background-color:#bf7879; color:white; text-align:center;">Codigo</th>
                  <th style="background-color:#bf7879; color:white; text-align:center;">Descripcion</th>
                  <th style="background-color:#bf7879; color:white; text-align:center;">Tipo de producto</th>
                  <th style="background-color:#bf7879; color:white; text-align:center;">Cantidad disponible</th>
                  <th style="background-color:#bf7879; color:white; text-align:center;">Color</th>
                  <th style="background-color:#bf7879; color:white; text-align:center;">Estado</th>
                  <th style="background-color:#bf7879; color:white; text-align:center;">Precio</th>
                  <th style="background-color:#bf7879; color:white; text-align:center;">Fecha de registro</th>
                  <th style="background-color:#bf7879; color:white; text-align:center;">Editar</th>
                  <th style="background-color:#bf7879; color:white; text-align:center;">Eliminar</th>
                </thead>
                <tbody>
                  <?php
                    foreach($productos as $prod)
                  {
                    echo "<tr>";
                      echo "<td style='text-align:center'>".$prod['idproducto']."</td>";
                      echo "<td>".$prod['descripcion']."</td>";
                      echo "<td>".$prod['descripcionproducto']."</td>";
                      echo "<td style='text-align:center'>".$prod['cantidad']."</td>";
                      echo "<td>".$prod['nombrecolor']."</td>";
                      echo "<td style='text-align:center'>".$prod['estado']."</td>";
                      echo "<td style='text-align:right'>".$prod['precio']."</td>";
                      echo "<td>".$prod['fecharegistro']."</td>";
                      echo "<td style='text-align:center'> <a 
                              href='index.php?modulo=producto&controlador=producto&funcion=getEditar&Codigo=".$prod['idproducto']."'>
                              <button type='button'  
                              class='btn btn-success' title='editar registro'>
                              <i class='fas fa-edit'></i>
                              </button>
                              </a>
                          </td>";
                          echo "<td style='text-align:center'> <a 
                              href='index.php?modulo=producto&controlador=producto&funcion=postEliminar&Codigo=".$prod['idproducto']."'>
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
   <div class="modal fade" id="modalProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el registro?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      <form method="POST" action="<?php echo getUrl ("producto", "producto", "postEliminar");?>">
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