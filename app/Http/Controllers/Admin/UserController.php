<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // You can paginate if there are many users
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'], // only letters and spaces
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                       'role' => 'required|in:admin,staff,customer',
        'password' => [
            'required',
            'confirmed',
            Password::min(8)
                ->mixedCase() // at least one upper and one lower case
                ->letters()   // ensure letters
                ->numbers(),  // ensure numbers
        ],
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'customer', // Default role
    ]);
        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'], // only letters and spaces
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                       'role' => 'required|in:admin,staff,customer',
        'password' => [
            'required',
            'confirmed',
            Password::min(8)
                ->mixedCase() // at least one upper and one lower case
                ->letters()   // ensure letters
                ->numbers(),  // ensure numbers
        ],
    ]);

        $user = User::findOrFail($id);
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}
