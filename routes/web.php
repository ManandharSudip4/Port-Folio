<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\PerInfoController;
use App\Http\Controllers\SmediaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\WorkingexpController;
use App\Http\Controllers\WorkcategoryController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MessageController;

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

Auth::routes([
    'register' => false
]);

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('perInfo', [PerInfoController::class, 'perInfo'])->name('perInfo');
Route::get('perInfo/{id}',[PerInfoController::class, 'updatePerInfo']);  //useless
Route::post('/backend/perInfo', [PerInfoController::class, 'updatePerInfo']);

Route::get('smedia', [SmediaController::class, 'smedia'])->name('smedia');
Route::post('/backend/Medias', [SmediaController::class, 'addUpdateMedia']);
Route::get('/backend/Medias/{id}',[SmediaController::class,'destroy']);

Route::get('contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/backend/Contacts',[ContactController::class, 'addUpdateContact']);
Route::get('/backend/Contacts/{id}',[ContactController::class,'destroy']);

Route::get('education',[EducationController::class, 'education']);
Route::post('/backend/Educations', [EducationController::class, 'addUpdateAcademics']);
Route::get('/backend/Educations/{id}',[EducationController::class,'destroy']);

Route::get('skill',[SkillController::class, 'skill']);
Route::post('/backend/Skills', [SkillController::class, 'addUpdateSkills']);
Route::get('/backend/Skills/{id}',[SkillController::class,'destroy']);

Route::get('workingexp',[WorkingexpController::class, 'workingexp']);
Route::post('/backend/WorkExp', [WorkingexpController::class, 'addUpdateExperience']);
Route::get('/backend/WorkExp/{id}',[WorkingexpController::class,'destroy']);


Route::get('workcategory', [WorkcategoryController::class, 'workCat'])->name('workCat');
Route::post('/backend/Workss', [WorkcategoryController::class, 'addUpdateWorkCat']);
Route::get('/backend/Workss/{id}',[WorkcategoryController::class,'destroy']);

Route::get('work', [WorkController::class, 'work'])->name('work');
Route::post('/backend/Works', [WorkController::class, 'addUpdateWork']);
Route::get('/backend/Works/{id}',[WorkController::class,'destroy']);

Route::get('blog', [BlogController::class, 'blog'])->name('blog');
Route::post('/backend/Blogs', [BlogController::class, 'addUpdateBlog']);
Route::get('/backend/Blogs/{id}',[BlogController::class,'destroy']);


Route::get('review',[ReviewController::class, 'review']);
Route::post('/backend/Reviews', [ReviewController::class, 'addUpdateReview']);
Route::get('/backend/Reviews/{id}',[ReviewController::class,'destroy']);

Route::get('message',[MessageController::class, 'message']);
Route::post('/backend/Messages', [MessageController::class, 'addUpdateMessage']);
Route::get('/backend/Message/{id}',[MessageController::class,'status']);
Route::get('/backend/Messages/{id}',[MessageController::class,'destroy']);

Route::get('tablesDynamic', [BackendController::class, 'tablesDynamic'])->name('tablesDynamic');



// View::composer(['education'], function($view){
//     $view->with('mess',message::all());
// });
