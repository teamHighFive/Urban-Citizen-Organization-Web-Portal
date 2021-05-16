<?php

namespace App\Http\Controllers\Document;

use Illuminate\Support\Facades\Auth;
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
use App\Announcement;



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

public function list()
{
    return view('announcement.list');
}
//------------------------------------------------------------------------------------------------------------------

public function store_events(Request $request)
    {
        $upload =new Eventfiles();
        $upload->document_name = $request->input('document_name');
        $upload->event = $request->input('event');
        $upload->location =  $request->input ("location");
        $upload->type = "pdf,doc,exel,presentation";
        $upload->created_by = Auth::user()->id;
        $upload->description = $request->input('description');
        $upload->event = $request->input('event');
        $upload->p_admin = $request->input('p_admin') != null ? true : true;
        $upload->p_member = $request->input('p_member') != null ? true : false;
        $upload->p_visitor = $request->input('p_visitor') != null ? true : false;

        if ($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/event_files'.$extension,$filename);
            $upload->file = $filename;
            $upload->type = $extension;
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
        //$upload->type = "pdf,doc,exel,presentation";
        $upload->created_by = Auth::user()->id;
        $upload->description = $request->input('description');
        $upload->event = $request->input('event');
        $upload->p_admin = $request->input('p_admin') != null ? true : true;
        $upload->p_member = $request->input('p_member') != null ? true : false;
        $upload->p_visitor = $request->input('p_visitor') != null ? true : false;

        if ($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/conf_files'.$extension,$filename);
            $upload->file = $filename;
            $upload->type = $extension;
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
        //$upload->type = "pdf,doc,exel,presentation";
        $upload->created_by = Auth::user()->id;
        $upload->description = $request->input('description');
        $upload->p_admin = $request->input('permissionadmin') != null ? true : true;
        $upload->p_member = $request->input('permissionmember') != null ? true : false;
        $upload->p_visitor = $request->input('permissionvisitor') != null ? true : false;

        if ($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/donate_files'.$extension,$filename);
            $upload->file = $filename;
            $upload->type = $extension;
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
        // $upload->type = "doc";
        $upload->created_by = Auth::user()->id;
        $upload->event = $request->input('event');
        $upload->p_admin = $request->input('permissionadmin') != null ? true : true;
        $upload->p_member = $request->input('permissionmember') != null ? true : false;
        $upload->p_visitor = $request->input('permissionvisitor') != null ? true : false;

        if ($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/files/'.$extension,$filename);
            $upload->file = $filename;
            $upload->type = $extension;
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
        $upload->created_by = Auth::user()->id;
        $upload->type = "submission files";
        $upload->Description = $request->input('Description');
        

        if ($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/files/exel'.$extension,$filename);
            $upload->file = $filename;
            $upload->type = $extension;
        } else {
            return $request;
            $upload->file = '';
        }
        $upload->save();
        return view('archive.uploadform_exel')->with('success',$filename);
    }

//------------------------------------------------------------------------------------------------------------------
    public function table_submission_files()
    {
        $upload = Submission::all();
        return view('archive.submission')->with('upload',$upload);
    }
//------------------------------------------------------------------------------------------------------------------
    public function table_seperated_files()
    {   
        $upload = Document::all()->where('p_visitor', 1);
        if(Auth::guest()){
            $upload = Document::all()->where('p_visitor', 1);
        }else {
            $userType = Auth::user()->role_as;
            if($userType == 'admin'){
                $upload = Document::all();
            }else if($userType == 'member'){
                $upload = Document::all()->where('p_member', 1);
            }
        }
        return view('archive.index')->with('upload',$upload);
    }

//------------------------------------------------------------------------------------------------------------------
    public function table_gallery_files()
    {
        $upload = Album::all()->where('p_visitor', 1);
        if(Auth::guest()){
            $upload = Album::all()->where('p_visitor', 1);
        }else {
            $userType = Auth::user()->role_as;
            if($userType == 'admin'){
                $upload = Album::all();
            }else if($userType == 'member'){
                $upload = Album::all()->where('p_member', 1);
            }
        }
        return view('archive.gallery')->with('upload',$upload);       
    }


//------------------------------------------------------------------------------------------------------------------
    public function table_events()
    {
        $upload = Event::all()->where('p_visitor', 1);
        if(Auth::guest()){
            $upload = Event::all()->where('p_visitor', 1);
        }else {
            $userType = Auth::user()->role_as;
            if($userType == 'admin'){
                $upload = Event::all();
            }else if($userType == 'member'){
                $upload = Event::all()->where('p_member', 1);
            }
        }
        return view('archive.event')->with('upload',$upload);
    }

//------------------------------------------------------------------------------------------------------------------
    public function table_donate_files()
    {
        $upload = Donationfiles::all()->where('p_visitor', 1);
        if(Auth::guest()){
            $upload = Donationfiles::all()->where('p_visitor', 1);
        }else {
            $userType = Auth::user()->role_as;
            if($userType == 'admin'){
                $upload = Donationfiles::all();
            }else if($userType == 'member'){
                $upload = Donationfiles::all()->where('p_member', 1);
            }
        }
        return view('archive.donation')->with('upload',$upload);
    }

//------------------------------------------------------------------------------------------------------------------  
    public function table_conf_files()
    {
        $upload = Conf_files::all()->where('p_visitor', 1);
        if(Auth::guest()){
            $upload = Conf_files::all()->where('p_visitor', 1);
        }else {
            $userType = Auth::user()->role_as;
            if($userType == 'admin'){
                $upload = Conf_files::all();
            }else if($userType == 'member'){
                $upload = Conf_files::all()->where('p_member', 1);
            }
        }
        return view('archive.conf-file')->with('upload',$upload);
    }

//------------------------------------------------------------------------------------------------------------------  
    public function table_post_files()
    {
        $upload = Post::all()->where('p_visitor', 1);
        if(Auth::guest()){
            $upload = Post::all()->where('p_visitor', 1);
        }else {
            $userType = Auth::user()->role_as;
            if($userType == 'admin'){
                $upload = Post::all();
            }else if($userType == 'member'){
                $upload = Post::all()->where('p_member', 1);
            }
        }
        return view('archive.post')->with('upload',$upload);
    }

//------------------------------------------------------------------------------------------------------------------
    public function table_event_files()
        {
            $upload = Eventfiles::all()->where('p_visitor', 1);
            if(Auth::guest()){
                $upload = Eventfiles::all()->where('p_visitor', 1);
            }else {
                $userType = Auth::user()->role_as;
                if($userType == 'admin'){
                    $upload = Eventfiles::all();
                }else if($userType == 'member'){
                    $upload = Eventfiles::all()->where('p_member', 1);
                }
            }
            return view('archive.eventfiles')->with('upload',$upload);
        }

//------------------------------------------------------------------------------------------------------------------  
    
    public function type()
        {
            return view('choosetype')->with('choosetype',$filename);
        }

//------------------------------------------------------------------------------------------------------------------  

    public function editfile($primary)
        {
            $upload = Document::find($primary);
            return view('archive.file-editform')->with('upload',$upload);
        }

    public function update(Request $request, $primary)
    {
        $upload = Document::find($primary);
        $upload->document_name = $request->input('document_name');
        $upload->location = "not specified yet";
        
        $upload->created_by = Auth::user()->id; //$request->input('created_by');
        $upload->event = $request->input('event');
        $upload->p_admin = $request->input('p_admin') != null ? true : true;
        $upload->p_member = $request->input('p_member') != null ? true : false;
        $upload->p_visitor = $request->input('p_visitor') != null ? true : false;

        if ($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/files/'.$extension,$filename);
            $upload->file = $filename;
            $upload->type = $extension;
        }
        
        $upload->save();
        return redirect('/seperated-arc')->with('success',$upload);
    
    } 
        
    public function delete($primary)
    {
        $upload = Document::find($primary);
        $upload->delete();
        return redirect('/seperated-arc')->with('upload',$upload);

    }
//------------------------------------------------------------------------------------------------------------------  

    public function editdon($primary)
        {
            $upload = Donationfiles::find($primary);
            return view('archive.donation-editform')->with('upload',$upload);
        }


    public function updatedon(Request $request, $primary)
        {
            $upload = Donationfiles::find($primary);
            $upload->document_details = $request->input('document_details');
            $upload->location = "not specified yet";
            
            $upload->created_by = Auth::user()->id; //$request->input('created_by');
            $upload->description = $request->input('description');
            $upload->p_admin = $request->input('permissionadmin') != null ? true : true;
            $upload->p_member = $request->input('permissionmember') != null ? true : false;
            $upload->p_visitor = $request->input('permissionvisitor') != null ? true : false;

            if ($request->hasfile('file')){
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $filename= time().'.'.$extension;
                $file->move('uploads/donate_files'.$extension,$filename);
                $upload->file = $filename;
                $upload->type = $extension;
        }

        $upload->save();
        return redirect('/donatfiles-arc')->with('success',$upload);
    
    } 

        public function deletedon($primary)
        {
            $upload = Donationfiles::find($primary);
            $upload->delete();
            return redirect('/donatfiles-arc')->with('upload',$upload);

        }

//------------------------------------------------------------------------------------------------------------------  

    public function editconf($primary)
        {
            $upload = Conf_files::find($primary);
            return view('archive.conf-editform')->with('upload',$upload);
        }


    public function updateconf(Request $request, $primary)
        {
            $upload = Conf_files::find($primary);
            $upload->document_name = $request->input('document_name');
            $upload->location = $request->input('location');
            $upload->type = "doc";
            $upload->created_by = Auth::user()->id;  //$request->input('created_by');
            $upload->description = $request->input('description');
            $upload->event = $request->input('event');
            $upload->p_admin = $request->input('permissionadmin') != null ? true : true;
            $upload->p_member = $request->input('permissionmember') != null ? true : false;
            $upload->p_visitor = $request->input('permissionvisitor') != null ? true : false;

        if ($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/conf_files'.$extension,$filename);
            $upload->file = $filename;
            $upload->type = $extension;
        }

        $upload->save();
        return redirect('/conffiles-arc')->with('success',$upload);

        } 

        public function deleteconf($primary)
        {
            $upload = Conf_files::find($primary);
            $upload->delete();
            return redirect('/conffiles-arc')->with('upload',$upload);
        }

//------------------------------------------------------------------------------------------------------------------  

        public function editeventfile($primary)
        {
            $upload = Eventfiles::find($primary);
            return view('archive.event-editform')->with('upload',$upload);
        }


        public function updateeventfile(Request $request, $primary)
        {
            $upload = Eventfiles::find($primary);
            $upload->document_name = $request->input('document_name');
            $upload->location = $request->input('location');
            $upload->created_by = Auth::user()->id;  //$request->input('created_by');
            $upload->description = $request->input('description');
            $upload->event = $request->input('event');
            $upload->p_admin = $request->input('permissionadmin') != null ? true : true;
            $upload->p_member = $request->input('permissionmember') != null ? true : false;
            $upload->p_visitor = $request->input('permissionvisitor') != null ? true : false;

        if ($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/event_files'.$extension,$filename);
            $upload->file = $filename;
            $upload->type = $extension;
        }

        $upload->save();
        return redirect('/eventfiles-arc');

        } 

        public function deleteeventfile($primary)
        {
            $upload = Eventfiles::find($primary);
            $upload->delete();
            return redirect('/eventfiles-arc');
        }

//------------------------------------------------------------------------------------------------------------------  

        public function deletsubmissionfile($primary)
        {
            $upload = Submission::find($primary);
            $upload->delete();
            return redirect('/submission_table')->with('upload',$upload);
        }


   

//------------------------------------------------------------------------------------------------------------------
        public function storeann(Request $request)
        {

            $upload =new Announcement();
            $upload->topic = $request->input('topic');
            $upload->body = $request->input('body');            
            $upload->user_id = Auth::user()->id;            
            $upload->p_admin = $request->input('permissionadmin') != null ? true : true;
            $upload->p_member = $request->input('permissionmember') != null ? true : false;
            $upload->p_visitor = $request->input('permissionvisitor') != null ? true : false;
            $upload->schedulestart = $request->input('schedulestart');
            $upload->scheduleend = $request->input('scheduleend');

            $upload->save();
            // return redirect('/announcement')->with('staus',"Announcement added successfully.");
            return $this->announcements()->with('status','Announcement added successfully.');
        }

//------------------------------------------------------------------------------------------------------------------
    public function announcements()
    {
        $upload = Announcement::all()->where('p_visitor', 1)->where('schedulestart', '<=', date('Y-m-d'))->where('scheduleend', '>=', date('Y-m-d'));
        if(Auth::guest()){
            $upload = Announcement::all()->where('p_visitor', 1)->where('schedulestart', '<=', date('Y-m-d'))->where('scheduleend', '>=', date('Y-m-d'));
        }else {
            $userType = Auth::user()->role_as;
            if($userType == 'admin'){
                $upload = Announcement::all()->where('schedulestart', '<=', date('Y-m-d'))->where('scheduleend', '>=', date('Y-m-d'));
            }else if($userType == 'member'){
                $upload = Announcement::all()->where('p_member', 1)->where('schedulestart', '<=', date('Y-m-d'))->where('scheduleend', '>=', date('Y-m-d'));
            }
        }
        return view('announcement.basicview ')->with('upload',$upload);
    }

//------------------------------------------------------------------------------------------------------------------

    public function announcementdelete($primary)
            {
                $upload = Announcement::find($primary);
                $upload->delete();
                return redirect('/announcement')->with('upload',$upload);
            }
//------------------------------------------------------------------------------------------------------------------

    public function announcementtabledelete($primary)
    {
        $upload = Announcement::find($primary);
        $upload->delete();
        return redirect('/list')->with('upload',$upload);
    }          


//------------------------------------------------------------------------------------------------------------------

    public function announcementlist()
        {   
            $upload = Announcement::all()->where('p_visitor', 1);
            if(Auth::guest()){
                $upload = Announcement::all()->where('p_visitor', 1);
            }else {
                $userType = Auth::user()->role_as;
                if($userType == 'admin'){
                    $upload = Announcement::all();
                }else if($userType == 'member'){
                    $upload = Announcement::all()->where('p_member', 1);
                }
            }
            return view('announcement.list')->with('upload',$upload);
        }
//------------------------------------------------------------------------------------------------------------------  

    public function announcementtableedit($primary)
    {
        $upload = Announcement::find($primary);
        return view('announcement.ann-editform')->with('upload',$upload);
    }


    public function updateann(Request $request, $primary)
    {
        $upload = Announcement::find($primary);
        $upload->topic = $request->input('topic');
        $upload->body = $request->input('body');            
        $upload->user_id = Auth::user()->id;            
        $upload->p_admin = $request->input('permissionadmin') != null ? true : true;
        $upload->p_member = $request->input('permissionmember') != null ? true : false;
        $upload->p_visitor = $request->input('permissionvisitor') != null ? true : false;
        $upload->schedulestart = $request->input('schedulestart');
        $upload->scheduleend = $request->input('scheduleend');

    $upload->save();
    return redirect('/list');

    } 

}