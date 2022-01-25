<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', 'customer')->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for approving the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        $user = User::findOrFail($id);

        if (!$user->approved) {
            $user->approved = true;
            $user->save();

            return redirect(route('admin.users.all'))->with([
                'redir_data' => [
                    'error' => false,
                    'message' => $user->name . ' successfully approved.'
                ]
            ]);
        } else {
            return redirect(route('admin.users.all'))->with([
                'redir_data' => [
                    'error' => false,
                    'message' => $user->name . ' already approved.'
                ]
            ]);
        }
    }
}
