<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\Role;
use App\Services\UploadFileService;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct(protected UploadFileService $fileService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        // dd($request->all());
        $request->validated();

        $user = User::create(
            $request->safe()->only(['name', 'email']) +
            [
                'avatar' => $this->fileService->store($request->file('avatar'),
                'images/users'), 'password' => Hash::make($request->input('password'))
            ]
        );

        $user->addRoles($request->input('roles'));

        return redirect()->route('users.index')->with('success', trans('message.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $request->validated();

        $user->update(
            $request->safe()->only(['name', 'email']) +
                [
                    'avatar' => $request->hasFile('avatar') ? $this->fileService->update($request->file('avatar'), $user->avatar,'images/users') : $user->avatar,
                    'password' => !empty($request->input('password')) ? Hash::make($request->input('password')) : $user->password
                ]
        );

        $user->syncRoles($request->input('roles'));

        return redirect()->route('users.index')->with('success', trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', trans('message.delete'));
    }
}