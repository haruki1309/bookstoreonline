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

	Route::get('books', 'Admin\BookController@getIndex');

	Route::get('books/new', 'Admin\BookController@getAddBook');

	Route::post('books/new', 'Admin\BookController@postAddBook');

	Route::get('books/edit/{id}', 'Admin\BookController@getEditBook');

	Route::post('books/edit/{id}', 'Admin\BookController@postEditBook');

	//author route ------------------------------------------------------

	Route::post('books/author-search', 'Admin\AuthorController@search');

	Route::get('books/author-search', 'Admin\AuthorController@getSearch');

	Route::get('books/author/{id}', 'Admin\AuthorController@getEdit');

	Route::post('books/author/{id}', 'Admin\AuthorController@postEdit');

	Route::get('books/author/del/{id}', 'Admin\AuthorController@delete');

	Route::get('books/author', 'Admin\AuthorController@getIndex');

	Route::post('books/author', 'Admin\AuthorController@postIndex');

	//translator route ------------------------------------------------------

	Route::post('books/translator-search', 'Admin\TranslatorController@search');

	Route::get('books/translator-search', 'Admin\TranslatorController@getSearch');

	Route::get('books/translator/{id}', 'Admin\TranslatorController@getEdit');

	Route::post('books/translator/{id}', 'Admin\TranslatorController@postEdit');

	Route::get('books/translator/del/{id}', 'Admin\TranslatorController@delete');

	Route::get('books/translator', 'Admin\TranslatorController@getIndex');

	Route::post('books/translator', 'Admin\TranslatorController@postIndex');

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

	Route::post('books/language-search', 'Admin\LanguageController@search');

	Route::get('books/language-search', 'Admin\LanguageController@getSearch');

	Route::get('books/language/{id}', 'Admin\LanguageController@getEdit');

	Route::post('books/language/{id}', 'Admin\LanguageController@postEdit');

	Route::get('books/language/del/{id}', 'Admin\LanguageController@delete');

	Route::get('books/language', 'Admin\LanguageController@getIndex');

	Route::post('books/language', 'Admin\LanguageController@postIndex');

	//age route ------------------------------------------------------

	Route::post('books/age-search', 'Admin\AgeController@search');

	Route::get('books/age-search', 'Admin\AgeController@getSearch');

	Route::get('books/age/{id}', 'Admin\AgeController@getEdit');

	Route::post('books/age/{id}', 'Admin\AgeController@postEdit');

	Route::get('books/age/del/{id}', 'Admin\AgeController@delete');

	Route::get('books/age', 'Admin\AgeController@getIndex');

	Route::post('books/age', 'Admin\AgeController@postIndex');

	//topic route ------------------------------------------------------

	Route::post('books/topic-search', 'Admin\TopicController@search');

	Route::get('books/topic-search', 'Admin\TopicController@getSearch');

	Route::get('books/topic/{id}', 'Admin\TopicController@getEdit');

	Route::post('books/topic/{id}', 'Admin\TopicController@postEdit');

	Route::get('books/topic/del/{id}', 'Admin\TopicController@delete');

	Route::get('books/topic', 'Admin\TopicController@getIndex');

	Route::post('books/topic', 'Admin\TopicController@postIndex');

	//category route ------------------------------------------------------

	Route::post('books/category-search', 'Admin\CategoryController@search');

	Route::get('books/category-search', 'Admin\CategoryController@getSearch');

	Route::get('books/category/{id}', 'Admin\CategoryController@getEdit');

	Route::post('books/category/{id}', 'Admin\CategoryController@postEdit');

	Route::get('books/category/del/{id}', 'Admin\CategoryController@delete');

	Route::get('books/category', 'Admin\CategoryController@getIndex');

	Route::post('books/category', 'Admin\CategoryController@postIndex');

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
});