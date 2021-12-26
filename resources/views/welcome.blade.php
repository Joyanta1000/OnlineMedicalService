<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <div id="location"></div>
    <script>
      var div  = document.getElementById("location");
      function getLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
          div.innerHTML = "The Browser Does not Support Geolocation";
        }
      }

      function showPosition(position) {
        div.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;
      }

      function showError(error) {
        if(error.PERMISSION_DENIED){
            div.innerHTML = "The User have denied the request for Geolocation.";
        }
      }
      getLocation();
    </script>
  </body>
</html>