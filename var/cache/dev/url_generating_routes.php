<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], [], []],
    '_profiler_xdebug' => [[], ['_controller' => 'web_profiler.controller.profiler::xdebugAction'], [], [['text', '/_profiler/xdebug']], [], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    'app_category' => [[], ['_controller' => 'App\\Controller\\CategoryController::index'], [], [['text', '/category']], [], [], []],
    'category_new' => [[], ['_controller' => 'App\\Controller\\CategoryController::new'], [], [['text', '/newcat']], [], [], []],
    'category_edit' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::edit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/editcat']], [], [], []],
    'category_delete' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/deletecat']], [], [], []],
    'app_client' => [[], ['_controller' => 'App\\Controller\\ClientController::index'], [], [['text', '/client']], [], [], []],
    'cart_Page' => [[], ['_controller' => 'App\\Controller\\ClientController::cart'], [], [['text', '/user/cart/']], [], [], []],
    'cart_Page_Admin' => [['id'], ['_controller' => 'App\\Controller\\ClientController::cartAdmin'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/user/cart']], [], [], []],
    'user_delete' => [['id'], ['_controller' => 'App\\Controller\\ClientController::deleteP'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/user/delete']], [], [], []],
    'addToCart' => [['id'], ['_controller' => 'App\\Controller\\ClientController::addToCart'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/cart/add']], [], [], []],
    'deleteFromCart' => [['id'], ['_controller' => 'App\\Controller\\ClientController::deleteFromCart'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/cart/delete']], [], [], []],
    'home.index' => [[], ['_controller' => 'App\\Controller\\HomeController::index'], [], [['text', '/']], [], [], []],
    'app_product' => [[], ['_controller' => 'App\\Controller\\ProductController::index'], [], [['text', '/product']], [], [], []],
    'details_product' => [['id'], ['_controller' => 'App\\Controller\\ProductController::detailsProd'], [], [['variable', '', '[^/]++', 'id', true], ['text', '/product']], [], [], []],
    'product_new' => [[], ['_controller' => 'App\\Controller\\ProductController::new'], [], [['text', '/newprod']], [], [], []],
    'product_edit' => [['id'], ['_controller' => 'App\\Controller\\ProductController::edit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/editprod']], [], [], []],
    'product_delete' => [['id'], ['_controller' => 'App\\Controller\\ProductController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/deleteprod']], [], [], []],
    'security.login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/connexion']], [], [], []],
    'security.logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/deconnexion']], [], [], []],
    'security.registration' => [[], ['_controller' => 'App\\Controller\\SecurityController::registration'], [], [['text', '/inscription']], [], [], []],
];
