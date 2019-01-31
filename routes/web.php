
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

// Route::get('/', function () {
//     // return view('welcome');
//     return View::make('simple');
// });

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

Route::get('custom/response', function () {
   	$response = Response::make('Hello world!', 200);
   	$response->headers->set('our key', 'our value');
	return $response;
});

//JSON response
Route::get('markdown/response', function(){
	$data = ['a', 'b', 'c'];
	return Response::json($data);
});

//Download response
Route::get('file/download', function(){
	$filename = 'abc.pdf';
	return Response::download($filename);
});

Route::get('/request_data', function(){
	$data = Request::all();
	var_dump($data);
});

Route::get('/', function(){
	// $data = Request::all();
	$data = Request::get('foo', 'bar'); //neu tren url gui len co foo thi se in ra gia tri cua foo neu khong thi in ra gia tri mac dinh cua foo da dc gan la bar
	$data2 = Request::has('foo'); //kiem tra request gui len co foo ko va tra ve gia tri boolean la true or false

	var_dump($data2);
});

Route::get('post-form', function(){
	return View::make('form');
});

//Cookie
Route::get('/cookie-babie', function(){
	$cookie = Cookie::make('low-carb', 'almond cookie', 30);
	return Response::make('Nom nom.')->withCookie($cookie);
});

Route::get('/nom-nom', function(){
	$cookie = Cookie::get('low-carb');
	var_dump($cookie);
});


//get current url
Route::get('/current/url', function(){
	return URL::current();
});

 //validation
Route::post('/register', function($request req){
	$formData = $request->all();

	$rules = [
		'username' => ['alpha_num', 'min:3']
	];

	//you can custom validation messenges
	//build the custom mesages array
	$messages = [
		'min' => "This feild aint long enough"
	];

	//create a new validation instance
	$validator = Validator::make($formData, $rules, $messages);

	//$validator tra ve gia tri boolean duoc xac dinh
	//passes() or fails()
	if ($validator->passes()){

	}

	//lay ra error
	$error = $validator->message();

	return redirect('/')->withErrors($validator);


	//some validate rules
	
	//accepted:
	//['feild'] => 'accepted' //dam bao rang 1 chap nhan tich cuc dc dc ok

	//active_url
	//['feild'] => 'active_url' //make sure is a valid url

	//after
	//['feild'] => 'after:04/24/16' make sure the date after 04/24/16
	//same same cai nay co before va between:5,7

	//alpha
	//['feild'] => 'alpha' //make sure that value is alphabeta character

	

});
















