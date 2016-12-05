<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class userActive extends Controller
{
    public function activate($input){
        DB::table('users')
            ->where('IDno', $input )
            ->update(['is_active' => 1]);
        return redirect()->back();
    }
    public function deactivate($input){
        DB::table('users')
            ->where('IDno', $input )
            ->update(['is_active' => 0]);
        return redirect()->back();
    }
}    
