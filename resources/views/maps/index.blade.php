@extends('layouts.app')

@section('title')
  Map
@stop
@section('content')
<style>
  .color {
    background-color: #739D34;
  }

</style>

  <script type="text/javascript">

  var map;
  var markers = {!! json_encode($maps) !!};
  var marks = [];
	var x= markers.length;

  function load() {

    map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(51.2368352,22.5489044),
        zoom: 13
      });

    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function (position) {
        initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        map.setCenter(initialLocation);
      });
    }

    for(var i = 0; i < markers.length; i++){
        marks[i] = addMarker(markers[i]);
      }

  }

  function addMarker(marker){
    var id = marker.id;
    var lat = marker.lat;
    var lng = marker.lng;
    var PM10 = marker.PM10;
    var PM25 = marker.PM25;
    var date = marker.date;
    var index;
    var time = marker.time;
    var temp = marker.temp;
    var humidity = marker.humidity;

		if($type=PM25){
      var html = "<b>Dust PM2.5 : " + PM25 + " μg/m3 </b> <br/><b>Temp : " + temp + " ℃ </b> <br/><b>Humidity : "+ humidity + " g/m3 </b> <br/><b>Date: "+ date +"</b> <br/><b>Time : "+ time +"</b> <br/>";
    } else {
      var html = "<b>Dust PM10 : " + PM10 + " μg/m3 </b> <br/><b>Temp : " + temp + " ℃ </b> <br/><b>Humidity : "+ humidity + " g/m3 </b> <br/><b>Date : "+ date +"</b> <br/><b>Time : "+ time +"</b> <br/>";
    }

    if(x<=200){
    	var radius =300;
    }
    else if(x>200){
    	var radius = 100;
    }

    var markerLatlng = new google.maps.LatLng(parseFloat(marker.lat),parseFloat(marker.lng));


    if($type = PM10){
      if(PM10<=20){
        var color='#4db709';
        index = 1;
      }
      else if(PM10<=60){
        var color='#98ff05';
        index = 2;
      }
      else if(PM10<=100){
        var color='#dffb00';
        index = 3;
      }
      else if(PM10<=140){
        var color='#f9bc01';
        index = 4;
      }
      else if(PM10<=200){
        var color='#f2170b';
        index = 5;
      }
      else if(PM10>200){
        var color='#9a0800';
        index = 6;
      }}
    else{
      if(PM25<=12){
        var color='#4db709';
        index = 1;
      }
      else if(PM25<=36){
        var color='#98ff05';
        index = 2;
      }
      else if(PM25<=60){
        var color='#dffb00';
        index = 3;
      }
      else if(PM25<=84){
        var color='#f9bc01';
        index = 4;
      }
      else if(PM25<=120){
        var color='#f2170b';
        index = 5;
      }
      else if(PM25>120){
        var color='#9a0800';
        index = 6;
      }}

    var mark = new google.maps.Circle({
      map: map,
      center : markerLatlng,
      radius : radius,
      strokeColor:  color,
      strokeWeight: 1,
      strokeOpacity:  1,
      fillColor:    color,
      fillOpacity:  1,
      zIndex: index,
      clickable:true,
    });

    var infoWindow = new google.maps.InfoWindow;
    google.maps.event.addListener(mark, 'click', function(ev){
      infoWindow.setPosition(ev.latLng);
      infoWindow.setContent(html);
      infoWindow.open(map);
    });

    return mark;
  }

  function clearMarkersVG() {
    for(var i = 0; i < markers.length; i++){
      if(markers[i].PM10 <20){
        marks[i].setVisible(false);
      }}
  }
  function clearMarkersG() {
    for(var i = 0; i < markers.length; i++){
      if(markers[i].PM10 >=20 && markers[i].PM10 <60){
        marks[i].setVisible(false);
      }}
  }
  function clearMarkersM() {
    for(var i = 0; i < markers.length; i++){
      if(markers[i].PM10 >=60 && markers[i].PM10 <100){
        marks[i].setVisible(false);
      }}
  }
  function clearMarkersS() {
    for(var i = 0; i < markers.length; i++){
      if(markers[i].PM10 >=100 && markers[i].PM10 <140){
        marks[i].setVisible(false);
      }}
  }
  function clearMarkersB() {
    for(var i = 0; i < markers.length; i++){
      if(markers[i].PM10 >=140 && markers[i].PM10 <200){
        marks[i].setVisible(false);
      }}
  }
  function clearMarkersVB() {
    for(var i = 0; i < markers.length; i++){
      if(markers[i].PM10 >200){
        marks[i].setVisible(false);
      }}
  }

  function showMarkers() {
    for(var i = 0; i < markers.length; i++){
        marks[i].setVisible(true);
      }
  }

</script>
  <body onload="load()" id="map"></br>
    <div class="container bg-grey">
      <div class="panel panel-default">
        <div class="panel-heading">Choose you date</div>
          <div class="panel-body">
            {!! Form::open(['route' => 'map.index', 'method' => 'GET','class'  => 'form form-inline', 'role' => 'search']) !!}
              <div class="form-group">
                  <div>
                    <div class="form">
                      {!!Form::label('From: ','', ['class' => 'navbar-form'])!!}
                      {!!Form::date('datefrom',Request::get('datefrom'),['class' => 'form-control'])!!}
                      {!!Form::time('timefrom',Request::get('timefrom'),['class' => 'form-control'])!!}
                      {!!Form::label('To: ','', ['class' => 'navbar-form'])!!}
                      {!!Form::date('dateto',Request::get('dateto'),['class' => 'form-control'])!!}
                      {!!Form::time('timeto',Request::get('timeto'),['class' => 'form-control'])!!}
                      {!!Form::label('Type: ','', ['class' => 'navbar-form'])!!}
                      {!!Form::select('type', array('PM10' => 'PM10', 'PM25' => 'PM2.5'),Request::get('type'),['class' => 'form-control']);!!}
                      {!!Form::submit('Check',['class' => 'btn btn-primary btn-md'])!!}
                    </div>
                  </div>
              </div>
            {!!Form::close()!!}
          </div>
      </div>
      <img src='https://s15.postimg.org/s8zgql6d7/15060226_1775142932739832_1080893065_o.jpg' style="width: 100%;"/>
      <div>
        <label>Turn Off</label>
        <input onclick="clearMarkersVG();" type="button" value="Very Good" class="btn-default btn-sm">
        <input onclick="clearMarkersG();" type="button" value="Good" class="btn-default btn-sm">
        <input onclick="clearMarkersM();" type="button" value="Moderate" class="btn-default btn-sm">
        <input onclick="clearMarkersS();" type="button" value="Sufficient" class="btn-default btn-sm">
        <input onclick="clearMarkersB();" type="button" value="Bad" class="btn-default btn-sm">
        <input onclick="clearMarkersVB();" type="button" value="Very Bad" class="btn-default btn-sm">
        <input onclick="showMarkers();" type="button" value="Show All Markers" class="btn-default btn-sm">
      </div>
        <div id="map" style="width: 100%; height: 450px; margin: auto;"></div>
    </div>
      </br>
  </body>
@stop
