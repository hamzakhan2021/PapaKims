<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Papa Kims - Index Page</title>
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

    <div class="header">
      <div class="container-fluid">
        <div class="row pt-3">
          <div class="col-lg-6 col-md-6 none">
            <div class="site-logo"><a href="index.html"> <img src="img/logo-2.png" class="img-responsive" alt="Logo Image"></a></div>
          </div>

          <div class="col-lg-6 col-md-6 none-2">
            <div class="header-right">
             <span><a href="#">about us</a></span>
           </div>
         </div>

         <div class="col-lg-6 col-md-6 none-2">
          <div class="site-logo"><a href="index.html"> <img src="img/papakimlogo.png" class="img-responsive" alt="Logo Image"></a></div>
        </div>


        <div class="col-lg-6 col-md-6 none">
         <div class="header-right">
           <span><a href="#">about us</a></span>
         </div>
       </div>

     </div>
   </div>
 </div>

 <section class="bg-center">
   <div class="d-flex h-100 align-items-center">
     @if (isset($message))
     <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
      @endif

    <div class="container custom-margin text-center">
      <div class="row justify-content-center">
       <div class="col-lg-4">
        <p class="mb-1">we are open In!</p>
        <div class="time-est border shadow" id="demo">
<!--          <h1>1<span> HR</span> 53<span> Mins</span></h1>
 -->       </div>
 @if (isset($messageUserLimit))
 <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $messageUserLimit }}</strong>
  </div>
  @endif
       <h4 class="mt-2 mb-2">in the meantime...</h4>

       <div class="border shadow">
        <div class="padding-custom">
         <h4>enter phone <br> number to play</h4>
         <h5>(so you know if <br> you've won)</h5>
         <!-- method="POST" action="{{ ('/play') }}" -->
         <form method="POST" action="{{ ('/play') }}">
           @csrf
           <div class="form-group">
            <input type="text" name="phone_number" class="custom-border form-control" required>
           </div>
           <button type="submit" class="px-4 mt-2 ltr-spacing shadow-dark"> Enter</button>
         </form>
         </div>
       </div>

       <h5 class="my-4">highest score of the day wins <br> free noodles</h5>
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
<!-- Display the countdown timer in an element -->





<script>
const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
var days = [3, 4, 5, 6, 0];
var hours = [17, 18, 19, 20];

var countDownDate = new Date();
if(days.indexOf(countDownDate.getDay()) != -1){	//if today is opening day
	if(hours.indexOf(countDownDate.getHours()) > 20){	//if opening time has passed
		while(days.indexOf(countDownDate.getDay()) == -1){	countDownDate.setDate(countDownDate.getDate() + 1);	}
	}
}else{
	while(days.indexOf(countDownDate.getDay()) == -1){	countDownDate.setDate(countDownDate.getDate() + 1);	}
}
countDownDate.setHours(17, 00, 00, 00);
console.log("countDownDate: " + countDownDate);
console.log("day: " + countDownDate.getDay());
console.log("index of day: " + days.indexOf(countDownDate.getDay()));

// Get today's date and time

//var now_date = new Date();
var now_time = new Date().getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

	// Time calculations for days, hours, minutes and seconds
	var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	var seconds = Math.floor((distance % (1000 * 60)) / 1000);

	// Display the result in the element with id="demo"
	document.getElementById("demo").innerHTML = "<h1>"+days+"<span> D</span> "+hours+"<span> H</span> "+minutes+"<span> M</span> "+seconds+"<span> S</span></h1>";

	// If the count down is finished, write some text
	if (distance < 0) {
		clearInterval(x);
		// document.getElementById("demo").innerHTML = "EXPIRED";
    location.href = '/';
	}
}, 1000);

/*
var date = new Date();

// add a day
date.setDate(date.getDate() + 1);

*/

</script>




<!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>
</html>
