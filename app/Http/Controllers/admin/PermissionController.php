<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use Carbon\Carbon;

class PermissionController extends Controller
{
    public function index(){

        return view('admin.users.permission')->with([
            'permissions'=> Permission::paginate(4),


          ]);
    }


    protected function store(Request $request)
    {
        $request->validate([

            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255']


        ]);


        Permission::create([

            'name' => $request->input('name'),
            'code' => $request->input('code')



            ]);
             return redirect(route('admin.users.permission'))->with('message', sprintf('Permission Created!'));

             //return redirect()->action('admin\PermissionController@index')->with('message','Permission Created !');

    }

    public function delete($id)
    {

        $perm = Permission::findOrfail($id);

        $perm->delete();
        return redirect(route('admin.users.permission'))->with('message', sprintf('Permission Deleted!'));

        // return redirect()->action('admin\PermissionController@index')
        //     ->with('message', sprintf('Role "%s" deleted!', $perm->name));
    }




}
