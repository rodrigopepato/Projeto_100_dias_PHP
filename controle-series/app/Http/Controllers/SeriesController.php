<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController
{
    public function index(Request $request) {

        $series = [
        'Lost',
        'Peaky BLinders',
        'Xogum',
        ];

        return view('listar-series', compact('series'));
    }
}
