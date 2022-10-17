<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function me()
    {
        return json_encode([
            'nis' => '3103120138',
            'name' => 'Muhamad Rafli Al Farizqi',
            'phone' => '081234567890',
            'class' => 'XII RPL 4',
        ]);
    }
}
