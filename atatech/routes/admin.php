<?php
global $router;

// Admin Auth
$router->get('/admin/login', 'Admin\AuthController@showLogin');
$router->post('/admin/login', 'Admin\AuthController@login');
$router->get('/admin/logout', 'Admin\AuthController@logout');

// Admin Dashboard (requires auth)
$router->get('/admin', 'Admin\DashboardController@index');

// Admin Members
$router->get('/admin/members', 'Admin\MemberController@index');
$router->get('/admin/members/create', 'Admin\MemberController@create');
$router->post('/admin/members', 'Admin\MemberController@store');
$router->get('/admin/members/{id}/edit', 'Admin\MemberController@edit');
$router->post('/admin/members/{id}', 'Admin\MemberController@update');
$router->post('/admin/members/{id}/delete', 'Admin\MemberController@delete');

// Admin Events
$router->get('/admin/events', 'Admin\EventController@index');
$router->get('/admin/events/create', 'Admin\EventController@create');
$router->post('/admin/events', 'Admin\EventController@store');
$router->get('/admin/events/{id}/edit', 'Admin\EventController@edit');
$router->post('/admin/events/{id}', 'Admin\EventController@update');
$router->post('/admin/events/{id}/delete', 'Admin\EventController@delete');

// Admin Applications
$router->get('/admin/applications', 'Admin\ApplicationController@index');
$router->get('/admin/applications/{id}', 'Admin\ApplicationController@show');
$router->post('/admin/applications/{id}/status', 'Admin\ApplicationController@updateStatus');

// Admin Messages
$router->get('/admin/messages', 'Admin\MessageController@index');
$router->get('/admin/messages/{id}', 'Admin\MessageController@show');
$router->post('/admin/messages/{id}/status', 'Admin\MessageController@updateStatus');
