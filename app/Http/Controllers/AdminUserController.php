<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('id', 'username', 'email','created_at','updated_at')->get();

        return view('users.index')->with([
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('id', 'name')->get();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255',
            'password_confirmation' => 'required|same:password',
            'roles' => 'required',
            'checkbox' =>'required',
        ]);
        $validateData['password'] = Hash::make($validateData['password']);
        $users = User::create($validateData);
        $users->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success','User Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        $roles = Role::select('id', 'name')->get();
        return view('users.edit',compact('users','roles'));
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
        // $users = User::findOrFail($id);
        // $updateData = $request->validate([
        //     'username' => 'required|min:3|max:255|unique:users,username,'.$users->id,
        //     'email' => 'required|email:dns|unique:users,email,'.$users->id,
        //     'password' => 'required|min:8|max:255|confirmed|',
        // ]);
        // $updateData['password'] = Hash::make($updateData['password']);
        // User::whereId($id)->update($updateData);
        // return redirect()->route('users.index')->with('message','Users has been updated');
        $this->validate($request, [
            'username' => 'required|min:3|max:255|unique:users,username,'.$id,
            'email' => 'required|email:dns|unique:users,email,'.$id,
            'password' => 'required|min:8|max:255|confirmed|',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $users = User::find($id);
        $users->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $users->assignRole($request->input('roles'));
        return redirect()->route('users.index')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('users.index')->with('message','Users has been deleted');
    }
}
