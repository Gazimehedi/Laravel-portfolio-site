<?php

namespace App\Http\Controllers;

use App\Models\Main;
use Illuminate\Http\Request;
use File;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {
        return view('pages.dashboard');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['main'] = Main::first();
        return view('pages.main',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function show(Main $main)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function edit(Main $main)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $main = Main::find($id);
        $main->title = $request->title;
        $main->sub_title = $request->sub_title;
        if($request->hasFile('bg_image')){
            $path = 'uploads/main/'.$main->bg_image;
            if(File::exists($path)){
                File::delete($path);
            }
            $bg_image = $request->file('bg_image');
            $ext = $bg_image->getClientOriginalExtension();
            $bg_image_name = time().'.'.$ext;
            $bg_image->move('uploads/main/',$bg_image_name);
            $main->bg_image=$bg_image_name;
        }
        if($request->hasFile('resume')){
            $path = 'uploads/main/'.$main->resume;
            if(File::exists($path)){
                File::delete($path);
            }
            $resume = $request->file('resume');
            $ext = $resume->getClientOriginalExtension();
            $resume_name = time().'.'.$ext;
            $resume->move('uploads/main/',$resume_name);
            $main->resume=$resume_name;
        }
        $main->update();
        return redirect()->back()->with('success','Main Section has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function destroy(Main $main)
    {
        //
    }
}
