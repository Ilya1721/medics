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
Route::get('/patients/show', 'PatientController@index')->name('patients.show');
Route::get('/patients/filter', 'PatientController@filter')->name('patient.filter');
Route::get('/personalData/show', 'PersonalDataController@index')->name('personalData.show');
Route::get('/medicaments/show', 'MedicamentController@index')->name('medicaments.show');
Route::get('/procedures/show', 'ProcedureController@index')->name('procedures.show');
Route::get('/diseases/show', 'DiseaseController@index')->name('disease.show');
Route::get('/presence/{id}/show', 'PresenceController@index')->name('presence.show');
Route::get('/patient/{patient}/show', 'PatientPersonalDataController@index')->name('patient.show');
Route::get('/patient/{id}/symptoms/show', 'PatientSymptomController@index');
Route::get('/patient/{id}/treatments/show', 'PatientTreatmentController@index');
Route::get('/patient/{id}/procedures/show', 'PatientProcedureController@index');
Route::get('/patient/{id}/medicaments/show', 'PatientMedicamentController@index');
Route::get('/patient/{id}/diseases/show', 'PatientDiseaseController@index');
Route::get('/rooms/show', 'RoomController@index')->name('rooms.show');
Route::get('/symptoms/show', 'SymptomController@index')->name('symptoms.show');
Route::get('/treatments/show', 'TreatmentController@index')->name('treatments.show');
Route::get('/statistics/show', 'StatisticsController@index')->name('statistics.show');
Route::get('/innerData/show', 'InnerDataController@index')->name('innerData.show');
Route::get('/statistics/show', 'StatisticsController@index')->name('statistics.show');
Route::get('/statistics/visits/show', 'StatisticsVisitsController@index')->name('statistics.visits.show');
Route::get('/statistics/visits/filter', 'StatisticsVisitsController@filter')->name('statistics.visits.filter');
Route::get('/statistics/symptoms/show', 'StatisticsSymptomController@index')->name('statistics.symptom.show');
Route::get('/statistics/diseases/show', 'StatisticsDiseaseController@index')->name('statistics.disease.show');
Route::get('/statistics/medicaments/show', 'StatisticsMedicamentController@index')->name('statistics.medicament.show');
Route::get('/statistics/treatments/show', 'StatisticsTreatmentController@index')->name('statistics.treatment.show');
Route::get('/statistics/procedures/show', 'StatisticsProcedureController@index')->name('statistics.procedure.show');
Route::get('/statistics/rooms/show', 'StatisticsRoomController@index')->name('statistics.room.show');
Route::get('/clinics/filter', 'ClinicsController@filter')->name('clinics.filter');
Route::get('/doctors/filter', 'DoctorsController@filter')->name('doctors.filter');
Route::get('/symptoms/filter', 'SymptomController@filter')->name('symptoms.filter');
Route::get('/treatments/filter', 'TreatmentController@filter')->name('treatment.filter');
Route::get('/procedures/filter', 'ProcedureController@filter')->name('procedure.filter');
Route::get('/medicaments/filter', 'MedicamentController@filter')->name('medicament.filter');
Route::get('/diseases/filter', 'DiseaseController@filter')->name('disease.filter');
Route::get('/rooms/filter', 'RoomController@filter')->name('rooms.filter');
Route::get('/presences/filter', 'HomeController@filter')->name('presence.filter');
Route::get('/presence/{presence}/treatments/show', 'PresenceTreatmentController@index')->name('presenceTreatment.show');
Route::get('/presence/{presence}/procedures/show', 'PresenceProcedureController@index')->name('presenceProcedure.show');
Route::get('/presence/{presence}/symptoms/show', 'PresenceSymptomController@index')->name('presenceSymptom.show');
Route::get('/presence/{presence}/medicaments/show', 'PresenceMedicamentController@index')->name('presenceMedicament.show');
Route::get('/presence/{presence}/diseases/show', 'PresenceDiseaseController@index')->name('presenceDisease.show');
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
Route::get('/presence/{presence}/symptom/create', 'PresenceSymptomController@create');
Route::post('/presence/{presence}/symptom', 'PresenceSymptomController@store');
Route::get('/presence/{presence}/procedure/create', 'PresenceProcedureController@create');
Route::post('/presence/{presence}/procedure', 'PresenceProcedureController@store');
Route::get('/presence/{presence}/treatment/create', 'PresenceTreatmentController@create');
Route::post('/presence/{presence}/treatment}', 'PresenceTreatmentController@store');
Route::get('/presence/{presence}/data/create', 'PresenceDataController@create');
Route::post('/presence/{presence}/data', 'PresenceDataController@store');
Route::get('/presence/{presence}/treatment/create', 'PresenceTreatmentController@create');
Route::post('/presence/{presence}/treatment', 'PresenceTreatmentController@store');
Route::get('/presence/{presence}/medicament/create', 'PresenceMedicamentController@create');
Route::post('/presence/{presence}/medicament', 'PresenceMedicamentController@store');
Route::get('/presence/{presence}/disease/create', 'PresenceDiseaseController@create');
Route::post('/presence/{presence}/disease', 'PresenceDiseaseController@store');
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
Route::get('/presence/{presence}/data/{data}/edit', 'PresenceDataController@edit')->name('presenceData.edit');
Route::patch('/presence/{presence}/data/{data}', 'PresenceDataController@update')->name('presenceData.update');
Route::get('/presence/{presence}/treatment/{treatment}/edit', 'PresenceTreatmentController@edit')->name('presenceTreatment.edit');
Route::patch('/presence/{presence}/treatment/{treatment}', 'PresenceTreatmentController@update')->name('presenceTreatment.update');
Route::get('/presence/{presence}/treatment/{treatment}/delete', 'PresenceTreatmentController@destroy')->name('presenceTreatment.destroy');
Route::get('/presence/{presence}/procedure/{procedure}/edit', 'PresenceProcedureController@edit')->name('presenceProcedure.edit');
Route::patch('/presence/{presence}/procedure/{procedure}', 'PresenceProcedureController@update')->name('presenceProcedure.update');
Route::get('/presence/{presence}/procedure/{procedure}/delete', 'PresenceProcedureController@destroy')->name('presenceProcedure.destroy');
Route::get('/presence/{presence}/symptom/{symptom}/edit', 'PresenceSymptomController@edit')->name('presenceSymptom.edit');
Route::patch('/presence/{presence}/symptom/{symptom}', 'PresenceSymptomController@update')->name('presenceSymptom.update');
Route::get('/presence/{presence}/symptom/{symptom}/delete', 'PresenceSymptomController@destroy')->name('presenceSymptom.destroy');
Route::get('/presence/{presence}/medicament/{medicament}/edit', 'PresenceMedicamentController@edit')->name('presenceMedicament.edit');
Route::patch('/presence/{presence}/medicament/{medicament}', 'PresenceMedicamentController@update')->name('presenceMedicament.update');
Route::get('/presence/{presence}/medicament/{medicament}/delete', 'PresenceMedicamentController@destroy')->name('presenceMedicament.destroy');
Route::get('/presence/{presence}/disease/{disease}/edit', 'PresenceDiseaseController@edit')->name('presenceDisease.edit');
Route::patch('/presence/{presence}/disease/{disease}', 'PresenceDiseaseController@update')->name('presenceDisease.update');
Route::get('/presence/{presence}/disease/{disease}/delete', 'PresenceDiseaseController@destroy')->name('presenceDisease.destroy');
Route::get('/presence/{presence}/edit', 'PresenceController@edit')->name('presence.edit');
Route::patch('/presence/{presence}', 'PresenceController@update')->name('presence.update');
Route::get('/personalData/edit', 'PersonalDataController@edit')->name('personalData.edit');
Route::patch('/personalData', 'PersonalDataController@update')->name('personalData.update');
Route::get('/patient/{patient}/edit', 'PatientPersonalDataController@edit')->name('patientPersonalData.edit');
Route::patch('/patient/{patient}', 'PatientPersonalDataController@update')->name('patientPersonalData.update');
