<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Welcome Laravel
Route::get('/', function () {
    return view('welcome');
});

// Login
Route::get('/login/show', ['as' => 'login/show', 'uses' => 'UserController@show_login']);
Route::post('/login', ['as' => 'login', 'uses' => 'UserController@login']);

// Verify email
Route::post('/user/password/recovery', ['as' => 'user/password/recovery', 'uses' => 'UserController@verify']);

// Array
Route::get('/array', ['as' => 'array', 'uses' => 'ArrayController@index']);

// Arrays
Route::get('/arrays', ['as' => 'arrays', 'uses' => 'ArrController@index']);

// Date
Route::get('/dates', ['as' => 'dates', 'uses' => 'DateController@index']);

Route::group(['middleware' => 'auth:web'],function(){

// User
    Route::get('/users', ['as' => 'users', 'uses' => 'UserController@index']);
    Route::post('/user/store', ['as' => 'user/store', 'uses' => 'UserController@store']);
    Route::get('/user/{user_id}/show', ['as' => 'user/show', 'uses' => 'UserController@show']);
    Route::post('/user/{user_id}/update', ['as' => 'user/update', 'uses' => 'UserController@update']);
    Route::get('/user/{user_id}/delete', ['as' => 'user/delete', 'uses' => 'UserController@destroy']);

// user_roles
    Route::get('/user/{user_id}/role/show', ['as' => 'user/role/show', 'uses' => 'UserController@show_role']);
    Route::post('/user/{user_id}/role/update', ['as' => 'user/role/update', 'uses' => 'UserController@update_role']);

// user_privileges
    Route::get('/user/{user_id}/privilege/show', ['as' => 'user/privilege/show', 'uses' => 'UserController@show_privilege']);
    Route::post('/user/{user_id}/privilege/update', ['as' => 'user/privilege/update', 'uses' => 'UserController@update_privilege']);

// Roles
    Route::get('/roles', ['as' => 'roles', 'uses' => 'RoleController@index']);
    Route::post('/role/store', ['as' => 'role/store', 'uses' => 'RoleController@store']);
    Route::get('/role/{role_id}/show', ['as' => 'role/show', 'uses' => 'RoleController@show']);
    Route::post('/role/{role_id}/update', ['as' => 'role/update', 'uses' => 'RoleController@update']);
    Route::get('/role/{role_id}/delete', ['as' => 'role/delete', 'uses' => 'RoleController@destroy']);

// Privileges
    Route::get('/privileges', ['as' => 'privileges', 'uses' => 'PrivilegeController@index']);
    Route::post('/privilege/store', ['as' => 'privilege/store', 'uses' => 'PrivilegeController@store']);
    Route::get('/privilege/{privilege_id}/show', ['as' => 'privilege/show', 'uses' => 'PrivilegeController@show']);
    Route::post('/privilege/{privilege_id}/update', ['as' => 'privilege/update', 'uses' => 'PrivilegeController@update']);
    Route::get('/privilege{privilege_id}/delete', ['as' => 'privilege/delete', 'uses' => 'PrivilegeController@destroy']);

// Hotels
    Route::get('/accommodation_types', ['as' => 'accommodation_types', 'uses' => 'AccommodationTypeController@index']);
    Route::post('/accommodation_type/store', ['as' => 'accommodation_type/store', 'uses' => 'AccommodationTypeController@store']);
    Route::get('/accommodation_type/{accommodation_type_id}/show', ['as' => 'accommodation_type/show', 'uses' => 'AccommodationTypeController@show']);
    Route::post('/accommodation_type/{accommodation_type_id}/update', ['as' => 'accommodation_type/update', 'uses' => 'AccommodationTypeController@update']);
    Route::get('/accommodation_type/{accommodation_type_id}/delete', ['as' => 'accommodation_type/delete', 'uses' => 'AccommodationTypeController@destroy']);

// Info Hotels
    Route::get('/accommodations', ['as' => 'accommodations', 'uses' => 'AccommodationController@index']);
    Route::post('/accommodation/store', ['as' => 'accommodation/store', 'uses' => 'AccommodationController@store']);
    Route::get('/accommodation/{accommodation_id}/show', ['as' => 'accommodation/show', 'uses' => 'AccommodationController@show']);
    Route::post('/accommodation/{accommodation_id}/update', ['as' => 'accommodation/update', 'uses' => 'AccommodationController@update']);
    Route::get('/accommodation/{accommodation_id}/delete', ['as' => 'accommodation/delete', 'uses' => 'AccommodationController@destroy']);

// Rooms
    Route::get('/rooms', ['as' => 'rooms', 'uses' => 'RoomController@index']);
    Route::post('/room/store', ['as' => 'room/store', 'uses' => 'RoomController@store']);
    Route::get('/room/{room_id}/show', ['as' => 'room/show', 'uses' => 'RoomController@show']);
    Route::post('/room/{room_id}/update', ['as' => 'room/update', 'uses' => 'RoomController@update']);
    Route::get('/room/{room_id}/delete', ['as' => 'room/delete', 'uses' => 'RoomController@destroy']);

// Reservations
    Route::get('/reservations', ['as' => 'reservations', 'uses' => 'ReservationController@index']);
    Route::post('/reservation/store', ['as' => 'reservation/store', 'uses' => 'ReservationController@store']);
    Route::get('/reservation/{reservation_id}/show', ['as' => 'reservation/show', 'uses' => 'ReservationController@show']);
    Route::post('/reservation/{reservation_id}/update', ['as' => 'reservation/update', 'uses' => 'ReservationController@update']);
    Route::get('/reservation/{reservation_id}/delete', ['as' => 'reservation/delete', 'uses' => 'ReservationController@destroy']);

// Accommodation Treatment
    Route::get('/accommodation_treatments', ['as' => 'accommodation_treatments', 'uses' => 'AccommodationTreatmentController@index']);
    Route::post('/accommodation_treatment/store', ['as' => 'accommodation_treatment/store', 'uses' => 'AccommodationTreatmentController@store']);
    Route::get('/accommodation_treatment/{accommodation_treatment_id}/show', ['as' => 'accommodation_treatment/show', 'uses' => 'AccommodationTreatmentController@show']);
    Route::post('/accommodation_treatment/{accommodation_treatment_id}/update', ['as' => 'accommodation_treatment/update', 'uses' => 'AccommodationTreatmentController@update']);
    Route::get('/accommodation_treatment/{accommodation_treatment_id}/delete', ['as' => 'accommodation_treatment/delete', 'uses' => 'AccommodationTreatmentController@destroy']);

// Cluster
    Route::get('/clusters', ['as' => 'clusters', 'uses' => 'ClusterController@index']);
    Route::post('/cluster/store', ['as' => 'cluster/store', 'uses' => 'ClusterController@store']);
    Route::get('/cluster/{cluster_id}/show', ['as' => 'cluster/show', 'uses' => 'ClusterController@show']);
    Route::post('/cluster/{cluster_id}/update', ['as' => 'cluster/update', 'uses' => 'ClusterController@update']);
    Route::get('/cluster/{cluster_id}/delete', ['as' => 'cluster/delete', 'uses' => 'ClusterController@destroy']);

// Driver
    Route::get('/drivers', ['as' => 'drivers', 'uses' => 'DriverController@index']);
    Route::post('/driver/store', ['as' => 'driver/store', 'uses' => 'DriverController@store']);
    Route::get('/driver/{driver_id}/show', ['as' => 'driver/show', 'uses' => 'DriverController@show']);
    Route::post('/driver/{driver_id}/update', ['as' => 'driver/update', 'uses' => 'DriverController@update']);
    Route::get('/driver/{driver_id}/delete', ['as' => 'driver/delete', 'uses' => 'DriverController@destroy']);

// Vehicle
    Route::get('/vehicles', ['as' => 'vehicles', 'uses' => 'VehicleController@index']);
    Route::post('/vehicle/store', ['as' => 'vehicle/store', 'uses' => 'VehicleController@store']);
    Route::get('/vehicle/{vehicle_id}/show', ['as' => 'vehicle/show', 'uses' => 'VehicleController@show']);
    Route::post('/vehicle/{vehicle_id}/update', ['as' => 'vehicle/update', 'uses' => 'VehicleController@update']);
    Route::get('/vehicle/{vehicle_id}/delete', ['as' => 'vehicle/delete', 'uses' => 'VehicleController@destroy']);

// Arrivals Departures Types
    Route::get('/arrivals_departures_types', ['as' => 'arrivals_departures_types', 'uses' => 'ArrivalsDeparturesTypeController@index']);
    Route::post('/arrivals_departures_type/store', ['as' => 'arrivals_departures_type/store', 'uses' => 'ArrivalsDeparturesTypeController@store']);
    Route::get('/arrivals_departures_type/{arrivals_departures_type_id}/show', ['as' => 'arrivals_departures_type/show', 'uses' => 'ArrivalsDeparturesTypeController@show']);
    Route::post('/arrivals_departures_type/{arrivals_departures_type_id}/update', ['as' => 'arrivals_departures_type/update', 'uses' => 'ArrivalsDeparturesTypeController@update']);
    Route::get('/arrivals_departures_type/{arrivals_departures_type_id}/delete', ['as' => 'arrivals_departures_type/delete', 'uses' => 'ArrivalsDeparturesTypeController@destroy']);

// Arrivals Departures Means
    Route::get('/arrivals_departures_means', ['as' => 'arrivals_departures_means', 'uses' => 'ArrivalsDeparturesMeanController@index']);
    Route::post('/arrivals_departures_mean/store', ['as' => 'arrivals_departures_mean/store', 'uses' => 'ArrivalsDeparturesMeanController@store']);
    Route::get('/arrivals_departures_mean/{arrivals_departures_mean_id}/show', ['as' => 'arrivals_departures_mean/show', 'uses' => 'ArrivalsDeparturesMeanController@show']);
    Route::post('/arrivals_departures_mean/{arrivals_departures_mean_id}/update', ['as' => 'arrivals_departures_mean/update', 'uses' => 'ArrivalsDeparturesMeanController@update']);
    Route::get('/arrivals_departures_mean/{arrivals_departures_mean_id}/delete', ['as' => 'arrivals_departures_mean/delete', 'uses' => 'ArrivalsDeparturesMeanController@destroy']);

// Arrivals Departures Venues
    Route::get('/arrivals_departures_venues', ['as' => 'arrivals_departures_venues', 'uses' => 'ArrivalsDeparturesVenueController@index']);
    Route::post('/arrivals_departures_venue/store', ['as' => 'arrivals_departures_venue/store', 'uses' => 'ArrivalsDeparturesVenueController@store']);
    Route::get('/arrivals_departures_venue/{arrivals_departures_venue_id}/show', ['as' => 'arrivals_departures_venue/show', 'uses' => 'ArrivalsDeparturesVenueController@show']);
    Route::post('/arrivals_departures_venue/{arrivals_departures_venue_id}/update', ['as' => 'arrivals_departures_venue/update', 'uses' => 'ArrivalsDeparturesVenueController@update']);
    Route::get('/arrivals_departures_venue/{arrivals_departures_venue_id}/delete', ['as' => 'arrivals_departures_venue/delete', 'uses' => 'ArrivalsDeparturesVenueController@destroy']);

// Arrivals Departures
    Route::get('/arrivals_departures', ['as' => 'arrivals_departures', 'uses' => 'ArrivalsDepartureController@index']);
    Route::post('/arrivals_departure/store', ['as' => 'arrivals_departure/store', 'uses' => 'ArrivalsDepartureController@store']);
    Route::get('/arrivals_departure/{arrivals_departure_id}/show', ['as' => 'arrivals_departure/show', 'uses' => 'ArrivalsDepartureController@show']);
    Route::post('/arrivals_departure/{arrivals_departure_id}/update', ['as' => 'arrivals_departure/update', 'uses' => 'ArrivalsDepartureController@update']);
    Route::get('/arrivals_departure/{arrivals_departure_id}/delete', ['as' => 'arrivals_departure/delete', 'uses' => 'ArrivalsDepartureController@destroy']);

// Form Data
    Route::get('/form_datas', ['as' => 'form_datas', 'uses' => 'FormDataController@index']);
    Route::post('/form_data/store', ['as' => 'form_data/store', 'uses' => 'FormDataController@store']);
    Route::get('/form_data/{form_data_id}/show', ['as' => 'form_data/show', 'uses' => 'FormDataController@show']);
    Route::post('/form_data/{form_data_id}/update', ['as' => 'form_data/update', 'uses' => 'FormDataController@update']);
    Route::get('/form_data/{form_data_id}/delete', ['as' => 'form_data/delete', 'uses' => 'FormDataController@destroy']);

    // Arrival
    Route::get('/arrival/{arrival_id}/show', ['as' => 'arrival/show', 'uses' => 'FormDataController@show']);
    Route::post('/arrival/{arrival_id}/update', ['as' => 'arrival/update', 'uses' => 'FormDataController@update']);
});