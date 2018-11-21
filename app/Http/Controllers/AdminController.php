<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\AdminUpdateRequest;
use App\Http\Requests\AdminAddRequest;
use App\Http\Repositorys\AdminDepot;

class AdminController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=Admin::all();
        // dd($users);
        return view('admin.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminAddRequest $request , AdminDepot $adminCode)
    {
        $adminCode->add($request);
        return redirect()->route('admin.index')->with('success','添加用户成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=Admin::find($id);
        return view('admin.show',compact('user'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=Admin::find($id);
        $this->authorize('update',$user);
        $user=Admin::find($id);
        return view('admin.edit',compact('user'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdateRequest $request,$id,AdminDepot $adminCode)
    { 
        $adminCode->update($request,$id);
        // session()->flash('success','更新数据成功');
        return redirect()->route('admin.index')->with('success','更新数据成功');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=Admin::find($id);
        $this->authorize('update',$user);
        Admin::destroy($id);
        session()->flash('success','删除用户成功');
        return back();
    }
}
