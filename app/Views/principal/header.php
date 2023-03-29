<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />   
    <link rel="stylesheet" href="<?php echo base_url('css/headerXDD.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/vistasXD.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="<?php echo base_url(); ?>/js/jquery-3.6.0.js"></script>
    <script src="<?php echo base_url(); ?>/js/funciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title><?php echo $titulo; ?></title>
</head>

<header >
<img src="<?php echo base_url('/img/cerveza.png'); ?>" >
<div class="titulo">
    <h1 style="font-family: monospace">BREWERY</h1> 
    <h4  style="font-family: monospace"><?php echo $nombre; ?> </h4>
</div>  
<a href="https://oferta.senasofiaplus.edu.co/sofia-oferta/"><img src="<?php echo base_url('/img/logosena.png'); ?>"></a>
</header>

<nav class="navbar navbar-expand-lg fs-5 font-monospace" style="background-color: #ffffff   ;" >
  <div class="container-fluid" >
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse"  id="navbarNav">
      <ul class="navbar-nav" >
        <li class="nav-item dropdown">
          <a class="nav-link " style="color:black" href="#" id="navbarDropdown"  role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-geo-alt-fill"></i>
            Ubicacion
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #ffffff;">
            <li><a class="dropdown-item fs-5 font-monospace"  href="<?php echo base_url('/paises'); ?>"><i class="fa-sharp fa-solid fa-mountain-city"></i> Pais</a></li>
            <li><a class="dropdown-item fs-5 font-monospace" href="<?php echo base_url('/departamentos'); ?>">Departamento</a></li>
            <li><a class="dropdown-item fs-5 font-monospace" href="<?php echo base_url('/municipios'); ?>">Municipio</a></li>
          </ul>
        </li>
        <li class="nav-item" >
          <a style="color:black" class="nav-link" href="<?php echo base_url('/cargos'); ?>" tabindex="-1"> <i class="bi bi-clipboard-fill"></i> Cargos </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link e fs-5 font-monospace" style="color:black" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person-circle"></i> Empleados
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #ffffff;">
            <li><a class="dropdown-item fs-5 font-monospace" href="<?php echo base_url('/empleados'); ?>">Administrar</a></li>
            <li><a class="dropdown-item fs-5 font-monospace" href="<?php echo base_url('/salarios'); ?>">Salarios</a>  </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<body>

</body>