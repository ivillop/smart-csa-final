<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccessController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('access.index', compact('users'));
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|string|in:user,Sekretaris,Ketua-UKM,BEM,Kemahasiswaan,BAU',
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('access.index')->with('success', 'User role updated successfully.');
    }
}
