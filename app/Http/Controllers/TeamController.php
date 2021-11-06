<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $result['teams']=Team::all();
        return view('pages.team.team',$result);
    }

    public function manage($id=null)
    {
        //
        if($id!=""){
            $data = Team::find($id);
            $result['image']=$data->image;
            $result['name']=$data->name;
            $result['dasignation']=$data->dasignation;
            $result['fb_link']=$data->fb_link;
            $result['tw_link']=$data->tw_link;
            $result['in_link']=$data->in_link;
            $result['id']=$data->id;
        }else{
            $result['image']='';
            $result['name']='';
            $result['dasignation']='';
            $result['fb_link']='';
            $result['tw_link']='';
            $result['in_link']='';
            $result['id']='';
        }

        return view('pages.team.manage',$result);
    }
    public function manage_proccess(Request $request)
    {
        //
        if($request->id==""){
            $model = new Team;
            $msg = "Team create successfully";
        }else{
            $model = Team::find($request->id);
            $msg = "Team updated successfully";
        }
        if($request->hasFile('image')){
            if($request->id!=""){
                $path = 'uploads/team/'.$model->image;
                if(File::exists($path)){
                    File::delete($path);
                }
            }
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $image_name = time().'.'.$ext;
            $image->move('uploads/team/',$image_name);
            $model->image=$image_name;
        }
        $model->name=$request->name;
        $model->dasignation=$request->dasignation;
        $model->fb_link=$request->fb_link;
        $model->tw_link=$request->tw_link;
        $model->in_link=$request->in_link;
        $model->save();

        return redirect()->route('admin.team')->with('success',$msg);
    }
    public function delete($id)
    {
        $model = Team::find($id);
        $path = 'uploads/team/'.$model->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $model->delete();
        return redirect()->route('admin.team')->with('error','Team deleted successfully');
    }
}
