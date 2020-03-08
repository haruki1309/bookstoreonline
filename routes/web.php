<?php
use Illuminate\Http\Request;
use App\Book;
use App\User;
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

Route::get('/', function(){
	return redirect('homepage');
});

//page route
Route::get('/homepage', 'Client\PageController@homepage');
Route::get('/shop', 'Client\PageController@shop');
Route::get('/checkout', 'Client\PageController@checkout')->middleware('userLogin');
Route::get('/books/{id}', 'Client\PageController@detail');
Route::get('/signin', 'Client\SigninController@getSigninPage');
Route::post('/signin', 'Client\SigninController@postSignin');
Route::post('/signin/check-email', 'Client\SigninController@checkEmailExisted');
Route::post('/login', 'Client\LoginController@login');
Route::get('/logout', 'Client\LoginController@logout');
Route::post('search', 'Client\SearchController@postSearch');


Route::get('/show-book-in-modal/{id}', 'Client\CartController@showBookInModal');
Route::post('add-to-cart', 'Client\CartController@addtocart');
//comment
Route::post('books/{id}/sendcomment', 'Client\BookController@postComment');
Route::post('books/{id}/sendquestion', 'Client\BookController@postQuestion');

Route::group(['prefix'=>'checkout', 'middleware'=>'userLogin'], function(){
	//cart route
	Route::post('/cart/update', 'Client\CartController@update');
	Route::post('/cart/delete', 'Client\CartController@delete');
	Route::get('/cart', 'Client\CartController@getCartView');
	//checkout
	Route::get('/information', 'Client\CheckoutController@information');
	Route::post('/information', 'Client\CheckoutController@storeOrder');
});

Route::group(['prefix'=>'account', 'middleware'=>'userLogin'], function(){
	//account
	Route::get('/order', 'Client\UserBoardController@getOrder');
	Route::get('/order/{id}/delete', 'Client\UserBoardController@deleteOrder');
	Route::get('/information', 'Client\UserBoardController@getAccountEdit');
	Route::post('/information/update', 'Client\UserBoardController@postAccountEdit');
	Route::get('/purcharsed-books', 'Client\UserBoardController@getPurcharsedBook');
});


