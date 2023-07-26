<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\get_data;
use App\Http\Controllers\inserts_data;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route("Dashboard");
});

Route::get('/login', function () {
    if (Auth::check())
        return redirect()->route("Dashboard");
    else
        return view('login');
})->name("login");
Route::post('/do_login', [get_data::class, 'do_login']);

Route::middleware('auth')->group(function () {
    Route::get('/Dashboard', function () {
        return view('home');
    })->name("Dashboard");

    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route("Dashboard");
    });
    Route::post('/get_all_ticket', [get_data::class, 'get_all_ticket']);
    Route::post('/get_all_category', [get_data::class, 'get_all_category']);
    Route::post('/get_my_ticket', [get_data::class, 'get_my_ticket']);
    Route::post('/get_this_ticket', [get_data::class, 'get_this_ticket']);
    Route::post('/get_reply_this_ticket', [get_data::class, 'get_reply_this_ticket']);
    Route::post('/get_all_user', [get_data::class, 'get_all_user']);
    Route::post('/get_me', [get_data::class, 'get_me']);

    Route::post('/save_new_person', [inserts_data::class, 'save_new_person']);
    Route::post('/save_new_ticket', [inserts_data::class, 'save_new_ticket']);
    Route::post('/delete_el_category', [inserts_data::class, 'delete_el_category']);
    Route::post('/new_category', [inserts_data::class, 'new_category']);
    Route::post('/delete_row', [inserts_data::class, 'delete_row']);
    Route::post('/Do_Aassign', [inserts_data::class, 'Do_Aassign']);
    Route::post('/update_new_person', [inserts_data::class, 'update_new_person']);
    Route::post('/Do_save_reply', [inserts_data::class, 'Do_save_reply']);
    Route::post('/save_new_name', [inserts_data::class, 'save_new_name']);
    Route::post('/save_new_phone', [inserts_data::class, 'save_new_phone']);
    Route::post('/save_new_password', [inserts_data::class, 'save_new_password']);
});
