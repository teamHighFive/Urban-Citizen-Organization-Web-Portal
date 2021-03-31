<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Document;
use App\Photo;
use App\Event;
use App\Donationfiles;
use App\Conferencefiles;
use App\Album;
use App\Conf_files;
use App\Post;
use App\Eventfiles;
use App\Submission;

class DocumentController extends Controller
{
    
    public function index_files()
    {
        return view('archive.uploadform_doc');
    }
//------------------------------------------------------------------------------------------------------------------
    public function index_submission()
    {
        return view('archive.uploadform_exel');
    }
//------------------------------------------------------------------------------------------------------------------
 
    public function index_choose()
    {
        return view('archive.choosetype');
    }
//------------------------------------------------------------------------------------------------------------------
    public function donate_form()
    {
        return view('archive.formdonation');
    }
//------------------------------------------------------------------------------------------------------------------
    public function conference_form()
    {
        return view('archive.formconf');
    }

//------------------------------------------------------------------------------------------------------------------

public function event_form()
{
    return view('archive.formevents');
}
//------------------------------------------------------------------------------------------------------------------


//------------------------------------------------------------------------------------------------------------------

public function store_events(Request $request)
    {
        $upload =new Eventfiles();
        $upload->document_name = $request->input('document_name');
        $upload->event = $request->input('event');
        $upload->location =  $request->input ("location");
        $upload->type = "pdf,doc,exel,presentation";
        $upload->created_by = $request->input('created_by');
        $upload->description = $request->input('description');
        $upload->event = $request->input('event');
        $upload->p_admin = $request->input('p_admin') != null ? true : true;
        $upload->p_member = $request->input('p_member') != null ? true : false;
        $upload->p_visitor = $request->input('p_visitor') != null ? true : false;

        if ($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/event_files',$filename);
            $upload->file = $filename;
        } else {
            return $request;
            $upload->file = '';
        }
        $upload->save();
        return view('archive.formevents')->with('formevents',$upload);
    }

//------------------------------------------------------------------------------------------------------------------

public function store_conffiles(Request $request)
    {
        $upload =new Conf_files();
        $upload->document_name = $request->input('document_name');
        $upload->location =  $request->input ("location");
        $upload->type = "pdf,doc,exel,presentation";
        $upload->created_by = $request->input('created_by');
        $upload->description = $request->input('description');
        $upload->event = $request->input('event');
        $upload->p_admin = $request->input('p_admin') != null ? true : true;
        $upload->p_member = $request->input('p_member') != null ? true : false;
        $upload->p_visitor = $request->input('p_visitor') != null ? true : false;

        if ($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/conf_files',$filename);
            $upload->file = $filename;
        } else {
            return $request;
            $upload->file = '';
        }
        $upload->save();
        return view('archive.formconf')->with('success',$upload);
    }

//------------------------------------------------------------------------------------------------------------------


    public function store_donatefiles(Request $request)
    {
        $upload =new Donationfiles();
        $upload->document_details = $request->input('docName');
        $upload->location = "not specified yet";
        $upload->type = "pdf,doc,exel,presentation";
        $upload->created_by = $request->input('userId');
        $upload->description = $request->input('description');
        $upload->p_admin = $request->input('permissionadmin') != null ? true : true;
        $upload->p_member = $request->input('permissionmember') != null ? true : false;
        $upload->p_visitor = $request->input('permissionvisitor') != null ? true : false;

        if ($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/donate_files',$filename);
            $upload->file = $filename;
        } else {
            return $request;
            $upload->file = '';
        }
        $upload->save();
        return view('archive.formdonation')->with('success',$upload);
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
        $upload->p_admin = $request->input('permissionadmin') != null ? true : true;
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
        return view('archive.uploadform_doc')->with('success',$filename);
    }
//------------------------------------------------------------------------------------------------------------------
    public function storeexel(Request $request)
    {
        $upload =new Submission();
        $upload->file_name = $request->input('file_name');
        $upload->location = "not specified";
        $upload->created_by = $request->input('created_by');
        $upload->type = "submission files";
        $upload->Description = $request->input('Description');
        

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
        return view('archive.uploadform_exel')->with('success',$filename);
    }

//------------------------------------------------------------------------------------------------------------------
    public function table_seperated_files()
    {
        $upload = Document::all();
        return view('archive.index')->with('upload',$upload);
    }

//------------------------------------------------------------------------------------------------------------------
    public function table_gallery_files()
    {
        $upload = Album::all();
        return view('archive.gallery')->with('upload',$upload);
    }


//------------------------------------------------------------------------------------------------------------------
    public function table_events()
    {
        $upload = Event::all();
        return view('archive.event')->with('upload',$upload);
    }

//------------------------------------------------------------------------------------------------------------------
    public function table_donate_files()
    {
        $upload = Donationfiles::all();
        return view('archive.donation')->with('upload',$upload);
    }

//------------------------------------------------------------------------------------------------------------------  
    public function table_conf_files()
    {
        $upload = Conf_files::all();
        return view('archive.conf-file')->with('upload',$upload);
    }

//------------------------------------------------------------------------------------------------------------------  
public function table_post_files()
{
    $upload = Post::all();
    return view('archive.post')->with('upload',$upload);
}

//------------------------------------------------------------------------------------------------------------------
public function table_event_files()
    {
        $upload = Eventfiles::all();
        return view('archive.eventfiles')->with('upload',$upload);
    }

//------------------------------------------------------------------------------------------------------------------  
    
    public function type()
        {
            return view('choosetype')->with('choosetype',$filename);
        }

//------------------------------------------------------------------------------------------------------------------  

    public function edit($primary)
        {
            $upload = Document::find($primary);
            return view('archive.file-editform')->with('upload',$upload);
        }

    public function update(Request $request, $primary)
    {
        $upload = Document::find($primary);
        $upload->document_name = $request->input('document_name');
        $upload->location = "not specified yet";
        $upload->type = "doc";
        $upload->created_by = "1"; //$request->input('created_by');
        $upload->event = $request->input('event');
        $upload->p_admin = $request->input('permissionadmin') != null ? true : true;
        $upload->p_member = $request->input('permissionmember') != null ? true : false;
        $upload->p_visitor = $request->input('permissionvisitor') != null ? true : false;

        if ($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/files/doc',$filename);
            $upload->file = $filename;
        }

        $upload->save();
        return redirect('/seperated-arc')->with('upload',$upload);
    

    } 
        
    public function delete($primary)
    {
        $upload = Document::find($primary);
        $upload->delete();
        return redirect('/seperated-arc')->with('upload',$upload);

    }

    public function download(){
        $file = public_path()."/uploads/files/doc',$filename";
    
        $header = array(
            'Content-Type: application/$filename',
        );
    
        return Response::download($file, "$filename", $header );
    }

}