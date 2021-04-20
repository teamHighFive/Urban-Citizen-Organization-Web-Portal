@extends('layouts.dashboard')
@section('title','add more options')
@section('header')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
    

@section('content')
<div class="col-sm-12 mt-4">
<a href="/pollhome" button type="button" class="btn btn-blue-grey float-right">Poll Home</button></a>
</div>


<div class="container"><br>
    <div class="jumbotron blue-grey lighten-4 mt-5">
      <h2 class="font-weight-bold text-center text-muted"> Add More Options </h2>
       <hr>
        
        <div class="form-group">
            <form name="add_option" id="add_option">  
                
                <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
                </div>

                <div class="alert alert-success print-success-msg" style="display:none">
                <ul></ul>
                </div>


                <div class="table-responsive">  
                    <table class="table table-bordered" id="dynamic_field">  
                        <tr>  
                            <td><input type="text" name="option[]" placeholder="Type the option" class="form-control name_list" /></td>  
                            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                        </tr>  
                    </table>
                    <div class="text-center">  
                    <input type="button" name="submit" id="submit" class="btn btn-primary float-center" value="Submit" />
                    </div>  
                </div>


            </form>  
        </div> 
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){      
      var postURL = "<?php echo url('addmore'); ?>";
      var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="option[]" placeholder="Type the option" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_option').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_option')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });  


      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
    });  
</script>
<br>
<br><br>
<br>
@endsection
