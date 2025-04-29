<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Display a listing of users
    public function indexView()
    {
        $users = User::withTrashed()->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.users.index', compact('users'));
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('admin.pages.users.create');
    }

    // Store a newly created user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password_hash' => 'required|min:8',
            'full_name' => 'nullable|string|max:100',
            'phone_number' => 'nullable|string|max:20',
            'role' => ['required', Rule::in(['customer', 'admin'])],
        ]);

        $validated['id'] = Str::uuid();
        
        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Display the specified user
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Show the form for editing the specified user
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Update the specified user
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password_hash' => 'nullable|min:8',
            'full_name' => 'nullable|string|max:100',
            'phone_number' => 'nullable|string|max:20',
            'role' => ['required', Rule::in(['customer', 'admin'])],
        ]);

        // Only update password if it's provided
        if (empty($validated['password_hash'])) {
            unset($validated['password_hash']);
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Soft delete the specified user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    // Restore a soft-deleted user
    public function restore($id)
    {
        User::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('users.index')->with('success', 'User restored successfully.');
    }

    // Permanently delete a user
    public function forceDelete($id)
    {
        User::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('users.index')->with('success', 'User permanently deleted.');
    }
}
