
<?php

Route::resource('/dashbord', 'DashbordController');

Route::resource('/users', 'UserController');

Route::resource('/uploads', 'UploadsController');

Route::resource('/pager', 'PageController');
