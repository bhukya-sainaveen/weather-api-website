# weather-api-website

The website shows the current weather of any city with the help of json data received from https://openweathermap.org/ using API.

OpenWeatherMap is one of the leading digital weather information providers. 

The OpenWeatherMap API is free to use; however, there are also paid plans available for developers that require higher levels of weather data and support.

# API Documentation

A special point and API key are used to get the json data

For example: https://api.openweathermap.org/data/2.5/weather?q=London,uk&appid=YOUR_API_KEY

# Sample Json Output
{"coord":{"lon":-0.13,"lat":51.51},"weather":[{"id":300,"main":"Drizzle","description":"light intensity drizzle","icon":"09d"}],"base":"stations","main":{"temp":280.32,"pressure":1012,"humidity":81,"temp_min":279.15,"temp_max":281.15},"visibility":10000,"wind":{"speed":4.1,"deg":80},"clouds":{"all":90},"dt":1485789600,"sys":{"type":1,"id":5091,"message":0.0103,"country":"GB","sunrise":1485762037,"sunset":1485794875},"id":2643743,"name":"London","cod":200}

For API key you need to sign up for the website.

The number of API calls you are allowed to make depends on the subscription plan you choose. Free users can make up to 60 API calls per minute.

