<?php

namespace App\Http\Controllers;
use App\urbanModel;
use Illuminate\Http\Request;

class TheController extends Controller
{
    public function index()
    {
        return view('uploadform');
    }

    public function store(Request $request)
    {
        $upload =new urbanModel();
        $upload->docName = $request->input('docName');
        $upload->userId = $request->input('userId');
        $upload->event = $request->input('event');
        
        if ($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/files/',$filename);
            $upload->file = $filename;
        } else {
            return $request;
            $upload->file = '';
        }
        $upload->save();
        return view('success')->with('success',$filename);
    }

    public function table()
    {
        $upload = urbanModel::all();
        return view('warehouse')->with('upload',$upload);
    }

    public function type()
    {
        if ($type="form-image"){
        echo "image";
        }
        else if($type="form-doc"){
        echo "doc";
        }
        else if($type="form-exel"){
        echo "exel";
        }
        else if($type="form-pdf"){
        echo "pdf";

        return view('choosetype')->with('choosetype',$filename);
    }
}
    
}
