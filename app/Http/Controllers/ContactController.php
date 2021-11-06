<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
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
        //
        $result['contacts'] = Contact::all();
        return view('pages.contact',$result);
    }
    public function store_message(Request $request)
    {
        //
        $model = new Contact;
        $model->name=$request->name;
        $model->email=$request->email;
        $model->phone=$request->phone;
        $model->description=$request->description;
        $model->save();
        $msg = "Message send successfully";
        return response()->json(['type'=>'success','success'=>$msg]);
    }
    public function delete($id)
    {
        //
        Contact::find($id)->delete();
        return redirect()->route('admin.contact')->with('error','Contact deleted successfully');
    }
}
