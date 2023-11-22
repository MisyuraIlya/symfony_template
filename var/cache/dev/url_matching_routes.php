<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/notifications/send' => [[['_route' => '_api_/notifications/send_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\SendNotification', '_api_operation_name' => '_api_/notifications/send_post'], null, ['POST' => 0], null, false, false, null]],
        '/api/xl' => [[['_route' => '_api_/xl_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\XlxDocuments', '_api_operation_name' => '_api_/xl_post'], null, ['POST' => 0], null, false, false, null]],
        '/api/pdf' => [[['_route' => '_api_/pdf_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\XlxDocuments', '_api_operation_name' => '_api_/pdf_post'], null, ['POST' => 0], null, false, false, null]],
        '/api/categoriesApp' => [[['_route' => '_api_/categoriesApp_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categoriesApp_get_collection'], null, ['GET' => 0], null, false, false, null]],
        '/api/token/refresh' => [[['_route' => 'gesdinet_jwt_refresh_token'], null, null, null, false, false, null]],
        '/auth/registration' => [[['_route' => 'app_auth_register', '_controller' => 'App\\Controller\\AuthController::register'], null, ['PUT' => 0], null, false, false, null]],
        '/auth/validation' => [[['_route' => 'app_auth_validation', '_controller' => 'App\\Controller\\AuthController::validation'], null, ['POST' => 0], null, false, false, null]],
        '/auth/restorePasswordStepOne' => [[['_route' => 'app_auth_restorePasswordStepOne', '_controller' => 'App\\Controller\\AuthController::restorePasswordStepOne'], null, ['POST' => 0], null, false, false, null]],
        '/auth/restorePasswordStepTwo' => [[['_route' => 'app_auth_restorePasswordStepTwo', '_controller' => 'App\\Controller\\AuthController::restorePasswordStepTwo'], null, ['POST' => 0], null, false, false, null]],
        '/auth/createUser' => [[['_route' => 'app_auth_createUser', '_controller' => 'App\\Controller\\AuthController::createUser'], null, ['POST' => 0], null, false, false, null]],
        '/auth/createAgent' => [[['_route' => 'app_auth_createAgent', '_controller' => 'App\\Controller\\AuthController::createAgent'], null, ['POST' => 0], null, false, false, null]],
        '/auth/updateUser' => [[['_route' => 'app_auth_updateUser', '_controller' => 'App\\Controller\\AuthController::updateUser'], null, ['POST' => 0], null, false, false, null]],
        '/excel' => [[['_route' => 'app_excel', '_controller' => 'App\\Controller\\ExcelController::index'], null, null, null, false, false, null]],
        '/ftpFileUploader' => [[['_route' => 'ftp_uploader', '_controller' => 'App\\Controller\\FtpFileUploader::ftp'], null, ['POST' => 0], null, false, false, null]],
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
                                .'|lendar/([^/]++)/([^/]++)/([^/]++)(*:462)'
                            .')'
                            .'|reate_documents/([^/\\.]++)(?:\\.([^/]++))?(*:512)'
                        .')'
                        .'|p(?'
                            .'|urchaseHistory/([^/]++)/([^/]++)(*:557)'
                            .'|r(?'
                                .'|ice_list(?'
                                    .'|s(?'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(*:610)'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:636)'
                                        .')'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:674)'
                                        .')'
                                    .')'
                                    .'|_detaileds(?'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(*:723)'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:749)'
                                        .')'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:787)'
                                        .')'
                                    .')'
                                .')'
                                .'|oduct(?'
                                    .'|s(?'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(*:836)'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:862)'
                                        .')'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:900)'
                                        .')'
                                    .')'
                                    .'|_i(?'
                                        .'|mages(?'
                                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:949)'
                                            .'|(?:\\.([^/]++))?(?'
                                                .'|(*:975)'
                                            .')'
                                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                                .'|(*:1013)'
                                            .')'
                                        .')'
                                        .'|nfos(?'
                                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1057)'
                                            .'|(?:\\.([^/]++))?(?'
                                                .'|(*:1084)'
                                            .')'
                                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                                .'|(*:1123)'
                                            .')'
                                        .')'
                                    .')'
                                .')'
                            .')'
                        .')'
                        .'|restoreCart/([^/]++)/([^/]++)/([^/]++)/([^/]++)(*:1185)'
                        .'|s(?'
                            .'|end_(?'
                                .'|history_orders(?:\\.([^/]++))?(*:1234)'
                                .'|orders(?'
                                    .'|(?:\\.([^/]++))?(*:1267)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1302)'
                                .')'
                            .')'
                            .'|ub_attributes(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1355)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1382)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1421)'
                                .')'
                            .')'
                        .')'
                        .'|\\.well\\-known/genid/([^/\\.]++)(?:\\.([^/]++))?(*:1478)'
                        .'|a(?'
                            .'|gent_(?'
                                .'|objectives(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1538)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:1565)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1604)'
                                    .')'
                                .')'
                                .'|targets(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1651)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:1678)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1717)'
                                    .')'
                                .')'
                            .')'
                            .'|ttribute(?'
                                .'|/([^/]++)/([^/]++)/([^/]++)(*:1767)'
                                .'|_mains/([^/\\.]++)(?:\\.([^/]++))?(*:1808)'
                            .')'
                        .')'
                        .'|histor(?'
                            .'|ies(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1860)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1887)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1926)'
                                .')'
                            .')'
                            .'|y_detaileds(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1977)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:2004)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:2043)'
                                .')'
                            .')'
                        .')'
                        .'|m(?'
                            .'|edia_objects(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2100)'
                                .'|(?:\\.([^/]++))?(*:2124)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2159)'
                                .'|(?:\\.([^/]++))?(*:2183)'
                            .')'
                            .'|igvans(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2228)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:2255)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:2294)'
                                .')'
                            .')'
                        .')'
                        .'|notifications(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2348)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:2375)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:2414)'
                            .')'
                        .')'
                        .'|user(?'
                            .'|s(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2462)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:2489)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:2528)'
                                .')'
                            .')'
                            .'|_infos(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2574)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:2601)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:2640)'
                                .')'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:2682)'
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
        462 => [[['_route' => 'app_my_schedule_calendar', '_controller' => 'App\\Controller\\MyScheduleCalendarController::calendarInfo'], ['agentId', 'weekFrom', 'weekTo'], null, null, false, true, null]],
        512 => [[['_route' => '_api_/create_documents/{documentNumber}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\XlxDocuments', '_api_operation_name' => '_api_/create_documents/{documentNumber}{._format}_get'], ['documentNumber', '_format'], ['GET' => 0], null, false, true, null]],
        557 => [[['_route' => '_api_/purchaseHistory/{userExtId}/{sku}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\PurchaseHistory', '_api_operation_name' => '_api_/purchaseHistory/{userExtId}/{sku}_get_collection'], ['userExtId', 'sku'], ['GET' => 0], null, false, true, null]],
        610 => [[['_route' => '_api_/price_lists/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        636 => [
            [['_route' => '_api_/price_lists{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/price_lists{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        674 => [
            [['_route' => '_api_/price_lists/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/price_lists/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/price_lists/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        723 => [[['_route' => '_api_/price_list_detaileds/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        749 => [
            [['_route' => '_api_/price_list_detaileds{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/price_list_detaileds{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        787 => [
            [['_route' => '_api_/price_list_detaileds/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/price_list_detaileds/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        836 => [[['_route' => '_api_/products/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        862 => [
            [['_route' => '_api_/products{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/products{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        900 => [
            [['_route' => '_api_/products/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/products/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        949 => [[['_route' => '_api_/product_images/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        975 => [
            [['_route' => '_api_/product_images{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/product_images{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1013 => [
            [['_route' => '_api_/product_images/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/product_images/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/product_images/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1057 => [[['_route' => '_api_/product_infos/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1084 => [
            [['_route' => '_api_/product_infos{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/product_infos{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1123 => [
            [['_route' => '_api_/product_infos/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/product_infos/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/product_infos/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1185 => [[['_route' => '_api_/restoreCart/{documentType}/{priceType}/{userExtId}/{orderNumber}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\RestoreCart', '_api_operation_name' => '_api_/restoreCart/{documentType}/{priceType}/{userExtId}/{orderNumber}_get_collection'], ['documentType', 'priceType', 'userExtId', 'orderNumber'], ['GET' => 0], null, false, true, null]],
        1234 => [[['_route' => '_api_/send_history_orders{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\SendHistoryOrder', '_api_operation_name' => '_api_/send_history_orders{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        1267 => [[['_route' => '_api_/send_orders{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\SendOrder', '_api_operation_name' => '_api_/send_orders{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        1302 => [[['_route' => '_api_/send_orders/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\SendOrder', '_api_operation_name' => '_api_/send_orders/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1355 => [[['_route' => '_api_/sub_attributes/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1382 => [
            [['_route' => '_api_/sub_attributes{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/sub_attributes{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1421 => [
            [['_route' => '_api_/sub_attributes/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/sub_attributes/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/sub_attributes/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1478 => [[['_route' => '_api_/.well-known/genid/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\SendNotification', '_api_operation_name' => '_api_/.well-known/genid/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1538 => [[['_route' => '_api_/agent_objectives/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AgentObjective', '_api_operation_name' => '_api_/agent_objectives/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1565 => [
            [['_route' => '_api_/agent_objectives{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AgentObjective', '_api_operation_name' => '_api_/agent_objectives{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/agent_objectives{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AgentObjective', '_api_operation_name' => '_api_/agent_objectives{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1604 => [
            [['_route' => '_api_/agent_objectives/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AgentObjective', '_api_operation_name' => '_api_/agent_objectives/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/agent_objectives/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AgentObjective', '_api_operation_name' => '_api_/agent_objectives/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/agent_objectives/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AgentObjective', '_api_operation_name' => '_api_/agent_objectives/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1651 => [[['_route' => '_api_/agent_targets/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AgentTarget', '_api_operation_name' => '_api_/agent_targets/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1678 => [
            [['_route' => '_api_/agent_targets{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AgentTarget', '_api_operation_name' => '_api_/agent_targets{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/agent_targets{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AgentTarget', '_api_operation_name' => '_api_/agent_targets{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1717 => [
            [['_route' => '_api_/agent_targets/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AgentTarget', '_api_operation_name' => '_api_/agent_targets/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/agent_targets/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AgentTarget', '_api_operation_name' => '_api_/agent_targets/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/agent_targets/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AgentTarget', '_api_operation_name' => '_api_/agent_targets/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1767 => [[['_route' => '_api_/attribute/{lvl1}/{lvl2}/{lvl3}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AttributeMain', '_api_operation_name' => '_api_/attribute/{lvl1}/{lvl2}/{lvl3}_get_collection'], ['lvl1', 'lvl2', 'lvl3'], ['GET' => 0], null, false, true, null]],
        1808 => [[['_route' => '_api_/attribute_mains/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AttributeMain', '_api_operation_name' => '_api_/attribute_mains/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1860 => [[['_route' => '_api_/histories/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1887 => [
            [['_route' => '_api_/histories{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/histories{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1926 => [
            [['_route' => '_api_/histories/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/histories/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/histories/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1977 => [[['_route' => '_api_/history_detaileds/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2004 => [
            [['_route' => '_api_/history_detaileds{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/history_detaileds{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2043 => [
            [['_route' => '_api_/history_detaileds/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/history_detaileds/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/history_detaileds/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2100 => [[['_route' => '_api_/media_objects/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2124 => [[['_route' => '_api_/media_objects{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        2159 => [[['_route' => '_api_/media_objects/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null]],
        2183 => [[['_route' => '_api_/media_objects{._format}_post', '_controller' => 'App\\Controller\\CreateMediaObjectAction', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        2228 => [[['_route' => '_api_/migvans/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2255 => [
            [['_route' => '_api_/migvans{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/migvans{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2294 => [
            [['_route' => '_api_/migvans/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/migvans/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/migvans/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2348 => [[['_route' => '_api_/notifications/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Notification', '_api_operation_name' => '_api_/notifications/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2375 => [
            [['_route' => '_api_/notifications{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Notification', '_api_operation_name' => '_api_/notifications{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/notifications{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Notification', '_api_operation_name' => '_api_/notifications{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2414 => [
            [['_route' => '_api_/notifications/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Notification', '_api_operation_name' => '_api_/notifications/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/notifications/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Notification', '_api_operation_name' => '_api_/notifications/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/notifications/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Notification', '_api_operation_name' => '_api_/notifications/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2462 => [[['_route' => '_api_/users/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2489 => [
            [['_route' => '_api_/users{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/users{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2528 => [
            [['_route' => '_api_/users/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2574 => [[['_route' => '_api_/user_infos/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2601 => [
            [['_route' => '_api_/user_infos{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/user_infos{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2640 => [
            [['_route' => '_api_/user_infos/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/user_infos/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/user_infos/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2682 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
