# AMS
Athlete Management System

# Setup environment context
* Add JWT_SECRET key with random String value to `.env` file 
    
    ````
    e.g. JWT_SECRET=abcde2fg5hij7k8l9m0nopqrstu
    ````
* Setup database parameters

# Database migration

* Goto source directory
* Execute migration:
    ````
    php artisan migrate
    ````

# Database seeding
````
php artisan db:seed
````

# Start API server
````
php -S localhost:8000 -t public
````

# API Endpoints for Authentication and Registration
````
JSON data format for the athlete:
{
    'name': String, // Full Name
    'email': String, // Unique Email
    'password': String, // Password
}

Return Token:
{
    'token': String, // Unique token for accesses
}
````
* POST: `/auth/register`: Register a new user
* POST: `/auth/login`: Log In and access a new token
* POST: `/auth/logout`: Log out and invalidate a token

# API Endpoints for Athlete
````
JSON data format for the athlete:
{
    'name': String, // Full Name
    'dob': Date, // Date of birth
    'age': Integer, // Age
    'height': Float, // Height     
    'weight': Float, // Weight
}
````
* GET: `/athletes?token=<>`: Obtain a list of all the athletes
* GET: `/athletes/{id}?token=<>`: Obtain a detail for a given athlete
* POST: `/athletes`: Create a new athlete
* PUT: `/athletes/{id}?token=<>`: Update a given athlete
* DELETE: `/athletes/{id}?token=<>`: Delete a given athlete

# API Endpoints for Team
````
JSON data format for the Team:
{
    'name': String, // Title
    'logo': String, // URL of a logo image
}
````
* GET: `/teams?token=<>`: Obtain a list of all the teams
* GET: `/teams/{id}?token=<>`: Obtain a detail for a given team
* POST: `/teams?token=<>`: Create a new team
* PUT: `/teams/{id}?token=<>`: Update a given team
* DELETE: `/teams/{id}?token=<>`: Delete a given team

# API Endpoints for Sport
````
JSON data format for the Sport:
{
    'name': String, // Title
}
````
* GET: `/sports?token=<>`: Obtain a list of all the sports
* GET: `/sports/{id}?token=<>`: Obtain a detail for a given sport
* POST: `/sports?token=<>`: Create a new sport
* PUT: `/sports/{id}?token=<>`: Update a given sport
* DELETE: `/sports/{id}?token=<>`: Delete a given sport

# API Endpoints for Athlete-Team-Sport (ats) relationship
````
JSON data format for the Sport:
{
    'dop': Date, // Date of play
    'aid': Integer, // Athlete ID
    'tid': Integer, // Team ID
    'sid': Integer, // Sport ID
}
````
* GET: `/ats?token=<>`: Obtain a list of all the ats
* GET: `/ats/{id}?token=<>`: Obtain a detail for a given ats
* POST: `/ats?token=<>`: Create a new ats
* PUT: `/ats/{id}?token=<>`: Update a given ats
* DELETE: `/ats/{id}?token=<>`: Delete a given ats

# API Endpoints for Other data
* GET: `/ats/ta/{id}?token=<>`: Obtain a list of teams for a given athlete `id`
* GET: `/ats/ts/{id}?token=<>`: Obtain a list of teams for a given sport `id`
* GET: `/ats/at/{id}?token=<>`: Obtain a list of athletes for a given team `id`
* GET: `/ats/as/{id}?token=<>`: Obtain a list of athletes for a given sport `id`
* GET: `/ats/sa/{id}?token=<>`: Obtain a list of sports for a given athlete `id`
* GET: `/ats/st/{id}?token=<>`: Obtain a list of sports for a given team `id`

