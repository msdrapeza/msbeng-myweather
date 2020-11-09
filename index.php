<?php

include_once("web.html");

?>

<!DOCTYPE html>
<html>
<head>
  <title>WEATHER UPDATE</title>

<script src="http://code.jquery.com/jquery-3.2.1.min.js"
intefrity="sha256-hwg4gsxgFZhOsEEamdOVGBf13fyQuiTwlAQgxVSNgta="
crossorigin="anonymous"></script>
</head>
<body>

<input id="city"></input>
<button id="getWeatherForcast">Get Weather</button>
<div id="showWeatherForcast"></div>


<script type="text/javascript">
  $(document).ready(function() {
    $("#getWeatherForcast").click(function(){
      var city = $("#city").val();
      var key = '6139cb999131cdc8dfd46f4edce94b6d';


      $.ajax({  
        url: 'http://api.openweathermap.org/data/2.5/weather',
        dataType:'json',
        type:'GET',
        data:{q:city, appid: key, units: 'metric'},

        success: function(data){
        	var wf='';
        	$.each(data.weather, function(index, val){
        		wf += '<p><b>' + data.name + "</b><img src="+ val.icon +".png></p>"+
        		data.main.temp + '&deg;C' + '|' + val.main + "," + val.description
        	});
        	$("#showWeatherForcast").html(wf)
        }



      });
    });

  });


</script>

</body>
</html>
