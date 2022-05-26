<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Transaksi;
use App\Models\ActivityLog;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('dashboard.transaksi', [
            'title' => 'Catatan Transaksi',
            'transaksi' => Transaksi::all()
        ]);
    }

    public function buat_transaksi()
    {
        return view('dashboard.buat_transaksi', [
            'title' => 'Buat Transaksi',
            'menus' => Menu::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'nama_pelanggan' => 'required',
            'nama_menu' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        $validatedData['total_harga'] = $request->total_harga;
        $validatedData['nama_kasir'] = $request->nama_kasir;

        Transaksi::create($validatedData);

        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity_name' => 'Membuat transaksi'
        ]);

        return redirect('/transaksi')->with('success', 'Transaksi berhasil dibuat!');
    }
}
