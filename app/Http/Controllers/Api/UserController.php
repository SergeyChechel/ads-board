<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\StoreUserRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(5);
        return response()->json([
            'data' => UserResource::collection($users),
            'links' => [
                'first' => $users->url(1),
                'last' => $users->url($users->lastPage()),
                'prev' => $users->previousPageUrl(),
                'next' => $users->nextPageUrl(),
            ],
            'meta' => [
                'current_page' => $users->currentPage(),
                'from' => $users->firstItem(),
                'last_page' => $users->lastPage(),
                'path' => $users->path(),
                'per_page' => $users->perPage(),
                'to' => $users->lastItem(),
                'total' => $users->total(),
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
{
    $validatedData = $request->validated();

    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'firstname' => $validatedData['firstname'] ?? null,
        'lastname' => $validatedData['lastname'] ?? null,
        'middlename' => $validatedData['middlename'] ?? null,
        'birthday' => $validatedData['birthday'] ?? null,
        'role_id' => $validatedData['role_id'] ?? null,
        'address' => $validatedData['address'] ?? null,
        'phone' => $validatedData['phone'] ?? null,
        'status' => $validatedData['status'] ?? null,
    ]);

    return new UserResource($user);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $request->validated();
        $user->update($request->only([
            'name',
            'email',
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'firstname',
            'lastname',
            'middlename',
            'birthday',
            'role_id',
            'address',
            'phone',
            'status',
        ]));

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
