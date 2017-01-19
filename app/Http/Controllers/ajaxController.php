<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Auth;
use Input;

class HomeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('welcome');
    }

    public function announcements() {
        $data = DB::table('users')
                ->join('announcementNotif', 'users.IDno', '=', 'announcementNotif.creator_IDno')
//                ->join('is_readTB', 'announcementNotif.anID', '=', 'is_readTB.announcementID')
                ->where('announcementNotif.is_approved', '=', 1)
                ->where('announcementNotif.type', '=', 0)
                ->where('announcementNotif.status', '=', 1)
                ->where('announcementNotif.recipient_userLevel', '=', 0)
                ->orderBy('announcementNotif.created_at', 'desc')
                ->simplePaginate(20);
        return Response::json($data);
    }
}
