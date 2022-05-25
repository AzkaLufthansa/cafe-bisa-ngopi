<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard'
        ]);
    }

    public function catatan_transaksi()
    {
        return view('dashboard.catatan_transaksi', [
            'title' => 'Catatan Transaksi'
        ]);
    }

    public function laporan_pendapatan()
    {
        return view('dashboard.laporan_pendapatan', [
            'title' => 'Laporan Pendapatan'
        ]);
    }

    public function log_aktivitas()
    {
        return view('dashboard.log_aktivitas', [
            'title' => 'Log Aktivitas Pegawai'
        ]);
    }
}
