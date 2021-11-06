<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
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

        $result['services']=Service::all();
        return view('pages.services.services',$result);
    }

    public function manage($id=null)
    {
        //
        if($id!=""){
            $data = Service::find($id);
            $result['title']=$data->title;
            $result['description']=$data->description;
            $result['icon']=$data->icon;
            $result['id']=$data->id;
        }else{
            $result['title']='';
            $result['description']='';
            $result['icon']='';
            $result['id']='';
        }

        return view('pages.services.manage',$result);
    }
    public function manage_proccess(Request $request)
    {
        //
        if($request->id==""){
            $model = new Service;
            $msg = "Service create successfully";
        }else{
            $model = Service::find($request->id);
            $msg = "Service updated successfully";
        }
        $model->title=$request->title;
        $model->description=$request->description;
        $model->icon=$request->icon;
        $model->save();
        
        return redirect()->route('admin.services')->with('success',$msg);
    }
    public function delete($id)
    {
        //
        Service::find($id)->delete();
        return redirect()->route('admin.services')->with('error','Service deleted successfully');
    }
}
