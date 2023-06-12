<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\User\DeleteUserAction;
use App\Actions\User\UpdateUserAction;

class UserController extends Controller
{
    public function index(){
        $limit = 10;
        $users = User::select(['name','email','created_at','updated_At'])->firstOrFail()->paginate($limit);
        $count = $users->count();
        $no = $limit * ($users->currentPage() - 1);

        return view('dashboard.user.index', compact('users','no'));
    }

    public function show(UpdateUserAction $updateUserAction ,$id){

        $updateUserAction->execute($id);
        return redirect()->route('dashboard.user.index')->with('success-update','Role Berhasil di Ganti');
    }

    public function destroy(DeleteUserAction $DeleteUserAction ,$slug){

        $DeleteUserAction->execute($slug);
        return redirect()->route('dashboard.user.index')->with('success-delete','User Berhasil Di hapus');
    }


}
