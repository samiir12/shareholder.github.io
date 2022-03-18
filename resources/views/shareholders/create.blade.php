@extends('layouts.app')
@section('content')
<div class="col-lg-8 ml-6">
   <div class="card">
      <div class="card-header">New <strong>Shareholder</strong><small> Form</small></div>
      <div class="card-body card-block">
         <form method="post" action="{{url('shareholders')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="firstname" class=" form-control-label">Name</label>
                <input type="text" id="firstname" placeholder="Enter Firstname" name="firstname" class="form-control">
            </div>
            <div class="form-group">
                <label for="lastname" class=" form-control-label">Lastname</label>
                <input type="text" id="lastname" name="lastname" placeholder="Enter Lastname" class="form-control">
            </div>

                  <div class="form-group">
                     <label for="Email">Email</label>
                     <input type="text" id="email" class="form-control" placeholder="Enter email address" name="email">
                  </div>
            <div class="form-group">
                <label for="Mobile" class="form-control-label">Mobile</label>
                <input type="text" name="mobile" id="mobile" placeholder="Enter mobile number" class="form-control">
            </div>

            <div class="form-group">
               <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
         </form>
      </div>
   </div>
</div>
@endsection
