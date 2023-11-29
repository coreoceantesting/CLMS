<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\MastesController;
use App\Http\Controllers\PatientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('Auth.Login');
// });

Route::get('/', [LoginRegisterController::class, 'index'])->name('login');
Route::post('/post-login', [LoginRegisterController::class, 'postLogin'])->name('login.post'); 
Route::get('/registration', [LoginRegisterController::class, 'registration'])->name('register');
Route::get('/dashboard', [LoginRegisterController::class, 'dashboard'])->name('dashboard'); 
Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

// Masters Routes

// User Registration
Route::get('/users-list', [LoginRegisterController::class, 'user_registration'])->name('user_list');
Route::get('/create_user',[LoginRegisterController::class, 'create_user'])->name('create_user');
Route::post('/create-user', [LoginRegisterController::class, 'postRegistration'])->name('register.post'); 
Route::get('/edit-user/{id}/edit', [LoginRegisterController::class, 'edit_user'])->name('edit_user');
Route::patch('/update-user/{id}', [LoginRegisterController::class, 'update_user'])->name('update_user');
Route::put('/delete_user/{id}', [LoginRegisterController::class, 'softDeleteUser'])->name('delete_user');

// test category
Route::get('/test-category-list', [MastesController::class, 'test_category_list'])->name('test_category_list');
Route::get('/create-test-category',[MastesController::class, 'create_test_category'])->name('create_test_category');
Route::post('/store-test-category', [MastesController::class, 'store_test_category'])->name('store_test_category'); 
Route::get('/edit-test-category/{id}/edit', [MastesController::class, 'edit_test_category'])->name('edit_test_category');
Route::patch('/update-test-category/{id}', [MastesController::class, 'update_test_category'])->name('update_test_category');
Route::put('/delete-test-category/{id}', [MastesController::class, 'delete_test_category'])->name('delete_test_category');

// lab Master
Route::get('/lab-list', [MastesController::class, 'lab_list'])->name('lab_list');
Route::get('/create-lab',[MastesController::class, 'create_lab'])->name('create_lab');
Route::post('/store-lab', [MastesController::class, 'store_lab'])->name('store_lab'); 
Route::get('/edit-lab/{id}/edit', [MastesController::class, 'edit_lab'])->name('edit_lab');
Route::patch('/update-lab/{id}', [MastesController::class, 'update_lab'])->name('update_lab');
Route::put('/delete-lab/{id}', [MastesController::class, 'delete_lab'])->name('delete_lab');

// patient Registration
Route::get('/register-patient', [PatientController::class, 'register_patient'])->name('register_patient');
Route::post('/store-patient', [PatientController::class, 'store_patient'])->name('store_patient');
// pending samples
Route::get('/patient-pending-list', [PatientController::class, 'patient_pending_list'])->name('patient_pending_list');
Route::get('/edit-report/{id}/edit', [PatientController::class, 'edit_report'])->name('edit_report');
Route::post('/store-results/{id}', [PatientController::class, 'storeResults'])->name('store_results');
// completed samples
Route::get('/patient-completed-list', [PatientController::class, 'patient_completed_list'])->name('patient_completed_list');
