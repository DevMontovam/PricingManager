<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    public function index()
    {
        return view(
            'municipality.index',
            [
                'municipalities' => Municipality::all(),
            ]
        );
    }
}
