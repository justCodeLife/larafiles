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

Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::group(['namespace' => 'Frontend'], function () {

    //users auth
    Route::get('/login', 'UsersController@login')->name('frontend.users.login');
    Route::post('/login', 'UsersController@dologin')->name('post.login');
    Route::get('/register', 'UsersController@register')->name('frontend.users.register');
    Route::post('/register', 'UsersController@doRegister')->name('post.register');

    //user dashboard
    Route::get('/dashboard', 'UsersController@dashboard')->name('frontend.users.dashboard');
    Route::get('/logout', 'UsersController@logout')->name('frontend.users.logout');


    Route::get('/plans', 'PlansController@index')->name('frontend.plans.index');
    Route::get('/subscribe/{plan_id}', 'SubscribeController@index')->name('frontend.subscribe.index');
    Route::post('/subscribe/{plan_id}', 'SubscribeController@register')->name('frontend.subscribe.register');

//    files
    Route::get('/file/{file_id}', 'FilesController@details')->name('frontend.files.details');
    Route::get('/file/download/{file_id}', 'FilesController@download')->name('frontend.files.download');
    Route::post('/file/report', 'FilesController@report')->name('frontend.files.report');
    Route::get('/access', 'FilesController@access')->name('frontend.files.access');
});


// Route::get('/admin', function () {
//     $user = ['name' => 'ali', 'last' => 'mohammadi'];
//     // return view('admin.dashboard.index',compact('user'));
//     // return view('admin.dashboard.index')->with('kaarbar',$user);
//     return view('admin.dashboard.index')->with([
//         'user' => $user,
//         'name' => 'masoud'
//     ]);
// });


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

    //user routes

    Route::get('/users', 'UsersController@index')->name('admin.users.list');
    Route::get('/users/create', 'UsersController@create')->name('admin.users.create');
    Route::post('/users/create', 'UsersController@store')->name('admin.users.store');
    Route::get('/users/delete/{user_id}', 'UsersController@delete')->name('admin.users.delete');
    Route::get('/users/edit/{user_id}', 'UsersController@edit')->name('admin.users.edit');
    Route::post('/users/edit/{user_id}', 'UsersController@update')->name('admin.users.update');

    Route::get('/users/packages/{user_id}', 'UsersController@packages')->name('admin.users.packages');

    //files routes
    Route::get('/files', 'FilesController@index')->name('admin.files.list');
    Route::get('/files/create', 'FilesController@create')->name('admin.files.create');
    Route::post('/files/create', 'FilesController@store')->name('admin.files.store');
    Route::get('/files/delete/{file_id}', 'FilesController@delete')->name('admin.files.delete');
    Route::get('/files/edit/{file_id}', 'FilesController@edit')->name('admin.files.edit');
    Route::post('/files/edit/{file_id}', 'FilesController@update')->name('admin.files.update');

    //plans routes
    Route::get('/plans', 'PlansController@index')->name('admin.plans.list');
    Route::get('/plans/create', 'PlansController@create')->name('admin.plans.create');
    Route::post('/plans/create', 'PlansController@store')->name('admin.plans.store');
    Route::get('/plans/delete/{plan_id}', 'PlansController@delete')->name('admin.plans.delete');
    Route::get('/plans/edit/{plan_id}', 'PlansController@edit')->name('admin.plans.edit');
    Route::post('/plans/edit/{plan_id}', 'PlansController@update')->name('admin.plans.update');

    //packages routes
    Route::get('/packages', 'PackagesController@index')->name('admin.packages.list');
    Route::get('/packages/create', 'PackagesController@create')->name('admin.packages.create');
    Route::post('/packages/create', 'PackagesController@store')->name('admin.packages.store');
    Route::get('/packages/delete/{package_id}', 'PackagesController@delete')->name('admin.packages.delete');
    Route::get('/packages/edit/{package_id}', 'PackagesController@edit')->name('admin.packages.edit');
    Route::post('/packages/edit/{package_id}', 'PackagesController@update')->name('admin.packages.update');
    Route::get('/packages/sync_files/{package_id}', 'PackagesController@syncFiles')->name('admin.packages.sync_files');
    Route::post('/packages/sync_files/{package_id}', 'PackagesController@updateSyncFiles')->name('admin.packages.sync_files');

    //payments routes
    Route::get('/payments', 'PaymentsController@index')->name('admin.payments.list');
    Route::get('/payments/delete/{payment_id}', 'PaymentsController@delete')->name('admin.payments.delete');


    //categories routes
    Route::get('/categories', 'CategoriesController@index')->name('admin.categories.list');
    Route::get('/categories/create', 'CategoriesController@create')->name('admin.categories.create');
    Route::post('/categories/create', 'CategoriesController@store')->name('admin.categories.store');
    Route::get('/categories/delete/{category_id}', 'CategoriesController@delete')->name('admin.categories.delete');
    Route::get('/categories/edit/{category_id}', 'CategoriesController@edit')->name('admin.categories.edit');
    Route::post('/categories/edit/{category_id}', 'CategoriesController@update')->name('admin.categories.update');

});
//})->middleware('admin');   //method 2
