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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::get('/home', 'HomeController@index')->name('home.show');
Route::get('/clinics', 'ClinicsController@index')->name('clinics.show');
Route::get('/doctors', 'DoctorsController@index')->name('doctors.show');
Route::get('/welcome', 'WelcomeController@index')->name('welcome.show');
Route::get('/patients/data/show', 'PatientController@index')->name('patient.show');
Route::get('/medicaments/show', 'MedicamentController@index')->name('medicaments.show');
Route::get('/procedures/show', 'ProcedureController@index')->name('procedures.show');
Route::get('/diseases/show', 'DiseaseController@index')->name('disease.show');
Route::get('/presence/show', 'PresenceController@index')->name('presence.show');
Route::get('/rooms/show', 'RoomController@index')->name('rooms.show');
Route::get('/symptoms/show', 'SymptomController@index')->name('symptoms.show');
Route::get('/treatments/show', 'TreatmentController@index')->name('treatments.show');
Route::get('/symptom/create', 'SymptomController@create');
Route::post('/symptoms', 'SymptomController@store');
Route::get('/treatment/create', 'TreatmentController@create');
Route::post('/treatments', 'TreatmentController@store');
Route::get('/presence/create', 'PresenceController@create');
Route::post('/presence', 'PresenceController@store');
Route::get('/disease/create', 'DiseaseController@create');
Route::post('/disease', 'DiseaseController@store');
Route::get('/medicaments/create', 'MedicamentController@create');
Route::post('/medicaments', 'MedicamentController@store');
Route::get('/procedures/create', 'ProcedureController@create');
Route::get('/rooms/create', 'RoomController@create');
Route::post('/rooms', 'RoomController@store');
Route::get('/rooms/{room}/edit', 'RoomController@edit')->name('room.edit');
Route::patch('/rooms/{room}', 'RoomController@update')->name('room.update');
Route::get('/home/{employee}/edit', 'EmployeeController@edit')->name('employee.edit');
Route::patch('/home/{employee}', 'EmployeeController@update')->name('employee.update');
Route::get('/symptoms/{symptom}/edit', 'SymptomController@edit')->name('symptom.edit');
Route::patch('/symptoms/{symptom}', 'SymptomController@update')->name('symptom.update');
Route::get('/treatments/{treatment}/edit', 'TreatmentController@edit')->name('treatment.edit');
Route::patch('/treatments/{treatment}', 'TreatmentController@update')->name('treatment.update');
Route::post('/procedures', 'ProcedureController@store');
Route::get('/medicaments/{medicament}/edit', 'MedicamentController@edit')->name('medicament.edit');
Route::patch('/medicaments/{medicament}', 'MedicamentController@update')->name('medicament.update');
Route::get('/procedures/{procedure}/edit', 'ProcedureController@edit')->name('procedure.edit');
Route::patch('/procedures/{procedure}', 'ProcedureController@update')->name('procedure.update');
