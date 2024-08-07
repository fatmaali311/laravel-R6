<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use Illuminate\Http\Request;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ProductController;

// Route::get('login', [ExampleController::class, 'login']);
// Route::get('cv', [ExampleController::class, 'cv']);
// Route::get('contact', [ExampleController::class, 'contact']);
Route::group([
    'prefix'=>'cars',
    'controller'=> CarController::class,
    'as'=> 'cars.'
],function(){
    Route::get('create',  'create')->name('create');
    Route::post('',  'store')->name('store');
    Route::get('',  'index')->name('index');
    Route::get('{id}/edit',  'edit')->name('edit');
    Route::put('{id}',  'update')->name('update');
    Route::get('details{id}',  'show')->name('details');
    Route::get('{id}/delete',  'destroy')->name('destroy');
    Route::get('trashed',  'showDeleted')->name('showDeleted');
    Route::patch('{id}',  'restore')->name('restore');
    Route::delete('{id}/delete',  'forceDelete')->name('forceDelete');
});


// Route::get('cars/create', [CarController::class, 'create'])->name('cars.create');
// Route::post('cars', [CarController::class, 'store'])->name('cars.store');
// Route::get('cars', [CarController::class, 'index'])->name('cars.index');
// Route::get('cars/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
// Route::put('cars/{id}', [CarController::class, 'update'])->name('cars.update');
// Route::get('car/details{id}', [CarController::class, 'show'])->name('cars.details');
// Route::get('cars/{id}/delete', [CarController::class, 'destroy'])->name('cars.destroy');
// Route::get('cars/trashed', [CarController::class, 'showDeleted'])->name('cars.showDeleted');
// Route::patch('cars/{id}', [CarController::class, 'restore'])->name('cars.restore');
// Route::delete('cars/{id}/delete', [CarController::class, 'forceDelete'])->name('cars.forceDelete');
Route::get('classes/create', [ClassController::class, 'create'])->name('classes.create');
Route::post('classes', [ClassController::class, 'store'])->name('classes.store');
Route::get('classes', [ClassController::class, 'index'])->name('class.index');
Route::get('classes/{id}/edit', [ClassController::class, 'edit'])->name('class.edit');
Route::put('classes/{id}', [ClassController::class, 'update'])->name('class.update');
Route::get('classes/details{id}', [ClassController::class, 'show'])->name('class.details');
Route::delete('classes/{id}/delete', [ClassController::class, 'destroy'])->name('class.destroy');
Route::get('classes/trashed', [ClassController::class, 'showDeleted'])->name('class.showDeleted');
Route::patch('classes/{id}', [ClassController::class, 'restore'])->name('class.restore');
Route::delete('classes/{id}', [ClassController::class, 'forceDelete'])->name('class.forceDelete');

Route::get('', function () {
    return view('welcome');
});


Route::get('index',[ProductController::class,'index'])->name('product.index');
Route::get('product/create',[ProductController::class,'addProduct'])->name('product.create');
Route::post('product',[ProductController::class,'store'])->name('product.store');

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

Route::get('uploadfile',[ExampleController::class,'uploadForm']);
Route::post('upload',[ExampleController::class,'upload'])->name('upload');
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
