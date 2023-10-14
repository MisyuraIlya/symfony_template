<?php

namespace App\Enum;

enum UsersTypes: string
{
    case USER = 'user';
    case AGENT = 'agent';
    case ADMIN = 'admin';
}