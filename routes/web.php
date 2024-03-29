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
    return redirect('login');
});

    //route::view('/login', "auth.login")->name('login');
    Route::get('/login', 'Auth\LoginController@isLogged')->name('login');
    Route::post('/authentication', 'Auth\LoginController@authentication')->name('authentication');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    //HOME
    Route::view('/home', 'home')->name('home'); 
    Route::get('/home', ['uses'=>'HomeController@index', 'as' => 'home']);  


    //calendar
    Route::get('event/add','ScheduleController@createEvent');
    Route::get('/event/add/client','ScheduleController@createEventCliente');
    Route::post('event/add','ScheduleController@store');
    Route::post('event/client','ScheduleController@storeClient');
    Route::get('event','ScheduleController@calender');


Route::group( [ 'middleware' => 'auth'], function()
{


    Route::group( [ 'middleware' => 'auth'], function() 
    {

    //Perfil do cliente (crair middleware client) https://blog.especializati.com.br/middleware-no-laravel-filtros/
    Route::view('/Profile', 'profile')->name('profile')->middleware('auth'); 
    Route::get('/Profile', ['uses'=>'UserController@profile', 'as' => 'profile']);
    Route::post('/Profile', ['uses'=>'UserController@profile', 'as' => 'profile']);
    //Route::view('/ExamesPaciente', 'paciente')->name('paciente')->middleware('auth'); 
    Route::get('/ExamesPaciente', ['uses'=>'ExamController@indexPaciente', 'as' => 'paciente']);
    Route::post('/Profile/update/{id}', ['uses'=>'UserController@updateProfile', 'as' => 'User.updateProfile']);
    Route::post('/perfil', ['uses'=>'UserController@perfilAtualiza','as'=>'User.perfilAtualiza']);
    Route::get('/diagnotico/user', ['uses'=>'ExamController@indexDiagnostic', 'as' => 'Exam.ViewExamUser']);

});


    //Equipamentos
    Route::get('/equipament', ['uses'=>'EquipamentController@index', 'as' => 'equipament.index']);  
    Route::get('/equipament/add', ['uses'=>'EquipamentController@add', 'as' => 'equipament.add']);
    Route::get('/equipament/menu', ['uses'=>'EquipamentController@menu', 'as' => 'equipament.menu']);
    Route::post('/equipament/save', ['uses'=>'EquipamentController@save', 'as' => 'equipament.save']);
    Route::get('/equipament/edit/{id}', ['uses'=>'EquipamentController@edit', 'as' => 'equipament.edit']);
    Route::put('/equipament/update/{id}', ['uses'=>'EquipamentController@update', 'as' => 'equipament.update']);
    Route::get('/equipament/delete/{id}', ['uses'=>'EquipamentController@delete', 'as' => 'equipament.delete']);

    //Tipo de Exame 
    Route::post('/equipament/add/examtype', ['uses'=>'examtypeController@save', 'as' => 'examtype.save']);

    //Routes user
    Route::get('/User', ['uses'=>'UserController@index', 'as' => 'User.index']);
    Route::get('/User/add', ['uses'=>'UserController@add', 'as' => 'User.add']);
    Route::post('/User/save', ['uses'=>'UserController@save', 'as' => 'User.save']);
    Route::get('/User/edit/{id}', ['uses'=>'UserController@edit', 'as' => 'User.edit']);
    Route::get('/User/updateProfile', ['uses'=>'UserController@profileUpdate', 'as' => 'User.profileUpdate']);
    Route::get('/User/load/{id}', ['uses'=>'UserController@load', 'as' => 'User.load']);
    Route::get('/User/delete/{id}', ['uses'=>'UserController@delete', 'as' => 'User.delete']);


    //Routes Exam
    Route::get('/Exam', ['uses'=>'ExamController@index', 'as' => 'Exam.index']);
    Route::get('/Exam/add', ['uses'=>'ExamController@add', 'as' => 'Exam.add']);
    Route::post('/Exam/save', ['uses'=>'ExamController@save', 'as' => 'Exam.save']);
    Route::get('/Exam/edit/{id}', ['uses'=>'ExamController@edit', 'as' => 'Exam.edit']);
    Route::put('/Exam/update/{id}', ['uses'=>'ExamController@update', 'as' => 'Exam.update']);
    Route::get('/Exam/delete/{id}', ['uses'=>'ExamController@delete', 'as' => 'Exam.delete']);

    //Routes Imagens de exames
    Route::post('/ExamImage/uploadImages', ['uses'=>'ExamImageController@uploadImages', 'as' => 'Exam.uploadImages']);
    Route::get('/ExamImage/images/{id}', ['uses'=>'ExamImageController@images', 'as' => 'Exam.images']);
    Route::post('/ExamImage/images', ['uses'=>'ExamImageController@UparImagens', 'as' => 'Examimage.UparImagens']);
    
    //Routes visualizar imagens
    Route::get('/ViewExam', ['uses'=>'ExamController@ViewExam', 'as' => 'Exam.ViewExam']);
    Route::get('/ViewExam/{id}', ['uses'=>'ExamController@visualizar', 'as' => 'Exam.visualizar']);
    


//Medicos 
Route::get('/Medicos', ['uses'=>'PeopleController@indexMedicos', 'as' => 'people.indexMedicos']);

//Pacientes

Route::get('/Pacientes', ['uses'=>'PeopleController@indexPacientes', 'as' => 'people.indexPacientes']);

//Funcionarios
Route::get('/Funcionarios', ['uses'=>'PeopleController@indexFuncionarios', 'as' => 'people.indexFuncionarios']);

//Usuários
Route::Post('/people/add/user', ['uses'=>'UserController@save', 'as' => 'user.save']);

//Routes people
Route::get('/people', ['uses'=>'PeopleController@index', 'as' => 'people.index']);
Route::get('/people/add', ['uses'=>'PeopleController@add', 'as' => 'people.add']);
Route::post('/people/save', ['uses'=>'PeopleController@save', 'as' => 'people.save']);
Route::get('/people/edit/{id}', ['uses'=>'PeopleController@edit', 'as' => 'people.edit']);
Route::put('/people/update/{id}', ['uses'=>'PeopleController@update', 'as' => 'people.update']);
Route::get('/people/delete/{id}', ['uses'=>'PeopleController@delete', 'as' => 'people.delete']);


    
Route::get('/people/detail/{id}', ['uses'=>'PeopleController@detail', 'as' => 'people.detail']);
Route::get('/telefone/add/{id}', ['uses'=>'TelefoneController@add', 'as' => 'telefone.add']);
Route::post('/telefone/save/{id}', ['uses'=>'TelefoneController@save', 'as' => 'telefone.save']);

Route::get('/agenda', 'EventController@index')->name('events.index');
Route::get('/agendamento', 'EventController@index')->name('events.agenda');

Route::post('/agenda', 'EventController@addEvent')->name('events.agenda');

//Routes do Laudo, Diagnóstico
Route::view('/diagnostico', 'diagnostic.add')->name('diagnostico');
Route::get('/diagnosticoAdd/{id}', ['uses'=>'DiagnoticController@add', 'as' => 'diagnostic.add']);
Route::get('/diagnosticoLaudo/{id}', ['uses'=>'DiagnoticController@view', 'as' => 'diagnostic.view']);
Route::any('/diagnosticoSave', ['uses'=>'DiagnoticController@save', 'as' => 'diagnostic.save']);
Route::get('/diagnostico/print/{id}', 'DiagnoticController@print')->name('print');
Route::any('/diagnostico/edit/{id}', 'DiagnoticController@edit')->name('edit');
Route::any('/diagnostico/editSave', ['uses'=>'DiagnoticController@saveEdit', 'as' => 'saveEdit']);


});