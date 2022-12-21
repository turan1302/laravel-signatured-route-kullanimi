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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',function (){
//   echo \Illuminate\Support\Facades\URL::signedRoute("gift");
    echo \Illuminate\Support\Facades\URL::temporarySignedRoute("gift",now()->addHours(1),["id" => 3]);
});

Route::get('gift',function (\Illuminate\Http\Request $request){
    if (!$request->hasValidSignature()){
        echo "Yasaklı Erişim";
        die;
    }
    echo "Yönlendi <br>";
    echo "Kullanıcı ID: ".$request->id;
})->name('gift');
