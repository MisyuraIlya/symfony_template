<?php

namespace App\Enum;

enum UsersTypes: string
{
    case USER = '[ROLE_USER]';
    case AGENT = '[ROLE_AGENT]';
    case ADMIN = '[ROLE_ADMIN]';
}