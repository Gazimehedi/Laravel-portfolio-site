<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $result['abouts']=About::all();
        return view('pages.about.about',$result);
    }

    public function manage($id=null)
    {
        //
        if($id!=""){
            $data = About::find($id);
            $result['image']=$data->image;
            $result['title1']=$data->title1;
            $result['title2']=$data->title2;
            $result['description']=$data->description;
            $result['id']=$data->id;
        }else{
            $result['image']='';
            $result['title1']='';
            $result['title2']='';
            $result['description']='';
            $result['id']='';
        }

        return view('pages.about.manage',$result);
    }
    public function manage_proccess(Request $request)
    {
        //
        if($request->id==""){
            $model = new About;
            $msg = "About create successfully";
        }else{
            $model = About::find($request->id);
            $msg = "About updated successfully";
        }
        if($request->hasFile('image')){
            if($request->id!=""){
                $path = 'uploads/about/'.$model->image;
                if(File::exists($path)){
                    File::delete($path);
                }
            }
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $image_name = time().'.'.$ext;
            $image->move('uploads/about/',$image_name);
            $model->image=$image_name;
        }
        $model->title1=$request->title1;
        $model->title2=$request->title2;
        $model->description=$request->description;
        $model->save();

        return redirect()->route('admin.about')->with('success',$msg);
    }
    public function delete($id)
    {
        //
        $path = 'uploads/about/'.$model->image;
        if(File::exists($path)){
            File::delete($path);
        }
        About::find($id)->delete();
        return redirect()->route('admin.about')->with('error','About deleted successfully');
    }
}
