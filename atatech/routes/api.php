<?php
global $router;

// API Routes
$router->get('/api/stats', 'ApiController@stats');
$router->get('/api/events/upcoming', 'ApiController@upcomingEvents');
$router->get('/api/members', 'ApiController@members');
