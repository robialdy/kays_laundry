<?php

namespace App\Http\Controllers\kurir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Kurir',
        ];
        return view('kurir.dashboard.index', $data);
    }
}
