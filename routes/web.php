<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;

Route::get('/',[PagesController::class, "index"])->name('home');
Route::get('/admin/dashboard',[MainController::class, "dashboard"])->name('admin.dashboard');

Route::get('/admin/main',[MainController::class, "index"])->name('admin.main');
Route::put('/admin/main/{id}',[MainController::class, "update"])->name('admin.update');

Route::get('/admin/services',[ServiceController::class, "index"])->name('admin.services');
Route::get('/admin/services/create',[ServiceController::class, "manage"])->name('admin.services.create');
Route::post('/admin/services/manage_proccess',[ServiceController::class, "manage_proccess"])->name('admin.services.manage_proccess');
Route::get('/admin/services/edit/{id}',[ServiceController::class, "manage"])->name('admin.services.edit');
Route::get('/admin/services/delete/{id}',[ServiceController::class, "delete"])->name('admin.services.delete');

Route::get('/admin/portfolio',[PortfolioController::class, "index"])->name('admin.portfolio');
Route::get('/admin/portfolio/create',[PortfolioController::class, "manage"])->name('admin.portfolio.create');
Route::post('/admin/portfolio/manage_proccess',[PortfolioController::class, "manage_proccess"])->name('admin.portfolio.manage_proccess');
Route::get('/admin/portfolio/edit/{id}',[PortfolioController::class, "manage"])->name('admin.portfolio.edit');
Route::get('/admin/portfolio/delete/{id}',[PortfolioController::class, "delete"])->name('admin.portfolio.delete');

Route::get('/admin/about',[AboutController::class, "index"])->name('admin.about');
Route::get('/admin/about/create',[AboutController::class, "manage"])->name('admin.about.create');
Route::post('/admin/about/manage_proccess',[AboutController::class, "manage_proccess"])->name('admin.about.manage_proccess');
Route::get('/admin/about/edit/{id}',[AboutController::class, "manage"])->name('admin.about.edit');
Route::get('/admin/about/delete/{id}',[AboutController::class, "delete"])->name('admin.about.delete');

Route::get('/admin/team',[TeamController::class, "index"])->name('admin.team');
Route::get('/admin/team/create',[TeamController::class, "manage"])->name('admin.team.create');
Route::post('/admin/team/manage_proccess',[TeamController::class, "manage_proccess"])->name('admin.team.manage_proccess');
Route::get('/admin/team/edit/{id}',[TeamController::class, "manage"])->name('admin.team.edit');
Route::get('/admin/team/delete/{id}',[TeamController::class, "delete"])->name('admin.team.delete');

Route::get('/admin/contact',[ContactController::class, "index"])->name('admin.contact');
Route::post('/contact/send_message',[ContactController::class, "store_message"])->name('contact.send_message');
Route::get('/admin/contact/delete/{id}',[ContactController::class, "delete"])->name('admin.contact.delete');

Auth::routes();
