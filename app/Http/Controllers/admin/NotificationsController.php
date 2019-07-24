<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Download;
use App\User;
use Storage;
use Carbon\Carbon;
use Auth;

class NotificationsController extends Controller
{
    public function index(){
$user=Auth::user();
        return view('admin.notifications')->with([
            'notifications'=>$user->notifications,


          ]);
    }


}
