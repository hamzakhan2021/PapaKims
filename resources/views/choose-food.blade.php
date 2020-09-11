<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Papa Kims - Choose Food</title>
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

      <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <link rel="stylesheet" href="style.css" />
      <script src="script.js"></script>


</head>
<body>
  <div class="main">

    <section class="bg-custom">
      <div class="d-flex h-100 align-items-center">
        <div class="container custom-margin">
          <header class="text-center">
            <h3>choose your food</h3>
          </header>
          <div class="row text-center">

            <div class="col-lg-6 col-md-6 mb-4">
             <img src="img/food.png" alt="Food Image" class="img-fluid">
           </div>
           <div class="col-lg-6 col-md-6 mb-4">

            <div class="container">
              <div class="choose-food rounded">
                <!-- Bordered tabs-->
                <ul id="myTab1" role="tablist" class="nav nav-tabs nav-pills with-arrow text-center">
                  <li class="nav-item flex-sm-fill">
                    <a id="home1-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home1" aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border shadow active"><span style="font-size: 25px;">5</span>00<span></span><br> KIMCHI <br>NOODLES</a>
                  </li>
                  <li class="nav-item flex-sm-fill">
                    <a id="profile1-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile1" aria-selected="false" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border shadow"><span style="font-size: 25px;">5</span>00<span></span><br> Miso <br>NOODLES</a>
                  </li>
                  <li class="nav-item flex-sm-fill">
                    <a id="contact1-tab" data-toggle="tab" href="#contact1" role="tab" aria-controls="contact1" aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0 border shadow"><span style="font-size: 25px;">5</span>00<span></span><br> happy <br>NOODLES</a>
                  </li>
                </ul>

                <div id="myTab1Content" class="tab-content">

                  <div id="home1" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade show active px-4 py-3 border shadow mt-5">
                    <form method="POST" action="{{ route('store.food') }}">
                      @csrf
                    <p>NOODLES WITH KIMCHI and mushrooms, very tasty.</p>
                    <input name="invisible" type="hidden" value="NOODLES WITH KIMCHI and mushrooms, very tasty">
                    <p> Nutritional information:</p>
                    <p>calories: 100</p>
                    <p>fat: 100</p>
                    <p>protein: 100</p>
                    <p>carbs: 100</p>
                    <div class="row" style="float:right">
                      <div class="quantity buttons_added">
   <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
  </div>
                    </div>

                    <button type="submit" class="px-4 mt-2 ltr-spacing shadow-dark"> Order</button>
                    </form>
                  </div>


                  <div id="profile1" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-3 border shadow mt-5">
                    <form method="POST" action="{{ route('store.food') }}">
                      @csrf
                   <p class="leade">NOODLES WITH MISO and mushrooms, very tasty.</p>
                   <input name="invisible" type="hidden" value="NOODLES WITH MISO and mushrooms, very tasty">
                   <p> Nutritional information:</p>
                   <p>calories: 100</p>
                   <p>fat: 100</p>
                   <p>protein: 100</p>
                   <p>carbs: 100</p>
                   <div class="row" style="float:right">
                     <div class="quantity buttons_added">
  <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
 </div>
                   </div>
                   <button type="submit" class="px-4 mt-2 ltr-spacing shadow-dark"> Order</button>
                   </form>
                 </div>
                <!-- </form> -->

                 <div id="contact1" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-3 border shadow mt-5">
                   <form method="POST" action="{{ route('store.food') }}">
                     @csrf
                  <p class="leade">NOODLES WITH HAPPY and mushrooms, very tasty.</p>
                    <input name="invisible" type="hidden" value="NOODLES WITH HAPPY and mushrooms, very tasty">
                  <p> Nutritional information:</p>
                  <p>calories: 100</p>
                  <p>fat: 100</p>
                  <p>protein: 100</p>
                  <p>carbs: 100</p>
                  <div class="row" style="float:right">
                    <div class="quantity buttons_added">
 <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
</div>
                  </div>
                  <button type="submit" class="px-4 mt-2 ltr-spacing shadow-dark"> Order</button>
                  </form>
                </div>

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
<script src="vendor/jquery/jquery.min.js">
</script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/onepage-scroll/jquery.onepage-scroll.min.js"></script>
<script src="vendor/lightbox2/js/lightbox.min.js"></script>
<script src="js/front.js"></script>
<!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>
</html>
