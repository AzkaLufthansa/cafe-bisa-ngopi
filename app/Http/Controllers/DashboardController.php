<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:melihat-laporan-pendapatan', ['only' => ['laporan_pendapatan']]);
        $this->middleware('permission:melihat-log-aktivitas-pegawai', ['only' => ['log_aktivitas']]);
    }

    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard'
        ]);
    }

    public function laporan_pendapatan()
    {
        return view('dashboard.laporan_pendapatan', [
            'title' => 'Laporan Pendapatan',
            'pendapatan' => Transaksi::orderBy('tanggal')->filterTanggal()->get()
        ]);
    }

    public function log_aktivitas()
    {
        return view('dashboard.log_aktivitas', [
            'title' => 'Log Aktivitas Pegawai',
            'activities' => ActivityLog::with('user')->get()
        ]);
    }
}
