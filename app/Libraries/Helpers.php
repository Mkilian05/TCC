<?php

namespace App\Libraries;

use App\Models\User;

Class Helpers {

    public static function getRoleUser(int $userId)
    {
        return optional(User::find($userId)->roles->first())->description;
    }

}
