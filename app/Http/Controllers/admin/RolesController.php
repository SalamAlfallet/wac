<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Download;
use App\Role;
use Storage;
use Carbon\Carbon;

class RolesController extends Controller
{
    public function index(){

        return view('admin.users.role')->with([
            'roles'=> Role::paginate(4),


          ]);
    }


    protected function store(Request $request)
    {
        $request->validate([

            'name' => ['required', 'string', 'max:255']


        ]);


        Role::create([

            'name' => $request->input('name')


            ]);
             return redirect(route('admin.users.roles'))->with('message', sprintf('Role Created!'));

            //  return redirect()->action('admin\RolesController@index')->with('message','Role Created !');

    }

    public function delete($id)
    {

        $role_D = Role::findOrfail($id);

        $role_D->delete();
        return redirect(route('admin.users.roles'))->with('message', sprintf('Role Deleted!'));

        // return redirect()->action('admin\RolesController@index')
        //     ->with('message', sprintf('Role "%s" deleted!', $role_D->name));
    }




}
