<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Document;

class DocumentController extends Controller
{
    public function index_pdf()
    {
        return view('archive.uploadform_pdf');
    }
//------------------------------------------------------------------------------------------------------------------
    public function index_doc()
    {
        return view('archive.uploadform_doc');
    }
//------------------------------------------------------------------------------------------------------------------
    public function index_exel()
    {
        return view('archive.uploadform_exel');
    }
//------------------------------------------------------------------------------------------------------------------
    public function index_images()
    {
        return view('archive.uploadform_images');
    }
//------------------------------------------------------------------------------------------------------------------
public function index_videos()
{
    return view('archive.uploadform_videos');
}
//------------------------------------------------------------------------------------------------------------------
    public function index_choose()
    {
        return view('choosetype');
    }
//------------------------------------------------------------------------------------------------------------------


    public function storepdf(Request $request)
    {
        $upload =new Document();
        $upload->document_name = $request->input('docName');
        $upload->location = "not specified yet";
        $upload->type = "pdf";
        $upload->created_by = $request->input('userId');
        $upload->event = $request->input('event');
        $upload->p_member = $request->input('permissionmember') != null ? true : false;
        $upload->p_visitor = $request->input('permissionvisitor') != null ? true : false;

        if ($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/files/pdf',$filename);
            $upload->file = $filename;
        } else {
            return $request;
            $upload->file = '';
        }
        $upload->save();
        return view('success')->with('success',$upload);
    }

//------------------------------------------------------------------------------------------------------------------
    public function storedoc(Request $request)
    {
        $upload =new Document();
        $upload->document_name = $request->input('docName');
        $upload->location = "not specified yet";
        $upload->type = "doc";
        $upload->created_by = $request->input('userId');
        $upload->event = $request->input('event');
        $upload->p_member = $request->input('permissionmember') != null ? true : false;
        $upload->p_visitor = $request->input('permissionvisitor') != null ? true : false;

        if ($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/files/doc',$filename);
            $upload->file = $filename;
        } else {
            return $request;
            $upload->file = '';
        }
        $upload->save();
        return view('success')->with('success',$filename);
    }
//------------------------------------------------------------------------------------------------------------------
    public function storeexel(Request $request)
    {
        $upload =new Document();
        $upload->document_name = $request->input('docName');
        $upload->location = "not specified yet";
        $upload->type = "exel";
        $upload->created_by = $request->input('userId');
        $upload->event = $request->input('event');
        $upload->p_member = $request->input('permissionmember') != null ? true : false;
        $upload->p_visitor = $request->input('permissionvisitor') != null ? true : false;

        if ($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/files/exel',$filename);
            $upload->file = $filename;
        } else {
            return $request;
            $upload->file = '';
        }
        $upload->save();
        return view('success')->with('success',$filename);
    }

//------------------------------------------------------------------------------------------------------------------
    public function storeimg(Request $request)
    {
        $upload =new Document();
        $upload->document_name = $request->input('docName');
        $upload->location = "not specified yet";
        $upload->type = "img";
        $upload->created_by = $request->input('userId');
        $upload->event = $request->input('event');
        $upload->p_member = $request->input('permissionmember') != null ? true : false;
        $upload->p_visitor = $request->input('permissionvisitor') != null ? true : false;

        if ($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/files/img',$filename);
            $upload->file = $filename;
        } else {
            return $request;
            $upload->file = '';
        }
        $upload->save();
        return view('success')->with('success',$filename);
    }

//------------------------------------------------------------------------------------------------------------------
public function storevideo(Request $request)
    {
        $upload =new Document();
        $upload->document_name = $request->input('docName');
        $upload->location = "not specified yet";
        $upload->type = "video";
        $upload->created_by = $request->input('userId');
        $upload->event = $request->input('event');
        $upload->p_member = $request->input('permissionmember') != null ? true : false;
        $upload->p_visitor = $request->input('permissionvisitor') != null ? true : false;

        if ($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/files/video',$filename);
            $upload->file = $filename;
        } else {
            return $request;
            $upload->file = '';
        }
        $upload->save();
        return view('success')->with('success',$filename);
    }

//------------------------------------------------------------------------------------------------------------------
    public function table()
    {
        $upload = Document::all();
        return view('warehouse')->with('upload',$upload);
    }

//------------------------------------------------------------------------------------------------------------------
    public function type()
     {
        return view('choosetype')->with('choosetype',$filename);
     }

}
