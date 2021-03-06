<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function get(Request $request, int $id)
    {
        $user = User::find($id);

        $userPostedResourcesName = null;
        $userPostedResources = null;

        if($user)
        {
            $userPostedResourcesName = $this->userService->userPostedResourcesName($request->get('data-to-display'));

            $userPostedResources = $this->userService->userPostedResources($userPostedResourcesName, $user);
        }

        return view('user.get', [
            'user' => $user,
            'userPostedResourcesName' => $userPostedResourcesName,
            'userPostedResources' => $userPostedResources
        ]);
    }

    public function edit(int $id)
    {
        Gate::authorize(
            'userUpdate',
            $user = User::find($id)
        );

        return view('user.edit', ['user' => $user]);
    }

    public function update(UpdateProfileRequest $request, int $id)
    {
        Gate::authorize(
            'userUpdate',
            $user = User::find($id)
        );

        $this->userService->update($request->all(), $user);

        return redirect()
            ->route('user.get', ['id' => $user->id])
            ->with('profile-update-success', 'Profile has been updated successful');
    }

    public function list()
    {
        Gate::authorize('userList', User::class);

        $users = User::all();

        return view('user.list', ['users' => $users]);
    }
}
