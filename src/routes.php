<?php

/* HomeController Routes */
$app->get('/', 'HomeController:homeAction');

$app->any('/login', 'HomeController:loginAction');

$app->get('/logout', 'HomeController:logoutAction');

$app->any('/contacto','HomeController:contactAction');

$app->any('/asistencia','HomeController:technicalassistantAction');

$app->any('/condiciones','HomeController:condicionesAction');

$app->any('/politicas','HomeController:politicasAction');

$app->any('/reembolso','HomeController:reembolsoAction');

$app->any('/newProduct','HomeController:newProductAction');


/* UserController Routes */
$app->any('/nuevo-usuario', 'UserController:createUserAction');

$app->get('/profile','UserController:showProfileAction');

$app->any('/editProfile','UserController:editProfileAction');


/* AuctionController Routes */
$app->get('/subastas[/{category}]', 'AuctionController:listAuctionsAction');

$app->get('/subastas/{category}/{subcategory}', 'AuctionController:listAuctionsAction');

$app->get('/subasta/{id}', 'AuctionController:showAuctionAction');

$app->any('/nuevaSubasta', 'AuctionController:createAuctionAction');

$app->any('/uploadImage', 'AuctionController:uploadImagerAction');

/* ProductController Routes */
$app->get('/productos[/{category}]', 'ProductController:listProductsAction');

$app->get('/productos/{category}/{subcategory}', 'ProductController:listProductsAction');

$app->get('/producto/{id}', 'ProductController:showProductAction');

/* ManagementController Routes */
$app->any('/gestion/subastas[/{action}]', 'ManagementController:manageAuctionsAction');

$app->any('/gestion/productos[/{action}]', 'ManagementController:manageProductsAction');


/* AjaxController Routes Wrapper */
$app->any('/ajax/{method}', 'AjaxController:executeAction');
