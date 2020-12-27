<!doctype html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>
        <style>
            #myCarousel .carousel-item img{
              width: 100%;
            }
        </style>
    </head>
    <body>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    
    <!-- Control dots -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>
    
    <div class="carousel-item active">
      <img class="first-slide" src="img/1.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="second-slide" src="img/2.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="third-slide" src="img/3.png" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="fourth-slide" src="img/4.png" alt="Fourt slide">
    </div>
    <div class="carousel-item">
      <img class="fifth-slide" src="img/5.png" alt="Fifth slide">
    </div>
  </div>
</div>
    </body>
</html>
<script>
    $(document).ready(function(){
  
  $(".carousel").carousel({
    //ปิดการเล่น auto
    interval: false,
    pause: true
  });
  
  $( ".carousel .carousel-inner" ).swipe( {
    swipeLeft: function ( event, direction, distance, duration, fingerCount ) {
      this.parent( ).carousel( 'next' );
    },
    swipeRight: function ( ) {
      this.parent( ).carousel( 'prev' );
    }
    } );
  
  $('.carousel .carousel-inner').on('dragstart', 'a', function () {
    return false;
  });  
  
});
</script>