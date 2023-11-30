<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\BlogPost;
use App\Models\comments;
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


Route::get('/', function () {
    return view('home');});
	
		Route::get('/user/{user}', function () {
			$user = BlogPost::orderBy('updated_at', 'DESC')->paginate(8);
					return view('user', ['user' => $user]);
						})->middleware('auth');
						
			Route::get('/user', function () {
			$user = BlogPost::orderBy('updated_at', 'DESC')->paginate(8);
					return view('user', ['user' => $user]);
						})->middleware('auth');
	
	Route::get('/admin', function () {
    $admins = BlogPost::orderBy('updated_at', 'DESC')->paginate(8);
					return view('admin', ['admins' => $admins]);
						})->middleware('auth');
						
	Route::get('/blog/blog', function () {
		return view('blog/blog');
			})->name('blog.blog');
			
		Route::get('/blog/blog', function () {
		$posts = BlogPost::orderBy('updated_at', 'DESC')->paginate(8);
				
					return view('blog/blog', ['posts' => $posts]);
					})->name('posts');
Route::get('/blog/newuser', function () {
    return view('blog/newuser');
});

Route::get(
'/blog/blog/{post}',
[\App\Http\Controllers\BlogPostController::class, 'take']
)->name('blog.show');

Route::get(
'/blog/blog.create',
[\App\Http\Controllers\BlogPostController::class, 'create']
)->name('blog.create');

Route::get(
'/blog/create.store',
[\App\Http\Controllers\BlogPostController::class, 'store']
)->name('blog.create');

Route::get(
'/blog/blog.edit/{blogPost}',
[\App\Http\Controllers\BlogPostController::class, 'edit']
)->name('blog.edit');

Route::get(
'/blog/blog.show/{blogPost}',
[\App\Http\Controllers\BlogPostController::class, 'show']
)->name('blog.show');

Route::post(
'/blog/blog.edit/{blogPost}',
[\App\Http\Controllers\BlogPostController::class, 'update']
)->name('blog.update');

Route::get(
'/blog/blog.destroy/{blogPost}',
[\App\Http\Controllers\BlogPostController::class, 'destroy']
)->name('blog.destroy');

Route::get(
'/blog/show.destroy/{comment}',
[\App\Http\Controllers\CommentsController::class, 'destroy']
)->name('show.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post(
'/blog/comment.create',
[\App\Http\Controllers\CommentsController::class, 'create']
)->name('comment.create');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
