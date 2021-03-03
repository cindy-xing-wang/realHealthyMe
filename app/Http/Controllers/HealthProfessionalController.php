<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HealthProfessionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = User::where('role_id','!=',3)->get();
        return view('admin.healthProfessional.index',compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.healthProfessional.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateStore($request);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $name = (new User)->userAvatar($request);
            $data['image'] = $name;
        }

        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->back()->with('message','Staff added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = User::find($id);
        return view('admin.healthProfessional.delete', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = User::find($id);
        return view('admin.healthProfessional.edit', compact('staff'));
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
        $this->validateUpdate($request, $id);
        $data = $request->all();
        $staff = User::find($id);
        $imageName = $staff->image;
        $staffPassword = $staff->password;
        if ($request->hasFile('image')) {
            $imageName = (new User)->userAvatar($request);
            if ($staff->image != null) {
                unlink(public_path('images/'.$staff->image));
            }
        }
        $data['image'] = $imageName;

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }else{
            $data['password'] = $staffPassword;
        }

        $staff->update($data);
        return redirect()->route('healthProfessional.index')->with('message', 'Staff info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->id == $id){
            return redirect()->route('healthProfessional.index')->with('message','Not able to delete yourself');
       }
       $user = User::find($id);
       $userDelete = $user->delete();
       if($userDelete && $user->image != null){
        unlink(public_path('images/'.$user->image));
       }
        return redirect()->route('healthProfessional.index')->with('message','Staff deleted successfully');

    }

    public function validateStore(Request $request){
        // dd($request);
        return  $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:8|max:25',
            'gender'=>'required',
            'education'=>'required',
            'address'=>'required',
            'specialist'=>'required',
            'phone'=>'required|numeric',
            'image'=>'mimes:jpeg,jpg,png',
            'role_id'=>'required',
            // 'description'=>'required'

       ]);
    }
    
       public function validateUpdate(Request $request, $id){
        return  $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$id,
            'gender'=>'required',
            'education'=>'required',
            'address'=>'required',
            'specialist'=>'required',
            'phone'=>'required|numeric',
            'image'=>'mimes:jpeg,jpg,png',
            'role_id'=>'required',
            // 'description'=>'required'

       ]);
    }
}
