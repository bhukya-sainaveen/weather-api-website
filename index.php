<?php
  $weather = "";
  $error = "";
  # Check if any city entered
  if(array_key_exists('city',$_GET)) { 
      # $_GET["city"] contains entered city value
      $city = $_GET['city'];
      # Check for empty field
      if($city == "") {
           $error = "No city entered";
      }
      else {
          $url = "https://api.openweathermap.org/data/2.5/weather?q=".urlencode($city)."&appid=82179e3e89b9838ea3814059b3073e1c";
          # Request weather data
          # @ is used to suppress warnings and errors displayed in website
          $data = @file_get_contents($url, false);
          if($data) {
              # Deserialize the json data to php array
              $array = json_decode($data, true);
              # Get the weather description from json array
              $desc = $array["weather"][0]["description"];
              $tempInKelvin = $array["main"]["temp"];
              $tempToCelsius = intval($tempInKelvin - 273.15);
              $weather = "There is $desc in $city and the temperature is $tempToCelsius &degC";
          }
          else {
              $error = "Invalid City";
          }
      }
  }
  
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>Weather API</title>
    <style type="text/css">
     html { 
        background: url("background.jpg") no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }
      body {
        background : none;
      }
      .container {
        text-align : center;
        margin-top : 200px;
        width : 450px;
      }
      input {
        margin : 20px 0px;
      }
      #weather{
        margin-top : 20px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>What's the Weather</h1>
    <form>
      <div class="form-group">
        <label for="city">Enter the name of a city</label>
        <input type="text" class="form-control" name="city" id="city" placeholder="Eg.London, Tokyo" value="<?php  if(array_key_exists('city',$_GET)){ echo $_GET["city"];} ?>">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
      <div id="weather"><?php
          if($weather!=""){
            echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
          }
          else if($error!=""){
            echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
          }
        ?>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
