<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Carbon\Carbon;
use App\PermissionRole;

class PermissionRoleController extends Controller
{
    public function index()
    {

        return view('admin.users.permissionRole')->with([
            'permissions' => Permission::get(),

            'roles' => Role::get(),

        ]);
    }


    protected function store(Request $request)
    {

        $request->validate([

            'role_id' => 'required',
            'permission_id' => 'required'


        ]);



        $role_id = $request->input('role_id');

        $perm = $request->input('permission_id');

        foreach ($perm as $item) {

            $perm_role = new PermissionRole();
            $perm_role->permission_id = $item;
            $perm_role->role_id = $role_id;
            $perm_role->save();
        }







        // return $perm_role;

        return redirect()->action('admin\PermissionController@index')->with('message','Permission Created !');

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
