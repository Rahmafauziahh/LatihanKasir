<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {
        return view('dashboard.dashboard');
    }
    function admin()
    {
        return view('dashboard.dashboard');
    }
    function petugas()
    {
        echo "halo, selamat datang di halaman petugas";
        echo "<a href='/logout'>Logout >></a>";
    }
    function pimpinan()
    {
        echo "halo, selamat datang di halaman pimpinan";
        echo "<a href='/logout'>Logout >></a>";
    }
    
}
