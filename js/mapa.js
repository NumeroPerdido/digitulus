var geocoder;
var map;
var marker;
function initialize() {
    
	var latlng = new google.maps.LatLng(-18.8800397, -47.05878999999999);
	var options = {
		zoom: 5,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
    
	
	map = new google.maps.Map(document.getElementById("mapa"), options);
	
	geocoder = new google.maps.Geocoder();
	
	marker = new google.maps.Marker({
		map: map,
		draggable: true,
	});
	
	marker.setPosition(latlng);
}


$(document).ready(function () {
  
	initialize();
   
	function carregarNoMapa(endereco) {
        
               
		geocoder.geocode({ 'address':$('#geocomplete').val()  }, function (results, status) {
			 
            if (status == google.maps.GeocoderStatus.OK) {
				if (results[0]) {
					var latitude = results[0].geometry.location.lat();
					var longitude = results[0].geometry.location.lng();
		                
					
		              
					var location = new google.maps.LatLng(latitude, longitude);
					marker.setPosition(location);
					map.setCenter(location);
					map.setZoom(16);
                     
                   
                   
				}
			}
            
		})
        
    
	
 google.maps.event.addListener(marker, 'drag', function () {
		geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				if (results[0]) {  
					$('#geocomplete').val(results[0].formatted_address);
					$('#Latitude').val(marker.getPosition().lat());
					$('#Longitude').val(marker.getPosition().lng());
				}
			}
		});
	});
    $("#Latitude").focus(function(event){
        
        var endereco = $("#geocomplete").val();
        carregarNoMapa(endereco); 
    
    });
	$("#Latitude").blur(function(event){
        
        var latitude = $("#Latitude").val();
        var longitude = $("#Longitude").val();
        var location = new google.maps.LatLng(latitude, longitude);
					marker.setPosition(location);
					map.setCenter(location);
					map.setZoom(16);
    
    });
    $("#Longitude").blur(function(event){
          var latitude = $("#Latitude").val();
        var longitude = $("#Longitude").val();
        var location = new google.maps.LatLng(latitude, longitude);
					marker.setPosition(location);
					map.setCenter(location);
					map.setZoom(16);
    
    });
	


});