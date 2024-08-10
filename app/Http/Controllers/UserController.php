<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function index()
  {
    $users = User::get();

    return view('user.index', ['users' => $users]);
  }

  public function create()
  {
    return view('user.create');
  }

  public function store(Request $request)
  {
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->route('user')->with('message', 'Data berhasil ditambah');
  }

  public function edit($id)
  {
    $user = User::find($id);
    
    return view('user.edit', ['user' => $user]);
  }

  public function update(Request $request, $id)
  {
    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    if ($request->password) {
      $user->password = Hash::make($request->password);
    }
    $user->save();

    return redirect()->route('user')->with('message', 'Data berhasi diperbaharui');
  }

  public function delete($id)
  {
    $user = User::find($id);
    $user->delete();

    return redirect()->route('user')->with('message', 'Data berhasil dihapus');
  }
}
