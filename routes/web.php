<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SocialiteController;
use App\Models\Article;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\Google;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

Route::get('/', [PageController::class, 'home'])->name('home');

// Article
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/create', [ArticleController::class, 'create'])->middleware('auth')->name('article.create');
Route::get('/article/{article}/show', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->middleware('auth')->name('article.edit');
Route::DELETE('/article/{article}/delete', [ArticleController::class, 'destroy'])->middleware('auth')->name('article.destroy');
Route::patch('/sell/article/{article}', [ArticleController::class, 'sellArticle'])->middleware('auth')->name('article.sell');

// Search
Route::post('/article/search', [PageController::class, 'search'])->name('article.search');
Route::get('/ricerca/annuncio' , [PageController::class, 'searchArticle'])->name('search.article');

//User
Route::get('/article/my', [UserController::class, 'my_index'])->middleware('auth')->name('user.index');
Route::get('/user/{user}', [UserController::class, 'show'])->middleware('auth')->name('user.show');
Route::get('/profile/edit/{user}', [UserController::class, 'edit'])->middleware('auth')->name('user.edit');
Route::post('/profile/{user}', [UserController::class, 'update'])->middleware('auth')->name('profile.update');


// Category
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->middleware('isRevisor')->name('category.create');
Route::POST('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{category}/show', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->middleware('isRevisor')->name('category.edit');
Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

// Zona revisor
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::get('/revisor/remake', [RevisorController::class, 'remake'])->middleware('isRevisor')->name('revisor.remake');
Route::get('/revisor/list', [RevisorController::class, 'list'])->middleware('isRevisor')->name('revisor.list');
Route::get('/revisor/review/{article}', [RevisorController::class, 'review'])->middleware('isRevisor')->name('revisor.review');
Route::patch('/accetta/article/{article}', [RevisorController::class, 'acceptArticle'])->middleware('isRevisor')->name('revisor.accept_article');
Route::patch('/rifiuta/article/{article}', [RevisorController::class, 'rejectArticle'])->middleware('isRevisor')->name('revisor.reject_article');
Route::patch('/sospendi/article/{article}', [RevisorController::class, 'nullArticle'])->middleware('isRevisor')->name('revisor.null_article');


// Richiesta revisor
Route::get('/revisor/form', [RevisorController::class, 'formRevisor'])->middleware('auth')->name('revisor.form');
Route::POST('/richiesta/revisore',[RevisorController::class,'becomeRevisor'])->middleware('auth')->name('revisor.become');
Route::get('/rendi/revisore/{user}',[RevisorController::class, 'makeRevisor'])->name('revisor.make');

// Socialite
Route::get('/auth/google', [SocialiteController::class, 'loginGoogle'])->name('google.login');
Route::get('/auth/google/callback', [SocialiteController::class, 'callbackGoogle']);
Route::get('/auth/redirect', [SocialiteController::class, 'login'])->name('socialite.login');
Route::get('/auth/callback', [SocialiteController::class, 'callback']);

// Languages
Route::POST('/lingua/{lang}', [PageController::class, 'setLanguage'])->name('set_language_locale');

//Contattami
Route::POST('/richiesta/contatto/{article}/{user}',[ArticleController::class,'articleContact'])->middleware('auth')->name('article.contact');