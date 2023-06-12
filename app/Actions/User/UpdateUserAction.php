<?php

namespace App\Actions\User;

use App\Models\User;

class UpdateUserAction
{
    public function execute($id):void
    {
        $user = User::where('id',$id)->firstOrFail();
        $cek_role = User::select(['role'])->first();
        if($cek_role->role == 1){
            $user->role = 0;
            $user->update();
        }else{
            $user->role = 1;
            $user->update();
        }
    }
}
