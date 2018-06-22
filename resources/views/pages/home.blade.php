@extends('layouts.app1')

@section('title')
  Home
@stop
@section('content')

<style>
  .jumbotron {
      background-color: #739D34;
      color: #fff;
      padding: 100px 25px;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #739D34;
      font-size: 50px;
  }
  .logo {
      color: #739D34;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #739D34;
  }
  .carousel-indicators li {
      border-color: #739D34;
  }
  .carousel-indicators li.active {
      background-color: #739D34;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
  }
</style>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">


  <div class="jumbotron text-center">
    <h1>Monitor</h1>
    <p>We care about environment</p>
  </div>

  <!-- Container (About Section) -->
  <div id="about" class="container-fluid">
    <div class="row">
      <div class="col-sm-8">
        <h2>About Company Page</h2><br>
        <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <a href="{{route('map.index')}}">
          <br><button class="btn btn-default btn-lg"><i class="fa fa-map fa-lg" aria-hidden="true"><b> Check our map</b></i></button>
        </a>
      </div>
      <div class="col-sm-4">
        <span class="glyphicon glyphicon-map-marker logo"></span>
      </div>
    </div>
  </div>

  <div class="container-fluid bg-grey">
    <div class="row">
      <div class="col-sm-4">
        <span class="glyphicon glyphicon-globe logo slideanim"></span>
      </div>
      <div class="col-sm-8">
        <h2>Our Values</h2><br>
        <h4><strong>MISSION:</strong> Our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
        <p><strong>VISION:</strong> Our vision Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>
    </div>
  </div>

  <!-- Container (Portfolio Section) -->
  <div id="portfolio" class="container-fluid text-center bg-grey">
    <h2>Portfolio</h2><br>
    <h4>What we have created</h4>
    <div class="row text-center slideanim">
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="http://photos.wikimapia.org/p/00/02/35/85/82_big.jpg" alt="Paris" width="400" height="300">
          <p><strong>Zdjecie</strong></p>
          <p>Zdjecie</p>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="http://dig.do/screenshot/201308/pollub.pl-politechnika-organizacja-technical-university-of-lublin.jpg" alt="New York" width="400" height="300">
          <p><strong>Zdjecie</strong></p>
          <p>Zdjecie</p>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="http://latarnia.teatrnn.pl/sites/default/files/u24image/image-8.jpg" alt="WoW" width="400" height="300">
          <p><strong>Zdjecie</strong></p>
          <p>Zdjecie</p>
        </div>
      </div>
    </div><br>

    <h2>What our customers say</h2>
    <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <h4>"This company is the best. I am so happy with the result!"<br><span style="font-style:normal;">Michael Roe, Vice President, Comment Box</span></h4>
        </div>
        <div class="item">
          <h4>"One word... WOW!!"<br><span style="font-style:normal;">John Doe, Salesman, Rep Inc</span></h4>
        </div>
        <div class="item">
          <h4>"Could I... BE any more happy with this company?"<br><span style="font-style:normal;">Chandler Bing, Actor, FriendsAlot</span></h4>
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>


  <!-- Container (Contact Section) -->

  <div id="contact" class="container-fluid bg-grey">
    <h2 class="text-center">CONTACT</h2>
    <div class="row">
      <div class="col-sm-5">
        <p>Contact us and we'll get back to you within 24 hours.</p>
        <p><span class="glyphicon glyphicon-map-marker"></span> Lublin, PL</p>
        <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
        <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
      </div>
      <div class="col-sm-7 slideanim">
        {!!Form::open(['route' => 'contact.store'])!!}
        <div class="row">
          <div class="col-sm-6 form-group">
            {!!Form::text('name',Request::get('name'),['placeholder' => 'Name','class' => 'form-control','required'])!!}
          </div>
          <div class="col-sm-6 form-group">
            {!!Form::email('email',Request::get('email'),['placeholder' => 'Email','class' => 'form-control','required'])!!}
          </div>
        </div>
        {!!Form::textarea('comment',Request::get('comment'),['placeholder' => 'Question','class' => 'form-control','required'])!!}
        <div class="row">
          <div class="col-sm-12 form-group">
            <button class="btn btn-default pull-right" type="submit"><i class="fa fa-envelope fa-lg" aria-hidden="true"> Send</i></button>
          </div>
        </div>
        {!!Form::close()!!}
      </div>
    </div>
  </div>
  <!-- Set height and width with CSS -->
<div id="googleMap" style="height:300px;width:100%;"></div>

<!-- Add Google Maps -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
var myCenter = new google.maps.LatLng(51.2368352,22.5489044);

function initialize() {
var mapProp = {
center:myCenter,
zoom:17,
scrollwheel:false,
draggable:false,
mapTypeId:google.maps.MapTypeId.ROADMAP
};

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
position:myCenter,
});

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

</br>

  </body>




@endsection
