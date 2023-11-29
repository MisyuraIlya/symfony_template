<?php

namespace App\Erp\Enums;

enum PriorityEnums: string
{
    case USERS = 'CUSTOMERS?$expand=CUSTPERSONNEL_SUBFORM,CUSTDISCOUNT_SUBFORM,CUSTPLIST_SUBFORM';
    case PRODUCTS = 'LOGPART';
    case CATEGORIES = 'FAMILIYLOG';
}
