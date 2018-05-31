<?php
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ProductsController@getIndex')->name('product.index');

Route::get('/acties', 'ProductsController@getActies')->name('getActies');

//bestellingen
Route::group(['prefix' => 'bestellingen'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', 'BestellingenController@index')->name('bestellingen.index');
        Route::get('/{id}', 'BestellingenController@bestellingProgress')->name('bestellingProgress');
    });
});
//end bestellingen

// beheren
Route::group(['prefix' => 'beheren'], function (){
    Route::group(['middleware' => 'auth'], function (){
    Route::get('/', 'BeherenController@index')->name('beheren.index');

        Route::get('/nieuwe-product', 'BeherenController@nieuweProduct')->name('beheren.nieuweProduct');

        Route::post('/nieuwe-product', 'BeherenController@nieuweProductAdd')->name('beheren.nieuweProductAdd');

        Route::get('/{type}', 'BeherenController@bewerkenIndex')->name('beheren.bewerkenIndex');

        Route::post('/{type}', 'BeherenController@bewerkenDeleteSelected')->name('beheren.bewerkenDeleteSelected');

        Route::get('/{type}/{id}/edit', 'BeherenController@getSelectedProduct')->name('beheren.getSelectedProduct');

        Route::patch('/{type}/{id}/edit', 'BeherenController@bewerkenSelectedProduct')->name('beheren.bewerkenSelectedProduct');

    });
});
//beheren

Route::get('/bestellen/{type}', 'ProductsController@getProductPage')->name('products.getAllProducts');

Route::get('/add-to-cart/{id}', 'ProductsController@getAddToCart')->name('products.addToCart');

Route::get('/shopping-cart', 'ProductsController@getCart')->name('products.shoppingCart');

Route::get('/checkout', 'ProductsController@getCheckout')->name('checkout');

Route::get('/quantityPlusOne/{id}', 'ProductsController@quantityPlusOne')->name('quantityPlusOne');

Route::get('/quantityMinusOne/{id}', 'ProductsController@quantityMinusOne')->name('quantityMinusOne');

Route::get('/destroyItem/{id}', 'ProductsController@destroyItem')->name('destroyItem');

Route::post('/checkout', 'ProductsController@postCheckout')->name('checkout');

Route::get('/destroyCart', 'ProductsController@destroyCart')->name('destroy');
