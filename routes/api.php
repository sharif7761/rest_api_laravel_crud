<?php

Route::ApiResource('/class', 'Api\SclassController');
Route::ApiResource('/course', 'Api\CourseController');
Route::ApiResource('/section', 'Api\SectionController');
Route::ApiResource('/student', 'Api\StudentController');


Route::group([

    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
