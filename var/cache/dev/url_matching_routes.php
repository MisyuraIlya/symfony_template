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
                        .'|s(?'
                            .'|end_orders(?'
                                .'|(?:\\.([^/]++))?(*:559)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:593)'
                            .')'
                            .'|ub_attributes(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:644)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:670)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:708)'
                                .')'
                            .')'
                        .')'
                        .'|attribute(?'
                            .'|/([^/]++)/([^/]++)/([^/]++)(*:758)'
                            .'|_mains/([^/\\.]++)(?:\\.([^/]++))?(*:798)'
                        .')'
                        .'|histor(?'
                            .'|ies(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:848)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:874)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:912)'
                                .')'
                            .')'
                            .'|y_detaileds(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:962)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:988)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1026)'
                                .')'
                            .')'
                        .')'
                        .'|m(?'
                            .'|edia_objects(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1083)'
                                .'|(?:\\.([^/]++))?(*:1107)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1142)'
                                .'|(?:\\.([^/]++))?(*:1166)'
                            .')'
                            .'|igvans(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1211)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1238)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1277)'
                                .')'
                            .')'
                        .')'
                        .'|pr(?'
                            .'|ice_list(?'
                                .'|s(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1335)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:1362)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1401)'
                                    .')'
                                .')'
                                .'|_detaileds(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1451)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:1478)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1517)'
                                    .')'
                                .')'
                            .')'
                            .'|oduct(?'
                                .'|s(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1567)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:1594)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1633)'
                                    .')'
                                .')'
                                .'|_i(?'
                                    .'|mages(?'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1683)'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:1710)'
                                        .')'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:1749)'
                                        .')'
                                    .')'
                                    .'|nfos(?'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1793)'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:1820)'
                                        .')'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:1859)'
                                        .')'
                                    .')'
                                .')'
                            .')'
                        .')'
                        .'|user(?'
                            .'|s(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1910)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1937)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1976)'
                                .')'
                            .')'
                            .'|_infos(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2022)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:2049)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:2088)'
                                .')'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:2130)'
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
        559 => [[['_route' => '_api_/send_orders{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\SendOrder', '_api_operation_name' => '_api_/send_orders{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        593 => [[['_route' => '_api_/send_orders/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\SendOrder', '_api_operation_name' => '_api_/send_orders/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        644 => [[['_route' => '_api_/sub_attributes/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        670 => [
            [['_route' => '_api_/sub_attributes{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/sub_attributes{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        708 => [
            [['_route' => '_api_/sub_attributes/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/sub_attributes/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/sub_attributes/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        758 => [[['_route' => '_api_/attribute/{lvl1}/{lvl2}/{lvl3}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AttributeMain', '_api_operation_name' => '_api_/attribute/{lvl1}/{lvl2}/{lvl3}_get_collection'], ['lvl1', 'lvl2', 'lvl3'], ['GET' => 0], null, false, true, null]],
        798 => [[['_route' => '_api_/attribute_mains/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AttributeMain', '_api_operation_name' => '_api_/attribute_mains/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        848 => [[['_route' => '_api_/histories/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        874 => [
            [['_route' => '_api_/histories{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/histories{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        912 => [
            [['_route' => '_api_/histories/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/histories/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/histories/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        962 => [[['_route' => '_api_/history_detaileds/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        988 => [
            [['_route' => '_api_/history_detaileds{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/history_detaileds{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1026 => [
            [['_route' => '_api_/history_detaileds/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/history_detaileds/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/history_detaileds/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1083 => [[['_route' => '_api_/media_objects/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1107 => [[['_route' => '_api_/media_objects{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        1142 => [[['_route' => '_api_/media_objects/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null]],
        1166 => [[['_route' => '_api_/media_objects{._format}_post', '_controller' => 'App\\Controller\\CreateMediaObjectAction', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        1211 => [[['_route' => '_api_/migvans/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1238 => [
            [['_route' => '_api_/migvans{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/migvans{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1277 => [
            [['_route' => '_api_/migvans/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/migvans/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/migvans/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1335 => [[['_route' => '_api_/price_lists/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1362 => [
            [['_route' => '_api_/price_lists{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/price_lists{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1401 => [
            [['_route' => '_api_/price_lists/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/price_lists/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/price_lists/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1451 => [[['_route' => '_api_/price_list_detaileds/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1478 => [
            [['_route' => '_api_/price_list_detaileds{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/price_list_detaileds{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1517 => [
            [['_route' => '_api_/price_list_detaileds/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/price_list_detaileds/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1567 => [[['_route' => '_api_/products/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1594 => [
            [['_route' => '_api_/products{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/products{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1633 => [
            [['_route' => '_api_/products/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/products/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1683 => [[['_route' => '_api_/product_images/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1710 => [
            [['_route' => '_api_/product_images{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/product_images{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1749 => [
            [['_route' => '_api_/product_images/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/product_images/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/product_images/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1793 => [[['_route' => '_api_/product_infos/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1820 => [
            [['_route' => '_api_/product_infos{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/product_infos{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1859 => [
            [['_route' => '_api_/product_infos/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/product_infos/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/product_infos/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1910 => [[['_route' => '_api_/users/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1937 => [
            [['_route' => '_api_/users{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/users{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1976 => [
            [['_route' => '_api_/users/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2022 => [[['_route' => '_api_/user_infos/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2049 => [
            [['_route' => '_api_/user_infos{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/user_infos{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2088 => [
            [['_route' => '_api_/user_infos/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/user_infos/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/user_infos/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2130 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
