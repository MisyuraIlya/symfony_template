<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/xl' => [[['_route' => '_api_/xl_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\XlxDocuments', '_api_operation_name' => '_api_/xl_post'], null, ['POST' => 0], null, false, false, null]],
        '/api/pdf' => [[['_route' => '_api_/pdf_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\XlxDocuments', '_api_operation_name' => '_api_/pdf_post'], null, ['POST' => 0], null, false, false, null]],
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
                        .')'
                        .'|c(?'
                            .'|ontexts/([^.]+)(?:\\.(jsonld))?(*:221)'
                            .'|a(?'
                                .'|rtessets/([^/\\.]++)(?:\\.([^/]++))?(*:267)'
                                .'|t(?'
                                    .'|egories(?'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(*:315)'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:341)'
                                        .')'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:379)'
                                        .')'
                                    .')'
                                    .'|alog/([^/]++)/([^/]++)/([^/]++)(*:420)'
                                .')'
                            .')'
                            .'|reate_documents/([^/\\.]++)(?:\\.([^/]++))?(*:471)'
                        .')'
                        .'|restoreCart/([^/]++)/([^/]++)/([^/]++)(*:518)'
                        .'|p(?'
                            .'|urchaseHistory/([^/]++)/([^/]++)(*:562)'
                            .'|r(?'
                                .'|ice_list(?'
                                    .'|s(?'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(*:615)'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:641)'
                                        .')'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:679)'
                                        .')'
                                    .')'
                                    .'|_detaileds(?'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(*:728)'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:754)'
                                        .')'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:792)'
                                        .')'
                                    .')'
                                .')'
                                .'|oduct(?'
                                    .'|s(?'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(*:841)'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:867)'
                                        .')'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:905)'
                                        .')'
                                    .')'
                                    .'|_i(?'
                                        .'|mages(?'
                                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:954)'
                                            .'|(?:\\.([^/]++))?(?'
                                                .'|(*:980)'
                                            .')'
                                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                                .'|(*:1018)'
                                            .')'
                                        .')'
                                        .'|nfos(?'
                                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1062)'
                                            .'|(?:\\.([^/]++))?(?'
                                                .'|(*:1089)'
                                            .')'
                                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                                .'|(*:1128)'
                                            .')'
                                        .')'
                                    .')'
                                .')'
                            .')'
                        .')'
                        .'|\\.well\\-known/genid/([^/\\.]++)(?:\\.([^/]++))?(*:1188)'
                        .'|s(?'
                            .'|end_orders(?'
                                .'|(?:\\.([^/]++))?(*:1229)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1264)'
                            .')'
                            .'|ub_attributes(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1316)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1343)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1382)'
                                .')'
                            .')'
                        .')'
                        .'|attribute(?'
                            .'|/([^/]++)/([^/]++)/([^/]++)(*:1433)'
                            .'|_mains/([^/\\.]++)(?:\\.([^/]++))?(*:1474)'
                        .')'
                        .'|histor(?'
                            .'|ies(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1525)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1552)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1591)'
                                .')'
                            .')'
                            .'|y_detaileds(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1642)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1669)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1708)'
                                .')'
                            .')'
                        .')'
                        .'|m(?'
                            .'|edia_objects(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1765)'
                                .'|(?:\\.([^/]++))?(*:1789)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1824)'
                                .'|(?:\\.([^/]++))?(*:1848)'
                            .')'
                            .'|igvans(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1893)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1920)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1959)'
                                .')'
                            .')'
                        .')'
                        .'|user(?'
                            .'|s(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2008)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:2035)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:2074)'
                                .')'
                            .')'
                            .'|_infos(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2120)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:2147)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:2186)'
                                .')'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:2228)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        43 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], null, null, false, true, null]],
        78 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        111 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        143 => [[['_route' => '_api_/documents{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\Documents', '_api_operation_name' => '_api_/documents{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        177 => [[['_route' => '_api_/documents/{documentNumber}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\Documents', '_api_operation_name' => '_api_/documents/{documentNumber}{._format}_get'], ['documentNumber', '_format'], ['GET' => 0], null, false, true, null]],
        221 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        267 => [[['_route' => '_api_/cartessets/{userExtId}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\Cartesset', '_api_operation_name' => '_api_/cartessets/{userExtId}{._format}_get'], ['userExtId', '_format'], ['GET' => 0], null, false, true, null]],
        315 => [[['_route' => '_api_/categories/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categories/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        341 => [
            [['_route' => '_api_/categories{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categories{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/categories{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categories{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        379 => [
            [['_route' => '_api_/categories/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categories/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/categories/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categories/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/categories/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categories/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        420 => [[['_route' => '_api_/catalog/{lvl1}/{lvl2}/{lvl3}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/catalog/{lvl1}/{lvl2}/{lvl3}_get_collection'], ['lvl1', 'lvl2', 'lvl3'], ['GET' => 0], null, false, true, null]],
        471 => [[['_route' => '_api_/create_documents/{documentNumber}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\XlxDocuments', '_api_operation_name' => '_api_/create_documents/{documentNumber}{._format}_get'], ['documentNumber', '_format'], ['GET' => 0], null, false, true, null]],
        518 => [[['_route' => '_api_/restoreCart/{documentType}/{userExtId}/{orderNumber}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\Documents', '_api_operation_name' => '_api_/restoreCart/{documentType}/{userExtId}/{orderNumber}_get_collection'], ['documentType', 'userExtId', 'orderNumber'], ['GET' => 0], null, false, true, null]],
        562 => [[['_route' => '_api_/purchaseHistory/{userExtId}/{sku}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\PurchaseHistory', '_api_operation_name' => '_api_/purchaseHistory/{userExtId}/{sku}_get_collection'], ['userExtId', 'sku'], ['GET' => 0], null, false, true, null]],
        615 => [[['_route' => '_api_/price_lists/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        641 => [
            [['_route' => '_api_/price_lists{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/price_lists{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        679 => [
            [['_route' => '_api_/price_lists/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/price_lists/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/price_lists/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        728 => [[['_route' => '_api_/price_list_detaileds/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        754 => [
            [['_route' => '_api_/price_list_detaileds{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/price_list_detaileds{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        792 => [
            [['_route' => '_api_/price_list_detaileds/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/price_list_detaileds/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        841 => [[['_route' => '_api_/products/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        867 => [
            [['_route' => '_api_/products{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/products{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        905 => [
            [['_route' => '_api_/products/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/products/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        954 => [[['_route' => '_api_/product_images/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        980 => [
            [['_route' => '_api_/product_images{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/product_images{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1018 => [
            [['_route' => '_api_/product_images/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/product_images/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/product_images/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1062 => [[['_route' => '_api_/product_infos/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1089 => [
            [['_route' => '_api_/product_infos{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/product_infos{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1128 => [
            [['_route' => '_api_/product_infos/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/product_infos/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/product_infos/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1188 => [[['_route' => '_api_/.well-known/genid/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\PurchaseHistory', '_api_operation_name' => '_api_/.well-known/genid/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1229 => [[['_route' => '_api_/send_orders{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\SendOrder', '_api_operation_name' => '_api_/send_orders{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        1264 => [[['_route' => '_api_/send_orders/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\SendOrder', '_api_operation_name' => '_api_/send_orders/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1316 => [[['_route' => '_api_/sub_attributes/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1343 => [
            [['_route' => '_api_/sub_attributes{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/sub_attributes{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1382 => [
            [['_route' => '_api_/sub_attributes/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/sub_attributes/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/sub_attributes/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1433 => [[['_route' => '_api_/attribute/{lvl1}/{lvl2}/{lvl3}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AttributeMain', '_api_operation_name' => '_api_/attribute/{lvl1}/{lvl2}/{lvl3}_get_collection'], ['lvl1', 'lvl2', 'lvl3'], ['GET' => 0], null, false, true, null]],
        1474 => [[['_route' => '_api_/attribute_mains/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AttributeMain', '_api_operation_name' => '_api_/attribute_mains/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1525 => [[['_route' => '_api_/histories/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1552 => [
            [['_route' => '_api_/histories{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/histories{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1591 => [
            [['_route' => '_api_/histories/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/histories/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/histories/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1642 => [[['_route' => '_api_/history_detaileds/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1669 => [
            [['_route' => '_api_/history_detaileds{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/history_detaileds{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1708 => [
            [['_route' => '_api_/history_detaileds/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/history_detaileds/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/history_detaileds/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1765 => [[['_route' => '_api_/media_objects/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1789 => [[['_route' => '_api_/media_objects{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        1824 => [[['_route' => '_api_/media_objects/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null]],
        1848 => [[['_route' => '_api_/media_objects{._format}_post', '_controller' => 'App\\Controller\\CreateMediaObjectAction', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        1893 => [[['_route' => '_api_/migvans/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1920 => [
            [['_route' => '_api_/migvans{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/migvans{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1959 => [
            [['_route' => '_api_/migvans/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/migvans/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/migvans/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2008 => [[['_route' => '_api_/users/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2035 => [
            [['_route' => '_api_/users{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/users{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2074 => [
            [['_route' => '_api_/users/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2120 => [[['_route' => '_api_/user_infos/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2147 => [
            [['_route' => '_api_/user_infos{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/user_infos{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2186 => [
            [['_route' => '_api_/user_infos/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/user_infos/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/user_infos/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2228 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
