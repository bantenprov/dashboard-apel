<?php

Route::group(['prefix' => 'dashboard-apel', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\DashboardApel\Http\Controllers\DashboardApelController@index',
        'create'     => 'Bantenprov\DashboardApel\Http\Controllers\DashboardApelController@create',
        'store'     => 'Bantenprov\DashboardApel\Http\Controllers\DashboardApelController@store',
        'show'      => 'Bantenprov\DashboardApel\Http\Controllers\DashboardApelController@show',
        'update'    => 'Bantenprov\DashboardApel\Http\Controllers\DashboardApelController@update',
        'destroy'   => 'Bantenprov\DashboardApel\Http\Controllers\DashboardApelController@destroy',
    ];

    Route::get('/',$controllers->index)->name('dashboard-apel.index');
    Route::get('/create',$controllers->create)->name('dashboard-apel.create');
    Route::post('/store',$controllers->store)->name('dashboard-apel.store');
    Route::get('/{id}',$controllers->show)->name('dashboard-apel.show');
    Route::put('/{id}/update',$controllers->update)->name('dashboard-apel.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('dashboard-apel.destroy');

});

