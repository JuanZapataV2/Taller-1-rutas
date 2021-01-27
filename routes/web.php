<?php

use Illuminate\Support\Facades\Route;

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

/** Ruta con mis datos personales (Punto 1) */
Route::get('greetings', function () {
    return view('greetings');
});

/*Ruta con parámetro de forma obligatoria 
Route::get('class/{actualYear}', function ($actualYear) {
    return "Actual year is ".$actualYear." :D";
});

Ruta que recibe un parámetro en la URI opcional
Route::get('classM/{actualMonth?}', function ($actualMonth="January") {
    return "The actual month is ".$actualMonth." :D";
});

/*Vista que retorna parámetros*/
/* Forma 1: Método with 
Route::get('contactus', function () {
    $programName = "System Engineering";
    //With recibe 2 parámetros (nombre de variable, variable)
    return view('contact')->with('programName', $programName);
});*/

/* Forma 2: Utilizando método with como array */
Route::get('greetings1', function () {
    $way = 1;
    $name = "Juan Pablo Zapata Atehortua";
    $id = "1002636277";
    $semester = 5;
    return view('greetings')->with(['way' => $way,
                                'name' => $name,
                                'id' => $id,
                                'semester' => $semester]);
    
});

/*Forma 3: Pasando un array como segundo parámetro de view */
Route::get('greetings2', function () {
    $way = 2;
    $name = "Juan Pablo Zapata Atehortua";
    $id = "1002636277";
    $semester = 5;
    return view('greetings', ['way' => $way,
                                'name' => $name,
                                'id' => $id,
                                'semester' => $semester]);    
});

/*Forma 4: Pasando el método COMPACT como segundo parámetro de view */
Route::get('greetings3', function () {
    $way = 3;
    $name = "Juan Pablo Zapata Atehortua";
    $id = "1002636277";
    $semester = 5;
    return view('greetings', compact('way', 'name','id','semester'));
});

/* (MALA PRACTICA)
En el archivo web.php NO SE DECLARAN ARRAYS */

/*Se pasan los diferentes framewokrs con su respectivo link mediante el método compact */
$feFrameworks=[
    ['frameworkName' => 'React', 'link' => 'https://reactjs.org/'],
    ['frameworkName' => 'Angular', 'link' => 'https://angular.io/'],
    ['frameworkName' => 'Vue.js', 'link' => 'https://vuejs.org/'],
    ['frameworkName' => 'Ember', 'link' => 'https://emberjs.com/']
];

$beFrameworks=[
    ['frameworkName' => 'Laravel', 'link' => 'https://laravel.com/'],
    ['frameworkName' => 'Django', 'link' => 'https://www.djangoproject.com/'],
    ['frameworkName' => 'Express.js', 'link' => 'https://expressjs.com/'],
    ['frameworkName' => 'Ruby on rails', 'link' => 'https://rubyonrails.org/']
];

Route::view('frameworks','frameworks', compact('feFrameworks','beFrameworks'));
/*
$link='https://calendar.google.com/calendar/u/1/r';
$programName = "System Engineering (Compact)";
$semester = 5;
/*URI, VISTA y COMPACT

*/