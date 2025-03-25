<?php

namespace App\Http\Controllers\direktur;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Direktur',
        ];
        return view('direktur.cabang.index', $data);
    }
}
