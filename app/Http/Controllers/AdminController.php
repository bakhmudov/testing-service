<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function unverifiedUsers()
    {
        $unverifiedUsers = User::where('is_verified', false)->get();
        return view('admin.unverified-users', compact('unverifiedUsers'));
    }

    public function verifyUser(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|string|in:student,teacher,admin',
        ]);
        $user->is_verified = true;
        $user->save();

        // Удаляем временную роль "unverified" и назначем выбранную роль
        $user->removeRole('unverified');
        $user->assignRole($request->role);

        return redirect()->route('admin.unverified-users')->with('status', 'User verified successfully');
    }
}
