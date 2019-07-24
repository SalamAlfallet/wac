<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Download;
use App\User;
use Storage;
use Carbon\Carbon;
use App\Role;
use Auth;

class UsersController extends Controller
{
    public function index()
    {
//         $user=Auth::user();
//         //dd($user);
// ;$count= $user->hasPerm('add_posts');
// dd($count);
        return view('admin.users.index')->with([
            'users' => User::paginate(),


        ]);
    }
    public function create()
    {

        return view('admin.users.create')->with([

            'roles' => Role::all(),

        ]);
    }

    protected function store(Request $request)
    {


        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avater' => ['image'],
            'role_id' =>['required']


        ]);

        if ($request->hasFile('avater')) {
            $avater = $request->file('avater')->store('avaters', 'public');
        } else {
            $avater = null;
        }
        $birthday = Carbon::createFromFormat('m/d/Y', $request->input('birthday'));

        User::create([
            'username' => $request->input('username'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'birthday' => $birthday->format('Y-m-d'),
            'country' => $request->input('country'),
            'avater' => $avater,
            'role_id'=> $request->input('role_id'),
            'admin'=> '2'

        ]);
        return redirect(route('admin.users'))->with('message', sprintf('user Created!'));

        // return redirect()->action('admin\UsersController@index')->with('message','user Created !');

    }
}
