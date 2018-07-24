<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () {
    return view('dashboard');
});

$router->get('api', function () use ($router) {
    return 'Welcome to AMS API System';
});

$router->post('auth/register', ['uses' => 'UserController@create']);
$router->post('auth/login', ['uses' => 'AuthController@authenticate']);
$router->post('auth/logout', ['uses' => 'AuthController@revoke']);

$router->group(
  ['middleware' => 'jwt.auth','prefix' => 'api'],
//  [],
  function () use ($router) {
      $router->get('users', function () {
          $users = \App\User::all();
          return response()->json($users);
      });
      // Athletes: API
      $router->get('athletes', ['uses' => 'AthleteController@showAll']);
      $router->get('athletes/{id}', ['uses' => 'AthleteController@showOne']);
      $router->post('athletes', ['uses' => 'AthleteController@create']);
      $router->put('athletes/{id}', ['uses' => 'AthleteController@update']);
      $router->delete('athletes/{id}', ['uses' => 'AthleteController@delete']);
      // Teams: API
      $router->get('teams', ['uses' => 'TeamController@showAll']);
      $router->get('teams/{id}', ['uses' => 'TeamController@showOne']);
      $router->post('teams', ['uses' => 'TeamController@create']);
      $router->put('teams/{id}', ['uses' => 'TeamController@update']);
      $router->delete('teams/{id}', ['uses' => 'TeamController@delete']);
      // Sports: API
      $router->get('sports', ['uses' => 'SportController@showAll']);
      $router->get('sports/{id}', ['uses' => 'SportController@showOne']);
      $router->post('sports', ['uses' => 'SportController@create']);
      $router->put('sports/{id}', ['uses' => 'SportController@update']);
      $router->delete('sports/{id}', ['uses' => 'SportController@delete']);
      // ATS relationship: API
      $router->get('ats', ['uses' => 'ATSController@showAll']);
      $router->get('ats/{id}', ['uses' => 'ATSController@showOne']);
      $router->post('ats', ['uses' => 'ATSController@create']);
      $router->put('ats/{id}', ['uses' => 'ATSController@update']);
      $router->delete('ats/{id}', ['uses' => 'ATSController@delete']);

      $router->get('ats/ta/{id}', ['uses' => 'ATSController@showTeamByAthlete']);
      $router->get('ats/ts/{id}', ['uses' => 'ATSController@showTeamBySport']);
      $router->get('ats/at/{id}', ['uses' => 'ATSController@showAthleteByTeam']);
      $router->get('ats/as/{id}', ['uses' => 'ATSController@showAthleteBySport']);
      $router->get('ats/sa/{id}', ['uses' => 'ATSController@showSportByAthlete']);
      $router->get('ats/st/{id}', ['uses' => 'ATSController@showSportByTeam']);
  }
);