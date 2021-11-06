<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class PortfolioController extends Controller
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
    public function index()
    {

        $result['portfolios']=Portfolio::all();
        return view('pages.portfolio.portfolio',$result);
    }

    public function manage($id=null)
    {
        //
        if($id!=""){
            $data = Portfolio::find($id);
            $result['image']=$data->image;
            $result['name']=$data->name;
            $result['client']=$data->client;
            $result['category']=$data->category;
            $result['sub_title']=$data->sub_title;
            $result['description']=$data->description;
            $result['id']=$data->id;
        }else{
            $result['image']='';
            $result['name']='';
            $result['client']='';
            $result['category']='';
            $result['sub_title']='';
            $result['description']='';
            $result['id']='';
        }

        return view('pages.portfolio.manage',$result);
    }
    public function manage_proccess(Request $request)
    {
        //
        if($request->id==""){
            $model = new Portfolio;
            $msg = "Portfolio create successfully";
        }else{
            $model = Portfolio::find($request->id);
            $msg = "Portfolio updated successfully";
        }
        if($request->hasFile('image')){
            if($request->id!=""){
                $path = 'uploads/portfolio/'.$model->image;
                if(File::exists($path)){
                    File::delete($path);
                }
            }
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $image_name = time().'.'.$ext;
            $image->move('uploads/portfolio/',$image_name);
            $model->image=$image_name;
        }
        $model->name=$request->name;
        $model->client=$request->client;
        $model->category=$request->category;
        $model->sub_title=$request->sub_title;
        $model->description=$request->description;
        $model->save();
        
        return redirect()->route('admin.portfolio')->with('success',$msg);
    }
    public function delete($id)
    {
        //
        $path = 'uploads/portfolio/'.$model->image;
        if(File::exists($path)){
            File::delete($path);
        }
        Portfolio::find($id)->delete();
        return redirect()->route('admin.portfolio')->with('error','Portfolio deleted successfully');
    }
}
