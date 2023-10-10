<?php

namespace App\Models;

use Spatie\Permission\Models\Role as Model;

class Role extends Model
{

    public function __toString()
    {
        return $this->name;
    }
}
