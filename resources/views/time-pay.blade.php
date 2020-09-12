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
      <div class="d-flex h-90 align-items-center">
        <div class="container custom-margin">

          <header class="text-center mt-20 mb-20">
            <h3>time to pay</h3>
          </header>

          <div class="row justify-content-center">
            <div class="col-lg-6">

              <h5 class="">order summary</h5>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col"><p>Noodles</p></th>
                      <th scope="col"><p>Quantity</p></th>
                      <th scope="col"><p>Price</p></th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                      @if(isset($noodle1))
                      <th scope="row"><p>{{$noodle1}}</p></th>
                      @endif

                      @if(isset($noodleQuantity1))
                      <td><p>{{$noodleQuantity1}}</p></td>
                      @endif

                      @if(isset($noodleQuantity1))
                      <td><p>{{$noodleQuantity1 * 5.00}}.00</p></td>
                      @endif
                    </tr>
                    <tr>
                      @if(isset($noodle2))
                      <th scope="row"><p>{{$noodle2}}</p></th>
                      @endif
                      @if(isset($noodleQuantity2))
                      <td><p>{{$noodleQuantity2}}</p></td>
                      @endif

                      @if(isset($noodleQuantity2))
                      <td><p>{{$noodleQuantity2 * 5.00}}.00</p></td>
                      @endif

                    </tr>
                    <tr>

                      @if(isset($noodle3))
                      <th scope="row"><p>{{$noodle3}}</p></th>
                      @endif
                      @if(isset($noodleQuantity3))
                      <td><p>{{$noodleQuantity3}}</p></td>
                      @endif

                      @if(isset($noodleQuantity3))
                      <td><p>{{$noodleQuantity3 * 5.00}}.00</p></td>
                      @endif
                    </tr>
                    <tr>
                      <th scope="row"><p>delivery fee</p></th>
                      <td></td>
                      <td><p>0.7</p></td>
                    </tr>

                    <tr>
                      <th scope="row"><p>total</p></th>
                      <td></td>
                      <td><p>{{($noodleQuantity1+$noodleQuantity2+$noodleQuantity3)*5.00+0.70}}</p></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- table end -->

        <header class="text-center mt-10 mb-10">
         <h3>please enter</h3>
       </header>
      <div>
       <form method="POST" action="{{ route('Order.Placed') }}">
        @csrf
         <div class="form-group">
          <input id="number" type="number" name="number" placeholder="PHONE NUMBER" class="form-control border shadow" required>
          <input name="noodleQuantity1" type="hidden" value="{{$noodleQuantity1}}">
          <input name="noodle1" type="hidden" value="{{$noodle1}}">
          <input name="noodleQuantity2" type="hidden" value="{{$noodleQuantity2}}">
          <input name="noodle2" type="hidden" value="{{$noodle2}}">
          <input name="noodleQuantity3" type="hidden" value="{{$noodleQuantity3}}">
          <input name="noodle3" type="hidden" value="{{$noodle3}}">
        </div>
        <div class="form-group">
          <input id="firstName" type="text" name="firstname" placeholder="FIRST NAME" class="form-control border shadow" required>
        </div>
        <div class="form-group">
        <input type="text" class="form-control" name="address" id="inputAddress2MD" placeholder="Address">
        </div>
        <!-- <div class="form-group">
          <textarea type="text" name="firstname" placeholder="address" class="form-control border shadow" required></textarea>
        </div> -->

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
