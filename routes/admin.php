
<?php

Route::resource('/dashbord', 'DashbordController');

Route::resource('/users', 'UserController');

// Permission, Role
Route::post('/permissions/{user}', 'PermissionController@store')->name(' permissions.store');
Route::delete('permissions/{permission}/{user}', 'PermissionController@destroy')->name(' permissions.destroy');
Route::post('/permissions/giverole/{name}/{user}', 'PermissionController@giverole')->name('permissions.giverole');
// End

Route::resource('/uploads', 'UploadsController');

Route::resource('/pager', 'PageController');

Route::resource('/tab', 'TabController');

Route::resource('/setting', 'SettingsController');
