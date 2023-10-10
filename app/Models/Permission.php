<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as Model;

class Permission extends Model
{

    public function __toString()
    {
        return $this->name;
    }
}
