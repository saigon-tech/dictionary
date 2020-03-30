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

//Front-end

Route::get('/', 'HomeController@index');

Route::get('/chi-tiet-tu-dien/{dictionary_id}', 'DictionaryController@details_dictionary')->name('detail.dictionary');
Route::get('/wordtype-food', 'HomeController@wordtype_food');
Route::get('/wordtype-game', 'HomeController@wordtype_game');
Route::get('/wordtype-music', 'HomeController@wordtype_music');
Route::get('/alphabet-detail/{word}', 'HomeController@getDetailAlphabet')->name('detail.alphabet');
Route::post('/tim-kiem', 'HomeController@search');
Route::get('/add-all-dictionary', 'HomeController@add_all_dictionary');
Route::post('/save-add-dictionary', 'HomeController@save_add_dictionary');

Route::post('/tim-kiem-alphabet', 'AlphabetDictionary@search');

Route::post('/tim-kiem-wordtype', 'WordtypeDictionary@search');

//Back-end
Route::get('login', 'Auth\LoginController@getLogin')->name('get_login');
Route::post('login', 'Auth\LoginController@postLogin')->name('post_login');
Route::get('logout', 'Auth\LoginController@getLogout')->name('logout');

// Admin page
Route::group(['middleware' => ['adminLogin']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', 'DashboardController@show_dashboard')->name('get.admin_dashboard');

        // AlphabetDictionary dictionary
        Route::get('/add-alphabet-dictionary', 'AlphabetDictionary@add_alphabet_dictionary')->name('add.alphabet');
        Route::get('/all-alphabet-dictionary', 'AlphabetDictionary@all_alphabet_dictionary')->name('list.alphabet');
        Route::get('/edit-alphabet-dictionary/{alphabet_dictionary_id}',
            'AlphabetDictionary@edit_alphabet_dictionary')->name('edit.alphabet');
        Route::get('/delete-alphabet-dictionary/{alphabet_dictionary_id}',
            'AlphabetDictionary@delete_alphabet_dictionary')->name('destroy.alphabet');

        Route::get('/unactive-alphabet-dictionary/{alphabet_dictionary_id}',
            'AlphabetDictionary@unactive_alphabet_dictionary')->name('unactive.alphabet');
        Route::get('/active-alphabet-dictionary/{alphabet_dictionary_id}',
            'AlphabetDictionary@active_alphabet_dictionary')->name('active.alphabet');

        Route::post('/save-alphabet-dictionary', 'AlphabetDictionary@save_alphabet_dictionary')->name('save.alphabet');
        Route::post('/update-alphabet-dictionary/{alphabet_dictionary_id}',
            'AlphabetDictionary@update_alphabet_dictionary')->name('update.alphabet');

        // WordtypeDictionary
        Route::get('/add-wordtype-dictionary', 'WordtypeDictionary@add_wordtype_dictionary')->name('add.wordtype');
        Route::get('/all-wordtype-dictionary', 'WordtypeDictionary@all_wordtype_dictionary')->name('list.wordtype');
        Route::get('/edit-wordtype-dictionary/{wordtype_dictionary_id}',
            'WordtypeDictionary@edit_wordtype_dictionary')->name('edit.wordtype');
        Route::get('/delete-wordtype-dictionary/{wordtype_dictionary_id}',
            'WordtypeDictionary@delete_wordtype_dictionary')->name('destroy.wordtype');

        Route::get('/unactive-wordtype-dictionary/{wordtype_dictionary_id}',
            'WordtypeDictionary@unactive_wordtype_dictionary')->name('unactive.wordtype');
        Route::get('/active-wordtype-dictionary/{wordtype_dictionary_id}',
            'WordtypeDictionary@active_wordtype_dictionary')->name('active.wordtype');

        Route::post('/save-wordtype-dictionary', 'WordtypeDictionary@save_wordtype_dictionary')->name('save.wordtype');
        Route::post('/update-wordtype-dictionary/{wordtype_dictionary_id}',
            'WordtypeDictionary@update_wordtype_dictionary')->name('update.wordtype');

        // Dictionary dictionary
        Route::get('/add-dictionary', 'DictionaryController@add_dictionary')->name('add.dictionary');
        Route::get('/all-dictionary', 'DictionaryController@all_dictionary')->name('list.dictionary');
        Route::get('/edit-dictionary/{dictionary_id}', 'DictionaryController@edit_dictionary')->name('edit.dictionary');
        Route::get('/delete-dictionary/{dictionary_id}', 'DictionaryController@delete_dictionary')->name('destroy.dictionary');

        Route::get('/unactive-dictionary/{dictionary_id}', 'DictionaryController@unactive_dictionary')->name('unactive.dictionary');
        Route::get('/active-dictionary/{dictionary_id}', 'DictionaryController@active_dictionary')->name('active.dictionary');

        Route::post('/save-dictionary', 'DictionaryController@save_dictionary')->name('save.dictionary');
        Route::post('/update-dictionary/{dictionary_id}', 'DictionaryController@update_dictionary')->name('update.dictionary');
    });
});


