<?php

namespace App\Http\Controllers\pelaksanaCabang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Pelaksana Cabang',
        ];
        return view('pelaksanaCabang.dashboard.index', $data);
    }
}
