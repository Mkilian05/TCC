<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DynamicjsController extends Controller
{
    public function base()
    {
        $content = view('dynamicjs.base');
        return response($content, 200, [
            'Content-Type' => 'application/x-javascript;charset=UTF-8'
        ]);
    }

}
