<?php

use Illuminate\Support\Facades\Route;
use NLDev\FormBuilder\FormBuilderController;

Route::group(['middleware' => 'web'], function() {
    // Place all your web routes here...(Cut all `Route` which are define in `Route file`, paste here)
    Route::get('form-builder', [FormBuilderController::class, 'index'])->name('constructor');
    Route::post('form-builder', [FormBuilderController::class, 'store'])->name('constructor.store');

    Route::get('dumy-data/{id?}', function($id){
        return [
            'test1' => [
                'test 1',
                'test 2',
                'test 3'
            ],
            'test2' => [
                'test 4',
                'test 5',
                'test 6'
            ],
            'test3' => [
                'test 7',
                'test 8',
                'test 9'
            ]
        ][$id];
    })->name('dumy_data');
});
