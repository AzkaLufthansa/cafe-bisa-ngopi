<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Transaksi;
use App\Models\ActivityLog;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:transaksi-pemesanan-makanan', ['only' => ['buat_transaksi', 'store', 'get_harga']]);
        $this->middleware('permission:melihat-catatan-transaksi', ['only' => ['index']]);
    }
    
    public function index()
    {
        return view('dashboard.transaksi', [
            'title' => 'Catatan Transaksi',
            'transaksi' => Transaksi::latest()->search()->paginate(7)->withQueryString()
        ]);
    }

    public function buat_transaksi()
    {
        return view('dashboard.buat_transaksi', [
            'title' => 'Buat Transaksi',
            'menus' => Menu::all()
        ]);
    }
    
    public function get_harga(Menu $menu)
    {
        return $menu->harga;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'nama_pelanggan' => 'required',
            'nama_menu' => 'required',
            'jumlah' => 'required|numeric|gt:0',
            'total_harga' => 'required'
        ]);

        $menu = Menu::find($request->nama_menu);
        $validatedData['nama_menu'] = $menu->nama;
        $validatedData['nama_kasir'] = $request->nama_kasir;
        $validatedData['total_harga'] = str_replace(',', '', $request->total_harga);

        Transaksi::create($validatedData);

        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity_name' => 'Membuat transaksi'
        ]);

        return redirect('/transaksi')->with('success', 'Transaksi berhasil dibuat!');
    }

    public function export_transaksi()
    {
        $transaksi = Transaksi::latest()->get();
        $pdf = PDF::loadview('dashboard.pdf.transaksi_pdf',['transaksi' => $transaksi]);
        return $pdf->stream();
    }
}
