<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Menu;
use App\Models\ActivityLog;
use Barryvdh\DomPDF\Facade\Pdf;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kelola_menu.menu', [
            'title' => 'Menu',
            'menus' => Menu::search()->paginate(7)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kelola_menu.buat_menu', [
            'title' => 'Buat Menu'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|unique:menus',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|file|max:1024'
        ]);

        $validatedData['gambar'] = $request->file('gambar')->store('gambar_menu');

        Menu::create($validatedData);
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity_name' => 'Membuat menu'
        ]);
        return redirect('/menu')->with('success', 'Menu berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('dashboard.kelola_menu.edit_menu', [
            'title' => 'Edit Menu',
            'menu' => $menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|file|max:1024'
        ]);

        Storage::delete($menu->gambar);
        $validatedData['gambar'] = $request->file('gambar')->store('gambar_menu');

        Menu::find($menu->id)->update($validatedData);
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity_name' => 'Mengupdate menu'
        ]);
        return redirect('/menu')->with('success', 'Menu berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->gambar);
        Menu::destroy($menu->id);
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity_name' => 'Menghapus menu'
        ]);
        return redirect('/menu')->with('success', 'Menu berhasil dihapus!');
    }

    public function export_menu()
    {
        $menu = Menu::all();
        $pdf = PDF::loadview('dashboard.pdf.menu_pdf', ['menus' => $menu]);
        return $pdf->stream();
    }
}
