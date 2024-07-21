<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use Illuminate\Http\Request;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassController;

// Route::get('login', [ExampleController::class, 'login']);
// Route::get('cv', [ExampleController::class, 'cv']);
// Route::get('contact', [ExampleController::class, 'contact']);
// Route::get('cars/create', [CarController::class, 'create'])->name('cars.create');
// Route::post('cars', [CarController::class, 'store'])->name('cars.store');
Route::get('classes/create', [ClassController::class, 'create'])->name('classes.create');
Route::post('classes', [ClassController::class, 'store'])->name('classes.store');


Route::get('', function () {
    return view('welcome');
});


// Route::prefix('accounts')->group(function(){
//     Route::get('', function () {
//         return "accounts index";
//     });

//     Route::get('admin', function () {
//         return "accounts admin";
//     });

//     Route::get('user', function () {
//         return "accounts user";
//     });
// });

// Route::prefix('cars')->group(function(){
//     Route::get('', function () {
//         return "cars index";
//     });

//     Route::prefix('usa')->group(function() {
//         Route::get('ford', function () {
//             return "cars ford";
//         });
//         Route::get('tesla', function () {
//             return "cars tesla";
//         });
//     });

//     Route::prefix('ger')->group(function() {
//         Route::get('ford', function () {
//             return "cars ford";
//         });
//         Route::get('tesla', function () {
//             return "cars tesla";
//         });
//     });
// });


// Route::fallback(function(){
//     return redirect('/');
// });



// Route::get('link', function () {
//     $url = route('w');
//     return "<a href='$url'>go to welcome</a>  ";
//     // return redirect('welcome');
// });

// Route::get('welcome', function () {
//     return "welcome to laravel";
// })->name('w');

// Route::post('data', function() {
//     return "data received";
// })->name('data');



// task3

// method1

Route::post('contact-data', function(Request $request) {
    $data = $request->all();
    return $data;
})->name('contact-data');

// //method2
// Route::post('contact-data', function(Request $request) {
//     $name =$request->input('name');
//     $email =$request->input('email');
//     $subject =$request->input('subject');
//     $message =$request->input('message');
//     return "Name:$name <br> Email:$email <br> Subject:$subject <br> Message:$message";
// })->name('contact-data');
// //method3
// Route::post('contact-data', function(Request $request) {
//     $name =$request->name;
//     $email =$request->email;
//     $subject =$request->subject;
//     $message =$request->message;
//     return "Name:$name <br> Email:$email <br> Subject:$subject <br> Message:$message";
// })->name('contact-data');
