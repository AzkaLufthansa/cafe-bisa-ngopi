<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
            'pendapatan' => Transaksi::orderBy('tanggal')->filterTanggal()->paginate(7)->withQueryString()
        ]);
    }

    public function ubah_periode()
    {
        return view('dashboard.ubah_periode', [
            'title' => 'Ubah Periodi'
        ]);
    }

    public function log_aktivitas()
    {
        return view('dashboard.log_aktivitas', [
            'title' => 'Log Aktivitas Pegawai',
            'activities' => ActivityLog::with('user')->search()->paginate(7)->withQueryString()
        ]);
    }

    public function export_pendapatan()
    {
        $pendapatan = Transaksi::latest()->get();
        $pdf = PDF::loadview('dashboard.pdf.pendapatan_pdf', ['pendapatan' => $pendapatan]);
        return $pdf->stream();
    }

    public function export_log()
    {
        $activities = ActivityLog::latest()->get();
        $pdf = PDF::loadview('dashboard.pdf.log_pdf', ['activities' => $activities]);
        return $pdf->stream();
    }
}
