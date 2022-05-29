<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ActivityLog;
use Spatie\Permission\Models\Role;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kelola_user.user', [
            'title' => 'Kelola User',
            'users' => User::search()->paginate(7)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kelola_user.buat_user', [
            'title' => 'Buat User',
            'roles' => Role::all()
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
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);
        $user->assignRole($request->role);
        
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity_name' => 'Membuat user'
        ]);

        return redirect('/user')->with('success', 'User berhasil dibuat!');
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
    public function edit(User $user)
    {
        return view('dashboard.kelola_user.edit_user', [
            'title' => 'Edit User',
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns'
        ]);

        User::find($user->id)
                      ->update($validatedData);
        $user->syncRoles($request->role);
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity_name' => 'Mengupdate user'
        ]);
        return redirect('/user')->with('success', 'User berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity_name' => 'Menghapus user'
        ]);
        return redirect('/user')->with('success', 'User berhasil dihapus!');
    }

    public function export_user()
    {
        $users = User::all();
        $pdf = PDF::loadview('dashboard.pdf.user_pdf', ['users' => $users]);
        return $pdf->stream();
    }
}
