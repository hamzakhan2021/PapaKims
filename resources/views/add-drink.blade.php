<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Papa Kims - Add Drink</title>
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
          <header class="text-center">
            <h3>add a drink?</h3>
          </header>
          <div class="row text-center">

            <div class="col-lg-6 col-md-6 mb-4 drink">
             <img src="img/drink.png" alt="Food Image" class="img-fluid">
           </div>
           <div class="col-lg-6 col-md-6 mb-4">

             <div class="container">
              <div class="add-drink rounded">
                <!-- Bordered tabs-->
                <ul id="myTab2" role="tablist" class="nav nav-tabs nav-pills with-arrow flex-column flex-sm-row text-center">
                  <li class="nav-item flex-sm-fill">
                    <a id="home2-tab" data-toggle="tab" href="#home2" role="tab" aria-controls="home2" aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border shadow active"><span style="font-size: 25px;">2</span>00<span></span><br> lychee <br>juice</a>
                  </li>
                  <li class="nav-item flex-sm-fill">
                  </li>
                  <li class="nav-item flex-sm-fill">
                  </li>
                </ul>
                <div id="myTab2Content" class="tab-content">
                  <form method="get" action="{{ ('/summary') }}">
                    @csrf
                    <input name="food" type="hidden" value="{{$foodName}}">
                  <div id="home2" role="tabpanel" aria-labelledby="home2-tab" class="tab-pane fade show active px-4 py-3 border shadow mt-5">
                    <p class="leade">{{$foodName}}</p>
                    <p> Nutritional information:</p>
                    <p>calories: 100</p>
                    <p>fat: 100</p>
                    <p>protein: 100</p>
                    <p>carbs: 100</p>
                    <button type="submit" onclick="window.location='{{ url("/payTime") }}'" class="px-4 mt-2 ltr-spacing shadow-dark"> Order</button>

                  </div>

                  </form>
                  <form method="get" action="{{ ('/summarys') }}">
                    @csrf
                    <input name="food" type="hidden" value="{{$foodName}}">
                    <input name="skipDrink" type="hidden" value="skip">
                   <button type="submit" class="px-4 mt-2 ltr-spacing shadow-dark" onclick="window.location='{{ url("/payTime") }}'"> Skip</button>
                  </form>
                </div>
                <!-- End bordered tabs -->
              </div>

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
