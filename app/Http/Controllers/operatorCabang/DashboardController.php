<?php

namespace App\Http\Controllers\operatorCabang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Operator Cabang',
        ];
        return view('operatorCabang.dashboard.index', $data);
    }
}
