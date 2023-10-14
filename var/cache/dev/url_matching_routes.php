<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/documents?userExId=41104111&from=2023-02-10&to=2023-03-10&documentType=orders&limit=10' => [[['_route' => '_api_/documents?userExId=41104111&from=2023-02-10&to=2023-03-10&documentType=orders&limit=10_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\Documents', '_api_operation_name' => '_api_/documents?userExId=41104111&from=2023-02-10&to=2023-03-10&documentType=orders&limit=10_get_collection'], null, ['GET' => 0], null, false, false, null]],
        '/api/token/refresh' => [[['_route' => 'gesdinet_jwt_refresh_token'], null, null, null, false, false, null]],
        '/auth/registration' => [[['_route' => 'app_auth_register', '_controller' => 'App\\Controller\\AuthController::register'], null, ['PUT' => 0], null, false, false, null]],
        '/auth/validation' => [[['_route' => 'app_auth_validation', '_controller' => 'App\\Controller\\AuthController::validation'], null, ['POST' => 0], null, false, false, null]],
        '/auth/restorePasswordStepOne' => [[['_route' => 'app_auth_restorePasswordStepOne', '_controller' => 'App\\Controller\\AuthController::restorePasswordStepOne'], null, ['POST' => 0], null, false, false, null]],
        '/auth/restorePasswordStepTwo' => [[['_route' => 'app_auth_restorePasswordStepTwo', '_controller' => 'App\\Controller\\AuthController::restorePasswordStepTwo'], null, ['POST' => 0], null, false, false, null]],
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
                            .'|uments/([^/\\.]++)(?:\\.([^/]++))?(*:151)'
                        .')'
                        .'|c(?'
                            .'|ontexts/([^.]+)(?:\\.(jsonld))?(*:194)'
                            .'|a(?'
                                .'|rtessets/([^/\\.]++)(?:\\.([^/]++))?(*:240)'
                                .'|t(?'
                                    .'|egories(?'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(*:288)'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:314)'
                                        .')'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:352)'
                                        .')'
                                    .')'
                                    .'|alog/(?'
                                        .'|([^/]++)(?'
                                            .'|(*:381)'
                                        .')'
                                        .'|lvl1/(?'
                                            .'|([^/]++)(?'
                                                .'|(*:409)'
                                            .')'
                                            .'|lvl2/([^/]++)(?'
                                                .'|(*:434)'
                                            .')'
                                        .')'
                                    .')'
                                .')'
                            .')'
                        .')'
                        .'|s(?'
                            .'|end_orders(?'
                                .'|(?:\\.([^/]++))?(*:480)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:514)'
                            .')'
                            .'|ub_attributes(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:565)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:591)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:629)'
                                .')'
                            .')'
                        .')'
                        .'|attribute_mains(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:684)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:710)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:748)'
                            .')'
                        .')'
                        .'|histor(?'
                            .'|ies(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:799)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:825)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:863)'
                                .')'
                            .')'
                            .'|y_detaileds(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:913)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:939)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:977)'
                                .')'
                            .')'
                        .')'
                        .'|m(?'
                            .'|edia_objects(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1033)'
                                .'|(?:\\.([^/]++))?(*:1057)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1092)'
                                .'|(?:\\.([^/]++))?(*:1116)'
                            .')'
                            .'|igvans(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1161)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1188)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1227)'
                                .')'
                            .')'
                        .')'
                        .'|pr(?'
                            .'|ice_list(?'
                                .'|s(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1285)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:1312)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1351)'
                                    .')'
                                .')'
                                .'|_detaileds(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1401)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:1428)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1467)'
                                    .')'
                                .')'
                            .')'
                            .'|oduct(?'
                                .'|s(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1517)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:1544)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1583)'
                                    .')'
                                .')'
                                .'|_i(?'
                                    .'|mages(?'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1633)'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:1660)'
                                        .')'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:1699)'
                                        .')'
                                    .')'
                                    .'|nfos(?'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1743)'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:1770)'
                                        .')'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:1809)'
                                        .')'
                                    .')'
                                .')'
                            .')'
                        .')'
                        .'|user(?'
                            .'|s(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1860)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1887)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1926)'
                                .')'
                            .')'
                            .'|_infos(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1972)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1999)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:2038)'
                                .')'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:2080)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        43 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], null, null, false, true, null]],
        78 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        111 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        151 => [[['_route' => '_api_/documents/{documentNumber}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\Documents', '_api_operation_name' => '_api_/documents/{documentNumber}{._format}_get'], ['documentNumber', '_format'], ['GET' => 0], null, false, true, null]],
        194 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        240 => [[['_route' => '_api_/cartessets/{userExtId}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\Cartesset', '_api_operation_name' => '_api_/cartessets/{userExtId}{._format}_get'], ['userExtId', '_format'], ['GET' => 0], null, false, true, null]],
        288 => [[['_route' => '_api_/categories/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categories/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        314 => [
            [['_route' => '_api_/categories{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categories{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/categories{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categories{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        352 => [
            [['_route' => '_api_/categories/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categories/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/categories/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categories/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/categories/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Category', '_api_operation_name' => '_api_/categories/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        381 => [
            [['_route' => '_api_/catalog/{lvl1}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/catalog/{lvl1}_get_collection'], ['lvl1'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/catalog/{lvl1}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/catalog/{lvl1}_get'], ['lvl1'], ['GET' => 0], null, false, true, null],
        ],
        409 => [
            [['_route' => '_api_/catalog/lvl1/{lvl2}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/catalog/lvl1/{lvl2}_get_collection'], ['lvl2'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/catalog/lvl1/{lvl2}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/catalog/lvl1/{lvl2}_get'], ['lvl2'], ['GET' => 0], null, false, true, null],
        ],
        434 => [
            [['_route' => '_api_/catalog/lvl1/lvl2/{lvl3}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/catalog/lvl1/lvl2/{lvl3}_get_collection'], ['lvl3'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/catalog/lvl1/lvl2/{lvl3}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/catalog/lvl1/lvl2/{lvl3}_get'], ['lvl3'], ['GET' => 0], null, false, true, null],
        ],
        480 => [[['_route' => '_api_/send_orders{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\SendOrder', '_api_operation_name' => '_api_/send_orders{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        514 => [[['_route' => '_api_/send_orders/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\ApiResource\\SendOrder', '_api_operation_name' => '_api_/send_orders/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        565 => [[['_route' => '_api_/sub_attributes/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        591 => [
            [['_route' => '_api_/sub_attributes{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/sub_attributes{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        629 => [
            [['_route' => '_api_/sub_attributes/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/sub_attributes/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/sub_attributes/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SubAttribute', '_api_operation_name' => '_api_/sub_attributes/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        684 => [[['_route' => '_api_/attribute_mains/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AttributeMain', '_api_operation_name' => '_api_/attribute_mains/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        710 => [
            [['_route' => '_api_/attribute_mains{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AttributeMain', '_api_operation_name' => '_api_/attribute_mains{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/attribute_mains{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AttributeMain', '_api_operation_name' => '_api_/attribute_mains{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        748 => [
            [['_route' => '_api_/attribute_mains/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AttributeMain', '_api_operation_name' => '_api_/attribute_mains/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/attribute_mains/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AttributeMain', '_api_operation_name' => '_api_/attribute_mains/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/attribute_mains/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AttributeMain', '_api_operation_name' => '_api_/attribute_mains/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        799 => [[['_route' => '_api_/histories/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        825 => [
            [['_route' => '_api_/histories{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/histories{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        863 => [
            [['_route' => '_api_/histories/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/histories/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/histories/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\History', '_api_operation_name' => '_api_/histories/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        913 => [[['_route' => '_api_/history_detaileds/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        939 => [
            [['_route' => '_api_/history_detaileds{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/history_detaileds{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        977 => [
            [['_route' => '_api_/history_detaileds/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/history_detaileds/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/history_detaileds/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\HistoryDetailed', '_api_operation_name' => '_api_/history_detaileds/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1033 => [[['_route' => '_api_/media_objects/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1057 => [[['_route' => '_api_/media_objects{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        1092 => [[['_route' => '_api_/media_objects/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null]],
        1116 => [[['_route' => '_api_/media_objects{._format}_post', '_controller' => 'App\\Controller\\CreateMediaObjectAction', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\MediaObject', '_api_operation_name' => '_api_/media_objects{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        1161 => [[['_route' => '_api_/migvans/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1188 => [
            [['_route' => '_api_/migvans{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/migvans{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1227 => [
            [['_route' => '_api_/migvans/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/migvans/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/migvans/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Migvan', '_api_operation_name' => '_api_/migvans/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1285 => [[['_route' => '_api_/price_lists/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1312 => [
            [['_route' => '_api_/price_lists{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/price_lists{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1351 => [
            [['_route' => '_api_/price_lists/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/price_lists/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/price_lists/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceList', '_api_operation_name' => '_api_/price_lists/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1401 => [[['_route' => '_api_/price_list_detaileds/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1428 => [
            [['_route' => '_api_/price_list_detaileds{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/price_list_detaileds{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1467 => [
            [['_route' => '_api_/price_list_detaileds/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/price_list_detaileds/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\PriceListDetailed', '_api_operation_name' => '_api_/price_list_detaileds/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1517 => [[['_route' => '_api_/products/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1544 => [
            [['_route' => '_api_/products{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/products{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1583 => [
            [['_route' => '_api_/products/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/products/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Product', '_api_operation_name' => '_api_/products/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1633 => [[['_route' => '_api_/product_images/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1660 => [
            [['_route' => '_api_/product_images{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/product_images{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1699 => [
            [['_route' => '_api_/product_images/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/product_images/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductImages', '_api_operation_name' => '_api_/product_images/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1743 => [[['_route' => '_api_/product_infos/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1770 => [
            [['_route' => '_api_/product_infos{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/product_infos{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1809 => [
            [['_route' => '_api_/product_infos/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/product_infos/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/product_infos/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ProductInfo', '_api_operation_name' => '_api_/product_infos/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1860 => [[['_route' => '_api_/users/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1887 => [
            [['_route' => '_api_/users{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/users{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1926 => [
            [['_route' => '_api_/users/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1972 => [[['_route' => '_api_/user_infos/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1999 => [
            [['_route' => '_api_/user_infos{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/user_infos{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2038 => [
            [['_route' => '_api_/user_infos/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/user_infos/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/user_infos/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\UserInfo', '_api_operation_name' => '_api_/user_infos/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2080 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
