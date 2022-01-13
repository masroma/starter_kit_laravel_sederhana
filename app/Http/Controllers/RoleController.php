<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Exception;
use Hash;
use DataTables;
use GroupPermissionModel;
use Illuminate\Support\Arr;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
class RoleController extends Controller
{
        /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    function __construct()

    {

         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);

         $this->middleware('permission:role-create', ['only' => ['create','store']]);

         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:role-delete', ['only' => ['destroy']]);

    }



    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    use ValidatesRequests;
    public function data(){
        try{
            $data = Role::all();
            return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
        } catch (Exception $e) {
            DB::commit();
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()
                ]
            );
        }
    }
    public function index()
    {
        return view('role.index');
    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()
    {

        $permission = Permission::get()->chunk(4);
        return view('role.create',compact('permission'));

    }


    public function store(Request $request)

    {

        $this->validate($request, [

            'name' => 'required|unique:roles,name',
            'permission' => 'required',

        ]);

        $role = Role::create(['name' => $request->input('name')]);

        $role->syncPermissions($request->input('permission'));

        if ($role) {
            //redirect dengan pesan sukses
            return redirect()->route('role.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('role.index')->with(['error' => 'Data Gagal Disimpan!']);
        }





    }

    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $role = Role::find($id);

        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")

            ->where("role_has_permissions.role_id",$id)

            ->get();



        return view('roles.show',compact('role','rolePermissions'));

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $role = Role::find($id);
        $permission = Permission::get()->chunk(4);

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('role.edit',compact('role','permission','rolePermissions'));

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        $this->validate($request, [

            'name' => 'required',
            'permission' => 'required',

        ]);



        $role = Role::find($id);

        $role->name = $request->input('name');

        $role->save();

        $role->syncPermissions($request->input('permission'));

        if ($role) {
            //redirect dengan pesan sukses
            return redirect()->route('role.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('role.index')->with(['error' => 'Data Gagal Diupdate!']);
        }


    }

    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $delete = DB::table("roles")->where('id',$id)->delete();


        if ($delete) {
            //redirect dengan pesan sukses
            return redirect()->route('role.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('role.index')->with(['error' => 'Data Gagal Disimpan!']);
        }


    }
}
