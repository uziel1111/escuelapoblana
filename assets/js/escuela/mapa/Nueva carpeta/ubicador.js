$(function() {
    if ($(window).width()<736) {
      map.setCenter( new google.maps.LatLng(19.282952 , -98.209877 ));
      map.setZoom(6);
    };
});
