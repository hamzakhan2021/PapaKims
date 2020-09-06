<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Papa Kims - Time to Pay</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <!-- Google fonts-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cardo:400,400i">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <!-- Lightbox-->
  <link rel="stylesheet" href="vendor/lightbox2/css/lightbox.min.css">
  <!-- Font Awesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- Parallax-->
  <link rel="stylesheet" href="vendor/onepage-scroll/onepage-scroll.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="favicon.png">

</head>
<body>
  <div class="main">

    <section class="bg-custom">
      <div class="d-flex h-100 align-items-center">
        <div class="container custom-margin">

          <header class="text-center mb-5">
            <h3>time to pay</h3>
          </header>

          <div class="row justify-content-center">
            <div class="col-lg-4">

              <h5 class="line">order summary</h5>

              <div class="row mt-4">
                <div class="col-lg-12">
                  <div class="column">
                    <h5>{{$food}}</h5>
                  </div>
                  <div class="column-2">
                    <h5>5.00</h5>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                 <div class="column">
                  <h5>{{$notSkip}} </h5>
                </div>
                @if(isset($notSkipamou))
                <div class="column-2">
                  <h5>{{$notSkipamou}}</h5>
                </div>
                @endif
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
               <div class="column">
                <h5>delivery fee </h5>
              </div>
              <div class="column-2">
                <h5>0.70</h5>
              </div>
            </div>
          </div>

          <div class="row mt-4">
            <div class="col-lg-12">


             <div class="column">
              <h5>total </h5>
            </div>
            <div class="column-2">
              @if($notSkip == 1)
              <h5>7.70</h5>
              @endif
              @if($notSkip == "")
              <h5>5.70</h5>
              @endif
            </div>

          </div>
          <div class="line-2"></div>
        </div>

        <header class="text-center mt-5 mb-5">
         <h3>please enter</h3>
       </header>
      <div>
       <form method="POST" action="{{ route('Order.Placed') }}">
        @csrf
         <div class="form-group">
          <input name="food" type="hidden" value="{{$food}}">
          <input id="number" type="number" name="number" placeholder="PHONE NUMBER" class="form-control border shadow" required>
        </div>
        <div class="form-group">
          <input id="firstName" type="text" name="firstname" placeholder="FIRST NAME" class="form-control border shadow" required>
        </div>

        <button type="submit" class="px-5 shadow-dark"> <i class="fab fa-apple-pay"></i></button>
      </form>
</div>
    </div>
  </div>
</div>
</div>
</section>

</div>
<!-- JavaScript files-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/onepage-scroll/jquery.onepage-scroll.min.js"></script>
<script src="vendor/lightbox2/js/lightbox.min.js"></script>
<script src="js/front.js"></script>
<!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>
</html>
