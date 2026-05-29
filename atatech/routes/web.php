<?php
global $router;

// Ana Sayfa
$router->get('/', 'HomeController@index');

// Kurul Üyeleri
$router->get('/kurul', 'MemberController@index');
$router->get('/kurul/{id}', 'MemberController@show');

// Etkinlikler
$router->get('/etkinlikler', 'EventController@index');
$router->get('/etkinlikler/{id}', 'EventController@show');

// Başvurular
$router->get('/basvuru', 'ApplicationController@index');
$router->post('/basvuru', 'ApplicationController@store');

// Türkçe URL alias'ları
$router->get('/uye-ol', 'ApplicationController@index');
$router->post('/uye-ol', 'ApplicationController@store');

// Formlar
$router->get('/formlar', 'FormController@index');

// Giriş (admin panel)
$router->get('/giris', 'Admin\AuthController@showLogin');
$router->post('/giris', 'Admin\AuthController@login');

// İletişim
$router->get('/iletisim', 'ContactController@index');
$router->post('/iletisim', 'ContactController@store');
