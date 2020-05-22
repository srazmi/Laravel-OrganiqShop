<?php
Route::group(['middleware' => ['web']], function () {
    Route::group(['middleware' => config()->get('profile.middleware'),'prefix'=>config()->get('profile.prefix')], function () {
        Route::get('profile/', 'Berkayoztunc\LaravelProfile\LaravelProfileController@profile');
        Route::get('profile/information', 'Berkayoztunc\LaravelProfile\LaravelProfileController@information');
        Route::get('profile/activity', 'Berkayoztunc\LaravelProfile\LaravelProfileController@activity');
        Route::post('profile/set-profile','Berkayoztunc\LaravelProfile\LaravelProfileController@setProfile');
        Route::post('profile/set-email','Berkayoztunc\LaravelProfile\LaravelProfileController@setEmail');
        Route::post('profile/set-password','Berkayoztunc\LaravelProfile\LaravelProfileController@setPassword');
        Route::post('profile/set-information','Berkayoztunc\LaravelProfile\LaravelProfileController@setAbout');
    });
});
