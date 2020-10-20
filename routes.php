<?php

    Auth::routes();
    //-----cart----//
    Route::get('/cart',                     'Controller@listcart')      ->name('listcart');
    Route::post('/cart/add',                'Controller@addtocart')     ->name('addtocart');
    Route::get('/cart/delete/{rowId}',      'Controller@deletecart')    ->name('deletecart');
    Route::get('/cart/checkout',            'Controller@checkout')      ->name('checkout');

?>