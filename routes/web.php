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
Route::get('/patient/{patient}/show', 'PatientController@index')->name('patient.show');
Route::get('/patient/{patient}/filter', 'PatientDataController@filter')->name('patient.filter');
Route::get('/personalData/show', 'PersonalDataController@index')->name('personalData.show');
Route::get('/medicaments/show', 'MedicamentController@index')->name('medicaments.show');
Route::get('/procedures/show', 'ProcedureController@index')->name('procedures.show');
Route::get('/diseases/show', 'DiseaseController@index')->name('disease.show');
Route::get('/presence/show', 'HomeController@index')->name('presence.show');
Route::get('/rooms/show', 'RoomController@index')->name('rooms.show');
Route::get('/symptoms/show', 'SymptomController@index')->name('symptoms.show');
Route::get('/treatments/show', 'TreatmentController@index')->name('treatments.show');
Route::get('/statistics/show', 'StatisticsController@index')->name('statistics.show');
Route::get('/innerData/show', 'InnerDataController@index')->name('innerData.show');
Route::get('/statistics/show', 'StatisticsController@index')->name('statistics.show');
Route::get('/statistics/visits/show', 'StatisticsVisitsController@index')->name('statistics.visits.show');
Route::get('/clinics/filter', 'ClinicsController@filter')->name('clinics.filter');
Route::get('/doctors/filter', 'DoctorsController@filter')->name('doctors.filter');
Route::get('/symptoms/filter', 'SymptomController@filter')->name('symptoms.filter');
Route::get('/treatments/filter', 'TreatmentController@filter')->name('treatment.filter');
Route::get('/procedures/filter', 'ProcedureController@filter')->name('procedure.filter');
Route::get('/medicaments/filter', 'MedicamentController@filter')->name('medicament.filter');
Route::get('/diseases/filter', 'DiseaseController@filter')->name('disease.filter');
Route::get('/rooms/filter', 'RoomController@filter')->name('rooms.filter');
Route::get('/presences/filter', 'HomeController@filter')->name('presence.filter');
Route::get('/patient/{patient}/treatments/show', 'PatientTreatmentController@index')->name('patientTreatment.show');
Route::get('/patient/{patient}/procedures/show', 'PatientProcedureController@index')->name('patientProcedure.show');
Route::get('/patient/{patient}/symptoms/show', 'PatientSymptomController@index')->name('patientSymptom.show');
Route::get('/patient/{patient}/medicaments/show', 'PatientMedicamentController@index')->name('patientMedicament.show');
Route::get('/patient/{patient}/diseases/show', 'PatientDiseaseController@index')->name('patientDisease.show');
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
Route::get('/patient/{patient}/symptom/create', 'PatientSymptomController@create');
Route::post('/patient/{patient}/symptom', 'PatientSymptomController@store');
Route::get('/patient/{patient}/procedure/create', 'PatientProcedureController@create');
Route::post('/patient/{patient}/procedure', 'PatientProcedureController@store');
Route::get('/patient/{patient}/treatment/create', 'PatientTreatmentController@create');
Route::post('/patient/{patient}/treatment}', 'PatientTreatmentController@store');
Route::get('/patient/{patient}/data/create', 'PatientDataController@create');
Route::post('/patient/{patient}/data', 'PatientDataController@store');
Route::get('/patient/{patient}/treatment/create', 'PatientTreatmentController@create');
Route::post('/patient/{patient}/treatment', 'PatientTreatmentController@store');
Route::get('/patient/{patient}/medicament/create', 'PatientMedicamentController@create');
Route::post('/patient/{patient}/medicament', 'PatientMedicamentController@store');
Route::get('/patient/{patient}/disease/create', 'PatientDiseaseController@create');
Route::post('/patient/{patient}/disease', 'PatientDiseaseController@store');
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
Route::get('/diseases/{disease}/edit', 'DiseaseController@edit')->name('disease.edit');
Route::patch('/diseases/{disease}', 'DiseaseController@update')->name('disease.update');
Route::get('/patient/{patient}/data/{data}/edit', 'PatientDataController@edit')->name('patientData.edit');
Route::patch('/patient/{patient}/data/{data}', 'PatientDataController@update')->name('patientData.update');
Route::get('/patient/{patient}/treatment/{treatment}/edit', 'PatientTreatmentController@edit')->name('patientTreatment.edit');
Route::patch('/patient/{patient}/treatment/{treatment}', 'PatientTreatmentController@update')->name('patientTreatment.update');
Route::get('/patient/{patient}/treatment/{treatment}/delete', 'PatientTreatmentController@destroy')->name('patientTreatment.destroy');
Route::get('/patient/{patient}/procedure/{procedure}/edit', 'PatientProcedureController@edit')->name('patientProcedure.edit');
Route::patch('/patient/{patient}/procedure/{procedure}', 'PatientProcedureController@update')->name('patientProcedure.update');
Route::get('/patient/{patient}/procedure/{procedure}/delete', 'PatientProcedureController@destroy')->name('patientProcedure.destroy');
Route::get('/patient/{patient}/symptom/{symptom}/edit', 'PatientSymptomController@edit')->name('patientSymptom.edit');
Route::patch('/patient/{patient}/symptom/{symptom}', 'PatientSymptomController@update')->name('patientSymptom.update');
Route::get('/patient/{patient}/symptom/{symptom}/delete', 'PatientSymptomController@destroy')->name('patientSymptom.destroy');
Route::get('/patient/{patient}/medicament/{medicament}/edit', 'PatientMedicamentController@edit')->name('patientMedicament.edit');
Route::patch('/patient/{patient}/medicament/{medicament}', 'PatientMedicamentController@update')->name('patientMedicament.update');
Route::get('/patient/{patient}/medicament/{medicament}/delete', 'PatientMedicamentController@destroy')->name('patientMedicament.destroy');
Route::get('/patient/{patient}/disease/{disease}/edit', 'PatientDiseaseController@edit')->name('patientDisease.edit');
Route::patch('/patient/{patient}/disease/{disease}', 'PatientDiseaseController@update')->name('patientDisease.update');
Route::get('/patient/{patient}/disease/{disease}/delete', 'PatientDiseaseController@destroy')->name('patientDisease.destroy');
Route::get('/presence/{presence}/edit', 'PresenceController@edit')->name('presence.edit');
Route::patch('/presence/{presence}', 'PresenceController@update')->name('presence.update');
Route::get('/personalData/edit', 'PersonalDataController@edit')->name('personalData.edit');
Route::patch('/personalData', 'PersonalDataController@update')->name('personalData.update');
