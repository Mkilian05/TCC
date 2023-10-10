<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PreCadastro;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getCountPost()
    {
        return Post::all()->count();
    }

    public function getCountUser()
    {
        return User::all()->count();
    }

    public function getCountPreCadastro()
    {
        return PreCadastro::all()->count();
    }
}
