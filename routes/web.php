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

Route::group(['prefix'=>'admin'], function(){
	Route::get('logout', 'Admin\AdminLoginController@logout');
	//book route ------------------------------------------------------

	Route::get('/', function(){
		return redirect('admin/books');
	});

	Route::post('book-search', 'Admin\BookController@search');

	Route::get('book-search', 'Admin\BookController@getSearch');

	Route::get('warehouse', 'Admin\BookController@getIndex');

	Route::get('books/new', 'Admin\BookController@getAddBook');

	Route::post('books/new', 'Admin\BookController@postAddBook');

	Route::get('books/edit/{id}', 'Admin\BookController@getEditBook');

	Route::post('books/edit/{id}', 'Admin\BookController@postEditBook');

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

	Route::post('books/nph-search', 'Admin\NPHController@search');

	Route::get('books/nph-search', 'Admin\NPHController@getSearch');

	Route::get('books/nph/{id}', 'Admin\NPHController@getEdit');

	Route::post('books/nph/{id}', 'Admin\NPHController@postEdit');

	Route::get('books/nph/del/{id}', 'Admin\NPHController@delete');

	Route::get('books/nph', 'Admin\NPHController@getIndex');

	Route::post('books/nph', 'Admin\NPHController@postIndex');

	//nxb route ------------------------------------------------------

	Route::post('books/nxb-search', 'Admin\NXBController@search');

	Route::get('books/nxb-search', 'Admin\NXBController@getSearch');

	Route::get('books/nxb/{id}', 'Admin\NXBController@getEdit');

	Route::post('books/nxb/{id}', 'Admin\NXBController@postEdit');

	Route::get('books/nxb/del/{id}', 'Admin\NXBController@delete');

	Route::get('books/nxb', 'Admin\NXBController@getIndex');

	Route::post('books/nxb', 'Admin\NXBController@postIndex');


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
	
	//user route
	Route::get('users', 'Admin\UsersController@getUser');
	//order route
	Route::get('orders', 'Admin\OrderController@getOrder');

	Route::get('orders/{id}', 'Admin\OrderController@getOrderDetail');

	Route::get('orders/{id}/shipping', 'Admin\OrderController@postShipping');

	Route::get('orders/{id}/succeed', 'Admin\OrderController@postSucceed');

	//comment managemant route
	Route::get('comments', 'Admin\CommentController@getCommentList');
	Route::get('comments/accept/{id}', 'Admin\CommentController@acceptComment');
	Route::get('comments/delete/{id}', 'Admin\CommentController@deleteComment');

	//question route
	Route::get('questions', 'Admin\QuestionController@getQuestionList');
	Route::post('questions/{id}/answer', 'Admin\QuestionController@postAnswer');
	Route::get('questions/{id}/delete', 'Admin\QuestionController@deleteQuestion');

	//banner route
	Route::get('advertiserment', 'Admin\AdvController@getIndex');
	Route::get('advertiserment/create', 'Admin\AdvController@getCreate');
	Route::post('advertiserment/ajax-search', 'Admin\AdvController@ajaxSearch');
	Route::post('advertiserment/create', 'Admin\AdvController@postAdvertiserment');
	Route::get('advertiserment/edit/{id}', 'Admin\AdvController@getEdit');
	Route::post('advertiserment/edit/{id}', 'Admin\AdvController@postEdit');
	Route::get('advertiserment/delete/{id}', 'Admin\AdvController@getdelete');

	//dashboard route
	Route::get('dashboard', 'Admin\DashboardController@getIndex');

	//supplier route
	Route::get('supplier', 'Admin\SupplierController@index');
	Route::get('supplier/{id}', 'Admin\SupplierController@edit');

	//goods receipt order
	Route::get('goods-receipt-order', 'Admin\GoodsReceiptOrderController@index');
	Route::get('goods-receipt-order/create', 'Admin\GoodsReceiptOrderController@create');
	Route::post('goods-receipt-order/create/map-table', 'Admin\GoodsReceiptOrderController@mapTable');
	Route::post('goods-receipt-order/create/add-list', 'Admin\GoodsReceiptOrderController@addList');
});
