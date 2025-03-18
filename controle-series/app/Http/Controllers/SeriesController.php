<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SeriesController
{
    public function index(Request $request): View {

        $series = [
        'Lost',
        'Peaky BLinders',
        'Xogum',
        ];

        return view('series.index')->with('series', $series);
    }

    public function create(Request $request): View {
        return view('series.create');
    }
}
