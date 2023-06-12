<?php

namespace App\Actions\User;

use App\Models\User;

class DeleteUserAction
{
    public function execute($slug){

        $user = User::where('slug',$slug)->firstOrFail();
        $user->delete();
    }
}
