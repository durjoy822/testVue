<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AdminDashboardController extends Controller
{
      public function index()
    {
        return Inertia::render('Admin/Dashboard');
    }

    public function users()
{
    $users = User::latest()->get();

    return Inertia::render('Admin/Users/Index', [
        'users' => $users
    ]);
}

    public function settings()
    {
        return Inertia::render('Admin/Settings/Index');
    }

    public function userCreate(Request $request) {
        return Inertia::render('Admin/Users/UserCreate');
    }

    public function userStore(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|email|unique:users,email',
            'phone'             => 'nullable|string|max:20',
            'role'              => 'nullable|string|max:100',
            'password'          => 'required|min:6',
            'confirm_password'  => 'required|same:password',
            'status'            => 'required|string',
            'address'           => 'nullable|string',
            'joining_date'      => 'nullable|date',
            'avatar'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $avatarName = null;

        if ($request->hasFile('avatar')) {

            $avatar = $request->file('avatar');

            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();

            $avatar->move(public_path('uploads/users'), $avatarName);
        }

        User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'role'          => $request->role,
            'password'      => Hash::make($request->password),
            'status'        => $request->status,
            'address'       => $request->address,
            'joining_date'  => $request->joining_date,
            'avatar'        => $avatarName,
        ]);

        return redirect()
                ->route('admin.dashboard.users')
                ->with('success', 'User created successfully');
    }

    public function userEdit($id)
    {
        $user = User::findOrFail($id);

        return Inertia::render('Admin/Users/UserEdit', [
            'user' => $user
        ]);
    }

}
