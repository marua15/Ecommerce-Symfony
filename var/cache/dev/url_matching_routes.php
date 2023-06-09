<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/category' => [[['_route' => 'app_category', '_controller' => 'App\\Controller\\CategoryController::index'], null, ['GET' => 0], null, false, false, null]],
        '/newcat' => [[['_route' => 'category_new', '_controller' => 'App\\Controller\\CategoryController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/client' => [[['_route' => 'app_client', '_controller' => 'App\\Controller\\ClientController::index'], null, null, null, false, false, null]],
        '/user/cart' => [[['_route' => 'cart_Page', '_controller' => 'App\\Controller\\ClientController::cart'], null, null, null, true, false, null]],
        '/' => [[['_route' => 'home.index', '_controller' => 'App\\Controller\\HomeController::index'], null, ['GET' => 0], null, false, false, null]],
        '/product' => [[['_route' => 'app_product', '_controller' => 'App\\Controller\\ProductController::index'], null, ['GET' => 0], null, false, false, null]],
        '/newprod' => [[['_route' => 'product_new', '_controller' => 'App\\Controller\\ProductController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/connexion' => [[['_route' => 'security.login', '_controller' => 'App\\Controller\\SecurityController::login'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/deconnexion' => [[['_route' => 'security.logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/inscription' => [[['_route' => 'security.registration', '_controller' => 'App\\Controller\\SecurityController::registration'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/edit(?'
                    .'|cat/([^/]++)(*:189)'
                    .'|prod/([^/]++)(*:210)'
                .')'
                .'|/delete(?'
                    .'|cat/([^/]++)(*:241)'
                    .'|prod/([^/]++)(*:262)'
                .')'
                .'|/user/(?'
                    .'|cart/([^/]++)(*:293)'
                    .'|delete/([^/]++)(*:316)'
                .')'
                .'|/cart/(?'
                    .'|add/([^/]++)(*:346)'
                    .'|delete/([^/]++)(*:369)'
                .')'
                .'|/product([^/]++)(*:394)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        189 => [[['_route' => 'category_edit', '_controller' => 'App\\Controller\\CategoryController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        210 => [[['_route' => 'product_edit', '_controller' => 'App\\Controller\\ProductController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        241 => [[['_route' => 'category_delete', '_controller' => 'App\\Controller\\CategoryController::delete'], ['id'], ['GET' => 0], null, false, true, null]],
        262 => [[['_route' => 'product_delete', '_controller' => 'App\\Controller\\ProductController::delete'], ['id'], ['GET' => 0], null, false, true, null]],
        293 => [[['_route' => 'cart_Page_Admin', '_controller' => 'App\\Controller\\ClientController::cartAdmin'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        316 => [[['_route' => 'user_delete', '_controller' => 'App\\Controller\\ClientController::deleteP'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        346 => [[['_route' => 'addToCart', '_controller' => 'App\\Controller\\ClientController::addToCart'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        369 => [[['_route' => 'deleteFromCart', '_controller' => 'App\\Controller\\ClientController::deleteFromCart'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        394 => [
            [['_route' => 'details_product', '_controller' => 'App\\Controller\\ProductController::detailsProd'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
