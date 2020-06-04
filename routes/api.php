<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace'=>'API'], function(){
  Route::group([
    'prefix' => 'auth'
  ], function() {
   

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
      
    });
  });

  // APIs that can access after login
  Route::group([
    'middleware' => 'auth:api'
  ], function() {

      
       
});
  
  // APIs that can access without login
  // Route::get('public', 'ControllerName@functionName');
  // Route::post('public', 'ControllerName@functionName');
  // Write your routs here...
  
 
});
