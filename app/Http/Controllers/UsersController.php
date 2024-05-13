<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function getAllUsers()
    {
        // $users = User::get();
        $users = User::paginate(20);

        return view('admin.users.view', compact('users'));
    }

    public function viewUsersChart()
    {
        $current_month_users = User::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->count();
        $last_month_users = User::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->startOfMonth()->subMonth(1)->endOfMonth())->count();
        $last_month_but_one_users = User::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->startOfMonth()->subMonth(2)->endOfMonth())->count();
        $last_month_but_two_users = User::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->startOfMonth()->subMonth(3)->endOfMonth())->count();
        $last_month_but_three_users = User::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->startOfMonth()->subMonth(4)->endOfMonth())->count();
        $last_month_but_four_users = User::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->startOfMonth()->subMonth(5)->endOfMonth())->count();
        return view('admin.users.usersChart', compact(['current_month_users', 'last_month_users', 'last_month_but_one_users', 'last_month_but_two_users', 'last_month_but_three_users', 'last_month_but_four_users']));
    }

    public function getAssignRole($user_id)
    {
        $user = User::whereId($user_id)->first();

        return view('admin.users.assign', compact('user'));
    }

    public function getRemoveRole($user_id)
    {
        $user = User::whereId($user_id)->first();

        return view('admin.users.remove', compact('user'));
    }

    public function assignRole(Request $request, $user_id)
    {
        $this->validate($request, [
            'role' => 'required',
        ]);

        $user = User::whereId($user_id)->first();

        $role_name = $request->input('role');

        $role = Role::whereName($role_name)->first();

        if (!$user->hasRole($role_name)) {

            $user->assignRole($role);
        } else {

            return redirect()->back()->with('error', "Sorry, this role is already assigned to the user!");
        }
        return redirect('users')->with('success-message', 'The role has been successfully assigned...');
    }

    public function removeRole(Request $request, $user_id)
    {
        $this->validate($request, [
            'role' => 'required',
        ]);

        $user = User::whereId($user_id)->first();

        $role_name = $request->input('role');

        $role = Role::whereName($role_name)->first();

        if ($user->hasRole($role_name)) {

            $user->removeRole($role);
        } else {

            return redirect()->back()->with('error', "Sorry, this user does not have that role assigned to them!");
        }

        return redirect('users')->with('success-message', 'The role has been successfully removed...');
    }

    public function search(Request $request)
    {
        $this->validate(
            $request,
            [
                'search' => 'required|min:1',
            ],
            [
                'search.required' => 'You need to search a user.',
            ]
        );

        $query = $request->input('search');

        $users = User::where('name', 'LIKE', '%' . $query . '%')
            ->orwhere('lastname', 'LIKE', '%' . $query . '%')
            ->orwhere('email', 'LIKE', '%' . $query . '%')
            ->paginate(20);

        return view('admin.users.view', compact('users'));
    }
}
