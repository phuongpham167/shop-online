<?php

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
    // return view('welcome');
    return View::make('simple');
});

Route::get('my/page', function () { 
   // return 'Hello world!';
   return Redirect::to('my/test');
});

// Route::get();
// Route::post();
// Route::put();
// Route::patch();
// Route::delete();
// Route::any();

$logic = function() {
	return Response::make('Hello world!', 200);
};
Route::get('my/test', $logic);

//routes parameter
Route::get('/books/{genre?}', function($genre = null){
	if ($genre == null) {
		return 'Genre = null';
	}
	else{
		return 'Genre is {$genre}';
	}
});

Route::get('/test2/{test}', function($test){
	$data['test'] = $test;

	return View::make('simple', $data);
});
