<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userItem = User::findOrFail($id);

        $userItem->delete(); 
 
        return $userItem;
    }
}