Route::get('admin/login', 'Admin\AdminLoginController@getIndex');
Route::post('admin/login', 'Admin\AdminLoginController@postIndex');

Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'], function(){
	Route::get('/', function(){
		return redirect('admin\warehouse');
	});

	Route::get('logout', 'Admin\AdminLoginController@logout');

	//book route ------------------------------------------------------
	Route::get('warehouse', 'Admin\BookController@getIndex');
	Route::get('books/new', 'Admin\BookController@getAddBook');
	Route::post('books/new', 'Admin\BookController@postAddBook');
	Route::get('books/{id}/edit', 'Admin\BookController@getEditBook');
	Route::post('books/{id}/edit', 'Admin\BookController@postEditBook');

	//author route ------------------------------------------------------
	Route::get('author', 'Admin\AuthorController@index');
	Route::post('author/store', 'Admin\AuthorController@store');
	Route::get('author/{id}/edit', 'Admin\AuthorController@edit');
	Route::get('author/{id}/delete', 'Admin\AuthorController@delete');

	//translator route ------------------------------------------------------
	Route::get('translator', 'Admin\TranslatorController@index');
	Route::post('translator/store', 'Admin\TranslatorController@store');
	Route::get('translator/{id}/edit', 'Admin\TranslatorController@edit');
	Route::get('translator/{id}/delete', 'Admin\TranslatorController@delete');

	//nph route ------------------------------------------------------
	Route::get('publishing-company', 'Admin\NPHController@index');
	Route::post('publishing-company/store', 'Admin\NPHController@store');
	Route::get('publishing-company/{id}/edit', 'Admin\NPHController@edit');
	Route::get('publishing-company/{id}/delete', 'Admin\NPHController@delete');

	//nxb route ------------------------------------------------------
	Route::get('publisher', 'Admin\NXBController@index');
	Route::post('publisher/store', 'Admin\NXBController@store');
	Route::get('publisher/{id}/edit', 'Admin\NXBController@edit');
	Route::get('publisher/{id}/delete', 'Admin\NXBController@delete');

	//language route ------------------------------------------------------
	Route::get('language', 'Admin\LanguageController@index');
	Route::post('language/store', 'Admin\LanguageController@store');
	Route::get('language/{id}/edit', 'Admin\LanguageController@edit');
	Route::get('language/{id}/delete', 'Admin\LanguageController@delete');

	//age route ------------------------------------------------------
	Route::get('age', 'Admin\AgeController@index');
	Route::post('age/store', 'Admin\AgeController@store');
	Route::get('age/{id}/edit', 'Admin\AgeController@edit');
	Route::get('age/{id}/delete', 'Admin\AgeController@delete');

	//topic route ------------------------------------------------------
	Route::get('topic', 'Admin\TopicController@index');
	Route::post('topic/store', 'Admin\TopicController@store');
	Route::get('topic/{id}/edit', 'Admin\TopicController@edit');
	Route::get('topic/{id}/delete', 'Admin\TopicController@delete');

	//category route ------------------------------------------------------
	Route::get('category', 'Admin\CategoryController@index');
	Route::post('category/store', 'Admin\CategoryController@store');
	Route::get('category/{id}/edit', 'Admin\CategoryController@edit');
	Route::get('category/{id}/delete', 'Admin\CategoryController@delete');
	
	Route::get('users', 'Admin\UsersController@getUser');
	Route::get('orders', 'Admin\OrderController@index');
	Route::post('orders/edit','Admin\OrderController@edit');


	//comment managemant route
	Route::get('comments', 'Admin\CommentController@index');
	Route::post('comments/edit', 'Admin\CommentController@edit');
	Route::get('comments/delete/{id}', 'Admin\CommentController@delete');


	//question route
	Route::get('questions', 'Admin\QuestionController@index');
	Route::post('questions/edit', 'Admin\QuestionController@edit');
	Route::get('questions/delete/{id}', 'Admin\QuestionController@deleteQuestion');

	//banner route
	Route::get('advertiserment', 'Admin\AdvController@index');
	Route::get('advertiserment/create', 'Admin\AdvController@getCreate');
	Route::post('advertiserment/ajax-search', 'Admin\AdvController@ajaxSearch');
	Route::post('advertiserment/create', 'Admin\AdvController@postAdvertiserment');
	Route::get('advertiserment/edit/{id}', 'Admin\AdvController@getEdit');
	Route::post('advertiserment/edit/', 'Admin\AdvController@edit');
	Route::get('advertiserment/delete/{id}', 'Admin\AdvController@getdelete');

	//dashboard route
	Route::get('dashboard', 'Admin\DashboardController@getIndex');

	//supplier route
	Route::get('supplier', 'Admin\SupplierController@index');
	Route::get('supplier/create', 'Admin\SupplierController@createView');
	Route::post('supplier/mapping-data', 'Admin\SupplierController@getBookAndMapTable');
	Route::post('supplier/create', 'Admin\SupplierController@create');
	Route::get('supplier/{id}', 'Admin\SupplierController@edit');

	//goods receipt order
	Route::get('goods-receipt-order', 'Admin\GoodsReceiptOrderController@index');
	Route::get('goods-receipt-order/create', 'Admin\GoodsReceiptOrderController@create_view');
	Route::post('goods-receipt-order/create-recept', 'Admin\GoodsReceiptOrderController@create');
	Route::post('goods-receipt-order/create/map-table', 'Admin\GoodsReceiptOrderController@mapTable');
	Route::post('goods-receipt-order/create/add-list', 'Admin\GoodsReceiptOrderController@addList');
	Route::post('goods-receipt-order/view', 'Admin\GoodsReceiptOrderController@viewReceipt');

	//admin router
	Route::get('admin','Admin\AdminController@index');
	Route::get('admin/create','Admin\AdminController@getCreate');
	Route::get('admin/edit/{id}','Admin\AdminController@getEdit');
	Route::get('admin/delete/{id}','Admin\AdminController@getDelete');
	Route::post('admin/create','Admin\AdminController@postCreate');
	Route::post('admin/edit','Admin\AdminController@postEdit');
	Route::post('admin/delete/{id}','Admin\AdminController@postDelete');

	//route router
	Route::get('role','Admin\RoleController@index');
	Route::get('role/create','Admin\RoleController@getCreate');
	Route::get('role/edit/{id}','Admin\RoleController@getEdit');
	Route::get('role/delete/{id}','Admin\RoleController@getDelete');
	Route::post('role/create','Admin\RoleController@postCreate');
	Route::post('role/edit/{id}','Admin\RoleController@postEdit');
	Route::post('role/delete/{id}','Admin\RoleController@postDelete');

	Route::post('admin');
});

Route::get('/cart-test', function(){
	// Cart::destroy();
	//Cart::restore('1');
	//dd(User::get());
	//$book = Cart::content()->where('id', 7)->first();
	dd(Cart::content());
	//Cart::store(1);
});


Route::get('{object}/{id}', 'Client\SearchController@searchByObject');
