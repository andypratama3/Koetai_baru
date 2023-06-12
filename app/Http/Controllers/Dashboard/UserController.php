<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\User\DeleteUserAction;

class UserController extends Controller
{
    public function index(){
        $no = 0;
        $users = User::select(['name','email','created_at','updated_At'])->firstOrFail()->get();
        return view('dashboard.user.index', compact('users','no'));
    }

    // public function update(Request $request, $id){

    //     $user = User::where('id', $id)->select(['name','email','created_at','updated_At'])->firstOrFail()->get();
    //     $user->role = "1";
    //     $user->update();
    //     return redirect()->route('dashboard.user.index')->with('success-update','Role Berhasil di Ganti');
    // }
    public function destroy(DeleteUserAction $DeleteUserAction ,$id){

        $DeleteUserAction->execute($id);

        return redirect()->route('dashboard.user.index')->with('success-delete','User Berhasil Di hapus');
    }


}
