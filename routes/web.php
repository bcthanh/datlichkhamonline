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

/** Welcome page */
// Route::get('/', function () {
//     return view('welcome');
// });

//route cho tim kiem bac si khi nhap tu khoa - live search
Route::get('/', 'HomeController@index');
Route::get('/search', 'HomeController@search');
Route::get('/search/name', 'HomeController@searchName');
Route::get('/search/address', 'HomeController@searchAddress');
Route::get('/search/chuyenkhoa', 'HomeController@searchChuyenkhoa');
/*Route::group(['prefix' => 'api/'], function() {
    Route::resource('proficiency', 'ProficiencyController');
    Route::resource('appointment', 'AppointmentController');
    

});*/

//cac route lien quan den Auth 
Auth::routes();
//tuong duong cac route
// login - logout - register - password/reset - email/confirm...

/* Incial page helpdesk and doctor*/
Route::get('/medic/home', 'MedicController@home')->name('medic');	
// Route::redirect('/medic/home', '/medic/appointment/home');	
Route::get('/help/home', 'HelpController@index')->name('help');
// Route::redirect('/help/home', '/help/appointment/home');

/** Manage doctor */
Route::get('/help/users/home', 'HelpController@listDoctors');
Route::get('/help/users/delete/{id}', 'HelpController@inactive');
Route::get('/help/users/active/{id}', 'HelpController@active');
Route::get('/help/users/edit', 'HelpController@edit');

/** Register a new doctor */
Route::get('/help/register', 'HelpController@register');
Route::post('/help/home/register', 'HelpController@store');

/** Show data */
/*Route::get('/help/appointment/home', function () {
    return view('help.appointment.home');
});*/

/** Thiet lap thoi gian kham cua bac si */
Route::get('/medic/schedule-timings', 'ScheduleController@index');
/** Appointments home */
Route::get('/medic/appointment/home', 'AppointmentDoctorController@index');

/** Edit and delete appointment */
Route::get('/medic/appointment/edit/{id}', 'AppointmentDoctorController@edit');
Route::post('medic/home/appointment/{id}', 'AppointmentDoctorController@update');

/** List appointments */
Route::get('/medic/home/appointment/show/{id}', 'AppointmentDoctorController@show');


/////////////////////////////////////////////////////////////////////////////////////

/** List proficiencies */
Route::get('/help/proficiency/home', 'ProficiencyController@index');

/** Register proficiency */
Route::get('/help/proficiency/register', 'ProficiencyController@create');
Route::post('/help/home/proficiency', 'ProficiencyController@store');

/** Edit and delete proficiency */
Route::get('/help/proficiency/edit/{id}', 'ProficiencyController@edit');
Route::post('/help/home/proficiency/{id}', 'ProficiencyController@update');
Route::get('/help/home/proficiency/delete/{id}', 'ProficiencyController@destroy');

/** Attach proficiency */
Route::get('/help/proficiency/attach', 'ProficiencyController@showAttach');
Route::post('/help/home/proficiencyattach', 'ProficiencyController@attach');

/////////////////////////////////////////////////////////////////////////////////////

/** List appointments */
Route::get('/help/appointment/home', 'AppointmentController@index');

/** Register appointment */
Route::get('/help/appointment/register', 'AppointmentController@create');
Route::post('/help/home/appointment', 'AppointmentController@store');

/** Edit and delete appointment */
Route::get('/help/appointment/edit/{id}', 'AppointmentController@edit');
Route::post('/help/home/appointment/{id}', 'AppointmentController@update');
Route::get('/help/home/appointment/delete/{id}', 'AppointmentController@destroy');

/** Helper to find users date */
Route::get('/findUsersDate', 'HelpController@findUsersDate');
/*Route::get('/findEspecialidadeDate', 'HelpController@findEspecialidadeDate');*/

Route::get('/findUsersDateFromHome', 'HomeController@findUsersDate');
Route::post('/appointmentstore', 'HomeController@store');
Route::get('/thanks', 'HomeController@thanks');

/** Bac si cap nhat profile cua minh */
Route::get('/medic/profile/edit', 'ProfileController@edit');
Route::post('/medic/profile/update', 'ProfileController@update');
Route::post('/schedule-settings', 'ScheduleController@scheduleSettings');

//xem thong tin bac si
Route::get('/doctors/{id}', 'HomeController@showDoctor');
Route::get('/doctor-profile/{slug}', 'HomeController@viewProfile');
Route::get('/booking/{slug}', 'HomeController@booking');
Route::get('/getSlotsByDate', 'HomeController@getSlotsByDate');
Route::post('/datlichkham', 'HomeController@datlichkham');
Route::get('/dsbacsi/{proid}', 'HomeController@dsbacsitheochuyenkhoa');
Route::get('/search-appointment', 'HomeController@searchAppointment');
Route::post('/search-appointment-result', 'HomeController@searchAppointmentResult');