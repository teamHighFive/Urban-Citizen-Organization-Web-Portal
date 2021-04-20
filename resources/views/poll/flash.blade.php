
@if(session('flashMessage'))
  <div class="container mt-3 text-center alert alert-success col-sm-12">{{session('flashMessage')}}</div>
@endif

 
 
@if(session('flashMessageProblem'))
 <div class="container mt-3 text-center alert alert-danger col-sm-12">{{session('flashMessageProblem')}}</div>
@endif