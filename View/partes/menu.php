<div class="main-container d-flex">
  <div class="sidebar" id="side_nav">
    <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
      <h1 class="fs-4 fuente-cysport" style="font-weight: bold;  color: white;"><i class="fa-regular fa-gem"></i>  <a class="text-decoration-none text-white" href="index.php">CY SPORTS</a></h1>
      <button class="btn d-md-none d-block close-btn px-1 py-0 mb-3 text-white">
        <i class="fa-solid fa-bars-staggered"></i>
      </button>
    </div>
    <ul class="list-unstyled px-2 navbar-nav ms-auto mb-2 mb-lg-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle d-block p-2" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa-solid fa-shirt"></i>
          <span class="fuente-cysport"> Productos</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header fuente-cysport" style="font-weight: bold;">Actualizar productos:</h6>
          <a class="dropdown-item" href="index.php?modulo=Producto&controlador=Producto&funcion=crear">Crear Producto</a>
          <a class="dropdown-item" href="index.php?modulo=Producto&controlador=Producto&funcion=listar">Actualizar Producto</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle d-block p-2" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-hdd color-items-nav"></i>
          <span class="fuente-cysport color-items-nav">Material</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Opciones:</h6>
          <a class="dropdown-item" href="index.php?modulo=Material&controlador=Material&funcion=crear">Crear Material</a>
          <a class="dropdown-item" href="index.php?modulo=Material&controlador=Material&funcion=listar">Listar Material</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle d-block p-2" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-gavel"></i>
          <span class="fuente-cysport">Operacion</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Opciones:</h6>
          <a class="dropdown-item" href="index.php?modulo=Operacion&controlador=Operacion&funcion=crear">Crear Operacion</a>
          <a class="dropdown-item" href="index.php?modulo=Operacion&controlador=Operacion&funcion=listar">Listar Operacion</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle d-block p-2" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-uniregistry"></i>
          <span class="fuente-cysport">Unidad Medida</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Opciones:</h6>
          <a class="dropdown-item" href="index.php?modulo=Unidad_Medida&controlador=UnidadMedida&funcion=crear">Crear Unidad medida</a>
          <a class="dropdown-item" href="index.php?modulo=Unidad_Medida&controlador=UnidadMedida&funcion=listar">Listar Unidad medida</a>
        </div>
      </li>
    </ul>
  </div>
  <div class="content">
    <nav class="navbar navbar-expand-md bg-cysport">
      <div class="container">
        <div class="d-flex-justify-content-between d-md-none d-block">
          <a class="navbar-brand fuente-cysport fs-4" style="font-weight: bold; color: white;" href="index.php">CY SPORTS</a>
          <button class="btn px-1 py-0 open-btn text-white me-2 mb-2"><i class="fa-solid fa-bars-staggered"></i></button>
        </div>
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa-solid fa-bars"></i>
        </button>
        <!-- Navbar -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                Usuario
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Actualizar datos</a></li>
                <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div id="content-wrapper">
      <div class="container-fluid">
        <?php cargarforms(); ?>
        <!-- /.container-fluid -->
      </div>
      <!-- Sticky Footer -->
      <?php
		    include_once '../View/partes/footer.php';
	    ?>
    </div>
  </div>
</div>  