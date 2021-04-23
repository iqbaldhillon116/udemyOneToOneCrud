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

use App\User;
use App\Address;

Route::get('/insert',function(){

    $user = User::findOrfail(1);

    $address = new Address(['name'=>'50 jaswant nagar jalandhar']);

    $user->address()->save($address);

});

Route::get('/update',function(){

    $address = Address::whereUserId(1)->first();

    // $address = Address::where('user_id',1)->get();

    //    $address = Address::where('user_id','=','1')->get();

       $address->name = '123 jaswant nagar';

       $address->save();

});

Route::get('/read',function(){

  $user = User::findOrfail(1);

  echo $user->address->name;
});

Route::get('/delete',function(){

    $user = User::findOrfail(1);
  
     $user->address->delete();

     return "done";
  });