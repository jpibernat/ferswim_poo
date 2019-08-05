<?php
include_once('navbar.php');
require_once('autoload.php');
$listadoPreguntas = Preguntas::listado($pdo,'faq');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Norican&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="css/master.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/navstyles.css?v=<?php echo time(); ?>">
    <script src="https://use.fontawesome.com/4e066721be.js"></script>
    <script src="https://kit.fontawesome.com/519acca20a.js"></script>
    <title>Fer Swimwear</title>
</head>
<body>
<div class="container">
    <div class="">
      <h1>Preguntas frecuentes</h1>
    </div>

      <div class="">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Pregunta</th>
              <th scope="col">Mostrar</th>
              <th scope="col">Editar</th>
              <th scope="col">Eliminar</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach ($listadoPreguntas as $key => $value):?>
                <tr>

                  <th scope="row"><?= $value["id"] ?></th>
                  <td><?=$value["question"];?></td>
                  <td><a href="detallePegunta.php?id=<?=$value['id'];?>">
                        <i class="fas fa-eye"></i>
                      </a>
                  </td>
                  <td><a href="modificarPregunta.php?id=<?=$value['id'];?>">
                        <i class="fas fa-edit"></i>
                      </a>
                  </td>
                  <td><a href="eliminarPregunta.php?id=<?=$value['id'];?>">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                  </td>

                </tr>
              <?php endforeach;?>
          </tbody>
      </div>
  </div>

    <!-- whatsapp -->
    <div class="btn-whatsapp">
    <a href="whatsapp://send?text= http://localhost/E-CommerceDH-master/" data-action="share/whatsapp/share"><img border="0" src="img/whatsapp33.jpg" width="50px" height="50px"></a>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- <script>$(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if(scroll < 30){
            $('.fixed-top').css('background', 'transparent');
            } else{
            $('.fixed-top').css('background', 'rgba(250, 229, 211, 0.9)');
            }
    });</script> -->
     <!-- Footer -->
  <?php 
include_once('footer.php');
?>
</body>
</html>