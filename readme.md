Setup backend:

Make sure symfony and composer is installed and configured on your system!

Step 1:
    Open terminal in "WeatherApi" directory.

Step 2:
    Run the following command: "composer install"

Step 3:
    Run the command: "symfony server:start" to start the backend. Make sure you're in the "WeatherApi" directory!

------------------------------------------------------------------------------------------------------------------------
Authorize user/ Get jwt token

[POST] /api/login_check
    body = {
            'email': email
            'password': password
        }

    Test user credentials:
        email: test@test
        password: 1234


------------------------------------------------------------------------------------------------------------------------
Register user

[POST] /register
    body = {
    'email': email
    'password': password

    }



API entrypoints

Retrieve most recent weather data:
/api/live/{station}.

Compare most recent weather data of two stations:
/api/compare/station/{station1}/{station2}.

Compare two stations by date:
/api/compare/station/{station1}/{station2}/{date}

Compare two stations by time: /api/station/{station1}/{station2}/time/{time}

Compare two timestamps for a station: /api/{station}/time/{time1}/{time2}

Compare two dates for a station: /api/{station}/date/{date1}/{date2}

Retrieve historical weather data for a station: /api/historical/{station}/{date}

Retrieve geolocation id: /api/geolocation/id/{place}

Retrieve geolocation info: /api/geolocation/info/{id}

Search for a place and retrieve most recent data and geolocation id: /api/search/{place}

Retrieve statistics: /api/statistics/{measurement_unit}/{order}/{date_start}/{date_end}/{amount}/{country}

