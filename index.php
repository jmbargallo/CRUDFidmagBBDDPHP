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

<body>


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


 <div class="container fluid">
     <div class="row justify-content-center">
         <div class="col-md-10">
            <h3 class="text-center text-dark mt-2">Exemple de CRUD avançat utilitzant PHP, MySQLi i Bootstrap 4</h3>
            <hr>
      <?php if(isset($_SESSION['response'])){ ?>
              <div class="alert alert-<?=$_SESSION['res_type']; ?>
              alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?=$_SESSION['response']; ?>
              </div>
         <?php } unset($_SESSION['response']); ?>
         </div>
     </div>

    
<div  class="row">
    <div class="col-md-4">
        <h3 class=" text-info">Afegir registre</h3>
        <form action="action.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id; ?>">
                <div class="form-group">
                    <input type="text" name="name" value="<?= $name; ?>"class="form-control" placeholder="Entra el nom" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" value="<?= $email; ?>"class="form-control" placeholder="Entra el correu" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" value="<?= $phone; ?>"class="form-control" placeholder="Entra el telefon" required>
                </div>
                <div class="form-group">
                    <input type="hidden" name="oldimage" value="<?= $photo; ?>">
                    <input type="file" name="image" class="custom-file" >
                    <img src="<?=$photo; ?>" width="120" class="img-thumbnail">
                </div>
                <div class="form-group">
                     <input type="submit" name="add" class="btn btn-primary btn-block" value="Afegir registre">
                                                  
                </div>
            </form>
         </div>
         
<div class="col-md-8">
    <?php
      $query="SELECT * FROM investigadores";
      $stmt=$conn->prepare($query);
      $stmt->execute();
      $result=$stmt->get_result();
    ?>

    <h3 class="text-info"> Registres enmagatzemats a la base de dades </h3>
    
    <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th></th>
            <th>Imatge</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Telefon</th>
            <th>Accio</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row=$result->fetch_assoc()) { ?>
          <tr>
            <td><?=$row['id']; ?></td>
            <td><img src="<?=$row['photo']; ?>" width="25"></td>
            <td ><?=$row['nom']; ?></td>
            <td><?=$row['email']; ?></td>
            <td><?=$row['tel']; ?></td>
            <td>
                <a href="details.php?details=<?= $row ['id'];?>" class="badge badge-primary p-2">Detalls</a>
                <a href="action.php?delete=<?= $row ['id'];?>" class="badge badge-danger p-2"
                 onclick="return confirm('Estas segur?')">Esborrar</a>
                <a href="index.php?edit=<?= $row ['id'];?>" class="badge badge-success p-2">Editar</a>
            </td>
          </tr>
         <?php } ?> 
        </tbody>
      </table>
    
</div>
 
</div>
                     
  
</div> 
  
 



</body>
</html>
