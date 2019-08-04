<?php 
include_once('navbar.php');
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Norican&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="css/master.css?v=<?php echo time(); ?>">
    <title>Fer Swimwear</title>
  </head>
  <body>
    <div class="flex-container">
     <div class="bd-example">
      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/bg-1.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/bg-2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/bg-3.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>
<div class="main">
<section>
  <article>
    <p>Articulos Destacados</p>
  </article>
<section class="articulos">
  <article class="destacado">
    <img src="img/Originales/articulo1.jpg" alt="">
    <p class="descripcion">Articulo 1</p>
    <p class="precio">$$$</p>
  </article>
  <article class="destacado">
    <img src="img/Originales/articulo1.jpg" alt="">
    <p class="descripcion">Articulo 2</p>
    <p class="precio">$$$</p>
  </article>
  <article class="destacado">
    <img src="img/Originales/articulo1.jpg" alt="">
    <p class="descripcion">Articulo 3</p>
    <p class="precio">$$$</p>
  </article>
  <article class="destacado">
    <img src="img/Originales/articulo1.jpg" alt="">
    <p class="descripcion">Articulo 4</p>
    <p class="precio">$$$</p>
  </article>
</section>
</section>
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