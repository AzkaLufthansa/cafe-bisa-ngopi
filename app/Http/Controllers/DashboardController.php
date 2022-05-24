<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard'
        ]);
    }

    // Method Kasir
    public function catatan_transaksi()
    {
        return view('dashboard.catatan_transaksi', [
            'title' => 'Catatan Transaksi'
        ]);
    }

    // Method Manajer
    public function kelola_menu()
    {
        return view('dashboard.kelola_menu', [
            'title' => 'Kelola Menu'
        ]);
    }

    // Method Admin
    public function kelola_user()
    {
        return view('dashboard.kelola_user', [
            'title' => 'Kelola User'
        ]);
    }
}
