
var lat;
var lon;

$(document).ready(function(){
	$("div[data-type='plugin']").html("<img class='pull-right' id='close' src='/weather/css/_images/close.png'>");
$("#close").click(function() {
	$("div[data-type='plugin']").hide();
	});
/*if (navigator.geolocation) {
	 navigator.geolocation.getCurrentPosition(function(position) {*/
   lat = 22.572646;//position.coords.latitude;
   lon= 88.363895
   ;//position.coords.longitude;
   var id = $("div[data-type='plugin']");
   set(id);
  /*});
}
else{
	$("div[data-type='plugin']").html("Oops! no location found");
}*/
});
 function set(ht){
 	$.ajax({
            type: "GET",
            url: "http://api.openweathermap.org/data/2.5/weather?lat="+lat+"&lon="+lon+"&APPID=9a0bfebddb482e7b0dd96255f3b22f67",
            datatype: "json",
            success:function(data){
            	var date= new Date(data.dt*1000);
            	$(ht).append("<h3 class='pull-right' style='color: #0000ee;' id='city' class='text'>"+data.name+"</h3>");
            	$(ht).append("<img id='icon' src='/weather/css/_images/"+data.weather[0].icon+".png' width='100' height='100'>");
            	$(ht).css("background","url(/weather/css/_images/"+data.weather[0].icon+".jpg)");
            	var num =data.main.temp-272.15;
					var n = parseInt(num, 10);
            	$(ht).append("<h1  id='temp' style='color: #0000ee;  class='text'>"+n+"&deg;C</h1>");
            	$(ht).append("<h1 id='desc' style='color: #0000ee; class='text'>"+data.weather[0].description+"</h1>");
            	
            }
         });
        }
