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
Route::get('/', 'HomeController@index');

Route::post('category-add', 'CategoryController@store');
Route::post('todo-add', 'ToDoListController@store');
Route::post('todo-add', 'ToDoListController@store');

Route::delete('delete-list/{id}', 'ToDoListController@destroy');
Route::delete('delete-category/{id}', 'CategoryController@destroy');

Route::put('update-status/{id}', 'ToDoListController@update');