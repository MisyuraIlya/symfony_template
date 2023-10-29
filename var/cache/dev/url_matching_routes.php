<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/categoriesApp' => [[['_route' => '_api_/categoriesApp_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categoriesApp_get_collection'], null, ['GET' => 0], null, false, false, null]],
        '/api/token/refresh' => [[['_route' => 'gesdinet_jwt_refresh_token'], null, null, null, false, false, null]],
        '/auth/registration' => [[['_route' => 'app_auth_register', '_controller' => 'App\\Controller\\AuthController::register'], null, ['PUT' => 0], null, false, false, null]],
        '/auth/validation' => [[['_route' => 'app_auth_validation', '_controller' => 'App\\Controller\\AuthController::validation'], null, ['POST' => 0], null, false, false, null]],
        '/auth/restorePasswordStepOne' => [[['_route' => 'app_auth_restorePasswordStepOne', '_controller' => 'App\\Controller\\AuthController::restorePasswordStepOne'], null, ['POST' => 0], null, false, false, null]],
        '/auth/restorePasswordStepTwo' => [[['_route' => 'app_auth_restorePasswordStepTwo', '_controller' => 'App\\Controller\\AuthController::restorePasswordStepTwo'], null, ['POST' => 0], null, false, false, null]],
        '/excel' => [[['_route' => 'app_excel', '_controller' => 'App\\Controller\\ExcelController::index'], null, null, null, false, false, null]],
        '/api/auth' => [[['_route' => 'jwt_auth'], null, ['POST' => 0], null, false, false, null]],
        '/api/auth/refresh' => [[['_route' => 'jwt_refresh'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api(?'
                    .'|/\\.well\\-known/genid/([^/]++)(*:43)'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:78)'
                    .'|/(?'
                        .'|doc(?'
                            .'|s(?:\\.([^/]++))?(*:111)'
                            .'|uments(?'
                                .'|(?:\\.([^/]++))?(*:143)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:177)'
                            .')'
                            .'|/(?'
                                .'|xls(?:\\.([^/]++))?(*:208)'
                                .'|pdfs(?'
                                    .'|(?:\\.([^/]++))?(*:238)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:272)'
                                .')'
                            .')'
                        .')'
                        .'|c(?'
                            .'|ontexts/([^.]+)(?:\\.(jsonld))?(*:317)'
                            .'|a(?'
                                .'|rtessets/([^/\\.]++)(?:\\.([^/]++))?(*:363)'
                                .'|t(?'
                                    .'|egories(?'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(*:411)'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:437)'
                                        .')'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:475)'
                                        .')'
                                    .')'
                                    .'|alog/([^/]++)/([^/]++)/([^/]++)(*:516)'
                                .')'
                            .')'
                        .')'
                        .'|p(?'
                            .'|urchaseHistory/([^/]++)/([^/]++)(*:563)'
                            .'|r(?'
                                .'|ice_list(?'
                                    .'|s(?'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(*:616)'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:642)'
                                        .')'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:680)'
                                        .')'
                                    .')'
                                    .'|_detaileds(?'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(*:729)'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:755)'
                                        .')'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:793)'
                                        .')'
                                    .')'
                                .')'
                                .'|oduct(?'
                                    .'|s(?'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(*:842)'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:868)'
                                        .')'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:906)'
                                        .')'
                                    .')'
                                    .'|_i(?'
                                        .'|mages(?'
                                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:955)'
                                            .'|(?:\\.([^/]++))?(?'
                                                .'|(*:981)'
                                            .')'
                                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                                .'|(*:1019)'
                                            .')'
                                        .')'
                                        .'|nfos(?'
                                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1063)'
                                            .'|(?:\\.([^/]++))?(?'
                                                .'|(*:1090)'
                                            .')'
                                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                                .'|(*:1129)'
                                            .')'
                                        .')'
                                    .')'
                                .')'
                            .')'
                        .')'
                        .'|\\.well\\-known/genid/([^/\\.]++)(?:\\.([^/]++))?(*:1189)'
                        .'|s(?'
                            .'|end_orders(?'
                                .'|(?:\\.([^/]++))?(*:1230)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1265)'
                            .')'
                            .'|ub_attributes(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1317)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1344)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1383)'
                                .')'
                            .')'
                        .')'
                        .'|attribute(?'
                            .'|/([^/]++)/([^/]++)/([^/]++)(*:1434)'
                            .'|_mains/([^/\\.]++)(?:\\.([^/]++))?(*:1475)'
                        .')'
                        .'|histor(?'
                            .'|ies(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1526)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1553)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1592)'
                                .')'
                            .')'
                            .'|y_detaileds(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1643)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1670)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1709)'
                                .')'
                            .')'
                        .')'
                        .'|m(?'
                            .'|edia_objects(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1766)'
                                .'|(?:\\.([^/]++))?(*:1790)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1825)'
                                .'|(?:\\.([^/]++))?(*:1849)'
                            .')'
                            .'|igvans(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1894)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1921)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1960)'
                                .')'
                            .')'
                        .')'
                        .'|user(?'
                            .'|s(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2009)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:2036)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:2075)'
                                .')'
                            .')'
                            .'|_infos(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2121)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:2148)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:2187)'
                                .')'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:2229)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        43 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], null, null, false, true, null]],
        78 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        111 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        143 => [[['_route' => '_api_/documents{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\Documents', '_api_operation_name' => '_api_/documents{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        177 => [[['_route' => '_api_/documents/{documentNumber}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\Documents', '_api_operation_name' => '_api_/documents/{documentNumber}{._format}_get'], ['documentNumber', '_format'], ['GET' => 0], null, false, true, null]],
        208 => [[['_route' => '_api_/doc/xls{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\XlxDocuments', '_api_operation_name' => '_api_/doc/xls{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        238 => [[['_route' => '_api_/doc/pdfs{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\XlxDocuments', '_api_operation_name' => '_api_/doc/pdfs{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        272 => [[['_route' => '_api_/doc/pdfs/{documentNumber}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\XlxDocuments', '_api_operation_name' => '_api_/doc/pdfs/{documentNumber}{._format}_get'], ['documentNumber', '_format'], ['GET' => 0], null, false, true, null]],
        317 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        363 => [[['_route' => '_api_/cartessets/{userExtId}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\Cartesset', '_api_operation_name' => '_api_/cartessets/{userExtId}{._format}_get'], ['userExtId', '_format'], ['GET' => 0], null, false, true, null]],
        411 => [[['_route' => '_api_/categories/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categories/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        437 => [
            [['_route' => '_api_/categories{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categories{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/categories{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categories{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        475 => [
            [['_route' => '_api_/categories/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categories/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/categories/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categories/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/categories/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categories/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        516 => [[['_route' => '_api_/catalog/{lvl1}/{lvl2}/{lvl3}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/catalog/{lvl1}/{lvl2}/{lvl3}_get_collection'], ['lvl1', 'lvl2', 'lvl3'], ['GET' => 0], null, false, true, null]],
        563 => [[['_route' => '_api_/purchaseHistory/{userExtId}/{sku}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\PurchaseHistory', '_api_operation_name' => '_api_/purchaseHistory/{userExtId}/{sku}_get_collection'], ['userExtId', 'sku'], ['GET' => 0], null, false, true, null]],
        616 => [[['_route' => '_api_/price_lists/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        642 => [
            [['_route' => '_api_/price_lists{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/price_lists{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        680 => [
            [['_route' => '_api_/price_lists/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/price_lists/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/price_lists/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        729 => [[['_route' => '_api_/price_list_detaileds/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        755 => [
            [['_route' => '_api_/price_list_detaileds{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/price_list_detaileds{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        793 => [
            [['_route' => '_api_/price_list_detaileds/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/price_list_detaileds/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        842 => [[['_route' => '_api_/products/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        868 => [
            [['_route' => '_api_/products{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/products{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        906 => [
            [['_route' => '_api_/products/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/products/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        955 => [[['_route' => '_api_/product_images/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        981 => [
            [['_route' => '_api_/product_images{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/product_images{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1019 => [
            [['_route' => '_api_/product_images/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/product_images/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/product_images/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1063 => [[['_route' => '_api_/product_infos/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1090 => [
            [['_route' => '_api_/product_infos{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/product_infos{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1129 => [
            [['_route' => '_api_/product_infos/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/product_infos/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/product_infos/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1189 => [[['_route' => '_api_/.well-known/genid/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\PurchaseHistory', '_api_operation_name' => '_api_/.well-known/genid/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1230 => [[['_route' => '_api_/send_orders{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\SendOrder', '_api_operation_name' => '_api_/send_orders{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        1265 => [[['_route' => '_api_/send_orders/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\SendOrder', '_api_operation_name' => '_api_/send_orders/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1317 => [[['_route' => '_api_/sub_attributes/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1344 => [
            [['_route' => '_api_/sub_attributes{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/sub_attributes{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1383 => [
            [['_route' => '_api_/sub_attributes/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/sub_attributes/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/sub_attributes/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1434 => [[['_route' => '_api_/attribute/{lvl1}/{lvl2}/{lvl3}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AttributeMain', '_api_operation_name' => '_api_/attribute/{lvl1}/{lvl2}/{lvl3}_get_collection'], ['lvl1', 'lvl2', 'lvl3'], ['GET' => 0], null, false, true, null]],
        1475 => [[['_route' => '_api_/attribute_mains/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AttributeMain', '_api_operation_name' => '_api_/attribute_mains/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1526 => [[['_route' => '_api_/histories/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1553 => [
            [['_route' => '_api_/histories{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/histories{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1592 => [
            [['_route' => '_api_/histories/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/histories/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/histories/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1643 => [[['_route' => '_api_/history_detaileds/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1670 => [
            [['_route' => '_api_/history_detaileds{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/history_detaileds{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1709 => [
            [['_route' => '_api_/history_detaileds/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/history_detaileds/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/history_detaileds/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1766 => [[['_route' => '_api_/media_objects/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1790 => [[['_route' => '_api_/media_objects{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        1825 => [[['_route' => '_api_/media_objects/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null]],
        1849 => [[['_route' => '_api_/media_objects{._format}_post', '_controller' => 'App\\Controller\\CreateMediaObjectAction', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        1894 => [[['_route' => '_api_/migvans/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1921 => [
            [['_route' => '_api_/migvans{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/migvans{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1960 => [
            [['_route' => '_api_/migvans/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/migvans/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/migvans/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2009 => [[['_route' => '_api_/users/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2036 => [
            [['_route' => '_api_/users{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/users{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2075 => [
            [['_route' => '_api_/users/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2121 => [[['_route' => '_api_/user_infos/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2148 => [
            [['_route' => '_api_/user_infos{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/user_infos{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2187 => [
            [['_route' => '_api_/user_infos/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/user_infos/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/user_infos/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2229 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
