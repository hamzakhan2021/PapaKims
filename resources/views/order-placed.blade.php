<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Papa Kims - Order Placed</title>
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

    <section class="order-placed bg-custom">
      <div class="d-flex h-100 align-items-center">
        <div class="container">
          <header class="text-center mt-4">
            <h3>order placed</h3>
          </header>
          @if (Session::has('success'))
              <div class="alert alert-success text-center">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                  <p>{{ Session::get('success') }}</p>
              </div>
          @endif
          @if (isset($message))
          <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert">×</button>
             <strong>{{ $message }}</strong>
           </div>
           @endif
          <div class="row justify-content-center text-center">

            <div class="col-lg-4">

              <div class="delivery-away border">
                <img src="img/delivery-man.png" class="img-responsive" alt="Delivery Man">
                <span style="border-bottom: 1px solid #000">10 mins</span>
                <img src="img/take-away.png" class="img-responsive" alt="Take Away">
              </div>
              <h4 class="mt-2">send free noods</h4>
              <h5 class="mb-3">while you wait</h5>
              <form  method="POST" action="{{ ('/inviteFriend') }}" class="contact-form ml-4 mr-4">
                @csrf
                <div class="row">

                  <div class="form-group col-lg-12">
                    <input id="number" type="number" name="number" placeholder="PHONE NUMBER" class="form-control border shadow">
                  </div>
                  <div class="form-group col-lg-12">
                    <input id="firstName" type="text" name="firstname" placeholder="FIRST NAME" class="form-control border shadow">
                  </div>
                    <button type="submit" class="px-5 shadow-dark"> <i class="fas fa-paper-plane"></i></button>

                </div>
</form>

              <p class="mb-3">your friend will receive <br> 1x any noodle</p>

              <div class="footer">
                <h5>any problem, text us</h5>
                <h1>07789223407</h1>
                <h4>thank you, come again</h4>
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
