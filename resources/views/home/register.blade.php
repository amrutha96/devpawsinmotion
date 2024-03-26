@extends('layouts.default')
@section('content')
@section('title', 'Owner Registratoin Form')

@section('content')

<div class="container">
  {{csrf_field()}}

  <h1>Registration Form</h1>

  <form action="{{ route('owner.register') }}" method="POST">
    {{csrf_field()}}
    <div class="card">
      <div class="card-body">
        <div class="row">
          
          <div class="col-md-6 pt-3">
           <div class="form-group">
             <label for="">First Name</label>
             <input type="text" name="firstname" value="{{old("firstname")}}" class="form-control" required placeholder="First name">
           </div>
          </div>
         
         <div class="col-md-6 pt-3">
           <div class="form-group">
             <label for="">Last Name</label>
             <input type="text" name="lastname" value="{{old("lastname")}}" class="form-control" required placeholder="Last name">
           </div>
         </div>
     
         <div class="col-md-6 pt-3">
           <div class="form-group">
             <label for="">Email Address</label>
             <input type="text" name="email" value="{{old("email")}}" class="form-control" required placeholder="Email ID">
           </div>
         </div>
     
         <div class="col-md-6 pt-3">
           <div class="form-group">
             <label for="">Mobile Number</label>
             <input type="text" name="contact" value="{{old("contact")}}" class="form-control" required placeholder="Mobile Number">
           </div>
         </div>
     
         <div class="col-md-12 pt-3">
           <div class="form-group">
             <label for="">Address Line 1</label>
             <input type="text" name="address_line1" value="{{old("address_line1")}}" class="form-control" required placeholder="Address">
           </div>
         </div>    
         <div class="col-md-3 pt-3">
           <div class="form-group">
             <label for="">City/County</label>
             <input type="text" name="address_line2" value="{{old("address_line2")}}" class="form-control" required placeholder="City / county">
           </div>
         </div>    
         <div class="col-md-3 pt-3" >
           <div class="form-group">
             <label for="">Postal Code</label>
             <input type="text" name="postcode" value="{{old("postcode")}}" class="form-control" required placeholder="Postcode">
           </div>
         </div>
         <div class="col-md-3 pt-3">
           <div class="form-group">
             <label for="">Password</label>
             <input type="text" name="password" value="{{old("password")}}" class="form-control" required placeholder="Password">
           </div>
         </div> 
         <div class="col-md-12 pt-4">
           <div class="form-group">
             <button type="submit" class="btn btn-primary">Register</button>
           </div>
         </div>
       </div>
      </div>
    </div>
  </form>
</div>

@endsection