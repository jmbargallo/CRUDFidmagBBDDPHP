
<?php
  include 'action.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    


<!-- CDN per fer servir bootstrap 4 --> 
<!-- Fulles de estil CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<!-- llibreria jQuery  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Ultimes funcions JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
    
  <title>CRUD Base de dades de investigadors FIDMAG</title>  
    
</head>

<body >

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Base de dades investigadors Fidmag</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Prestacions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Serveis</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Informació</a>
      </li>
    </ul>
    <form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-primary" type="submit">Search</button>
  </form>
  </div>
</nav> 
<div class="container ">
<div class="row justify-content-center">

<div class="col-md-6 mt-3 bg-info p-4 rounded">

<h2 class="bg-primary p-2 rounded text-center text-dark">ID: <?= $vid; ?> </h2>
<div class="text-center">
<img src="<?= $vphoto; ?>" width="250" class="img-thumbnail">

</div>
<h4>Nom: <?= $vname; ?> </h4>
<h4>Email: <?= $vemail; ?> </h4>
<h4>Telefon: <?= $vphone; ?> </h4>


</div>

</div>
 

</body>
</html>
