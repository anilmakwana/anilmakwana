<?php

namespace App\Modules\Catagory\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Catagory\Models\category;
use Illuminate\Http\Request;
use App\Http\Requests\CatagoryRequest;
use Crypt;


class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Catagory::addcatagory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatagoryRequest $request)
    {
        // dd('gg');
        $res=new category;
        $res->category=$request->input('category');
        $res->status=$request->input('status');
        $res->save();

        $errors= "";
        $msg ="saved success.";
       
       flashMessage('success',$msg);

        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        $result=category::where('trash','Y')->get();
        // dd($result);
        return view('Catagory::index',compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category,Request $request,$id)
    {
        $edit_id=Crypt::decrypt($id);
        
        $edit=category::find($edit_id);
        
        return view('Catagory::catagory_upd',compact('edit'));
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CatagoryRequest $request, category $category)
    {
        $input=$request->all();
        $id=$input['id'];
        $res=category::find($id);
        $res->category=$input['category'];
        $res->status=$input['status'];
        $res->save();
        
        $errors= "";
        $msg ="saved success.";
       
       flashMessage('success',$msg);

        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]); 

     }
    public function status(Request $request)
    {
         $status=$request->input('status');
        $status_id=$request->input('status_id');
        $res=category::find($status_id);
        if ($status=='Y') {
            $res->status='N';
            $res->save();
            // dd($res->save());
        }else{
            $res->status='Y';
            $res->save();
        }
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category,Request $request)
    {
        $del_id=$request->input('del_id');
        $res=category::find($del_id);
        $res->trash='T';
        $res->save();
    }
}
