<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
	if (session()->has('user_email')) {
			 return redirect()->route('dashboard');
		}else{
			 return view('login');
		}
})->name('login_default');




Route::post('/save_wine','DashboardController@save_wine')->name('save_wine');
Route::post('/edit_wine','DashboardController@edit_wine')->name('edit_wine');
Route::get('/delete_wine/{id}','DashboardController@delete_wine')->name('delete_wine');
Route::get('/delete_wine_list/{id}','DashboardController@delete_wine_list')->name('delete_wine_list');

Route::get('/delete_wine_from_list/{id}','DashboardController@delete_wine_from_list')->name('delete_wine_from_list');

Route::get('/wine_lists','DashboardController@wine_lists')->name('wine_lists');
Route::post('/save_wine_list','DashboardController@save_wine_list')->name('save_wine_list');
Route::get('/wines/{id}','DashboardController@wines')->name('wines');
Route::get('/export/{id}','DashboardController@export')->name('export');
Route::get('/create-zip', 'DashboardController@index')->name('create-zip');
Route::get('/wines', function () {
	if (session()->has('user_email')) {
			 return redirect()->route('dashboard');
		}else{
			 return view('login');
		}
});
Route::get('sortable','DashboardController@sortable')->name('sortable');
Route::post('/make_list','DashboardController@make_list')->name('make_list');







Route::post('/lock','UserController@check_login')->name('check_login');
Route::get('/lock', function () {
    return view('lock');
});
Route::get('/logout','UserController@logout')->name('logout');
Route::get('/dashboard','DashboardController@dashboard')->name('dashboard');
Route::get('/profile','DashboardController@profile')->name('profile');
Route::post('/save_profile','DashboardController@save_profile')->name('save_profile');





















// Slider
Route::get('admin/slider','DashboardController@sliders')->name('sliders');
Route::post('admin/slider','DashboardController@save_slider')->name('save_slider');
Route::get('admin/delete_slider/{id}','DashboardController@delete_slider')->name('delete_slider');

// bookings
Route::get('admin/booking','DashboardController@bookings')->name('show_bookings');
Route::post('admin/booking','DashboardController@save_booking')->name('save_booking');
Route::get('admin/delete_booking/{id}','DashboardController@delete_booking')->name('delete_booking');


// Offer
Route::get('admin/offer','DashboardController@offers')->name('offers');
Route::post('admin/offer','DashboardController@save_offer')->name('save_offer');


// service
Route::get('admin/service','DashboardController@services')->name('services');
Route::post('admin/service','DashboardController@save_service')->name('save_service');
Route::get('admin/delete_service/{id}','DashboardController@delete_service')->name('delete_service');


// member
Route::get('admin/member','DashboardController@members')->name('members');
Route::post('admin/member','DashboardController@save_member')->name('save_member');
Route::get('admin/delete_member/{id}','DashboardController@delete_member')->name('delete_member');

// Alert
Route::get('admin/alert','DashboardController@alerts')->name('alerts');
Route::post('admin/alert','DashboardController@save_alert')->name('save_alert');

// testimonial
Route::get('admin/testimonial','DashboardController@testimonials')->name('testimonials');
Route::post('admin/testimonial','DashboardController@save_testimonial')->name('save_testimonial');
Route::get('admin/delete_testimonial/{id}','DashboardController@delete_testimonial')->name('delete_testimonial');


// category
Route::get('admin/category','DashboardController@categorys')->name('categorys');
Route::post('admin/category','DashboardController@save_category')->name('save_category');
Route::get('admin/delete_category/{id}','DashboardController@delete_category')->name('delete_category');

// post
Route::get('admin/post','DashboardController@posts')->name('posts');
Route::post('admin/post','DashboardController@save_post')->name('save_post');
Route::get('admin/delete_post/{id}','DashboardController@delete_post')->name('delete_post');





// front page
Route::get('/service/{slug?}','FrontController@service')->name('service_details');

Route::get('/services','FrontController@services')->name('services_front');


// front page
Route::get('/member/{slug?}','FrontController@member')->name('member_details');


// front page
Route::get('/post/{slug?}','FrontController@post');

// front page
Route::get('/blogs','FrontController@news')->name('news');

// front page
Route::get('/about-us','FrontController@aboutus')->name('aboutus');

Route::get('/contact-us','FrontController@contactus')->name('contactus');
Route::post('/contactsend','FrontController@contactsend')->name('contactsend');

Route::get('/products','FrontController@products')->name('products');

Route::get('/booking','FrontController@booking')->name('booking');
Route::get('/book','FrontController@booking');

Route::get('book/{date}','FrontController@book')->name('book');
Route::post('book_save/{date}','FrontController@book_save')->name('book_save');

Route::post('/review','FrontController@review')->name('review');
