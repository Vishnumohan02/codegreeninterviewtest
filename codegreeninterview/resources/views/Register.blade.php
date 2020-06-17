@extends('Layout.head')

<style type="text/css">
  .nav-color{
        background-color: #4dff4d;
    }
</style>




@section('content')

<section>
  <nav class="navbar  nav-color">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="/">Home</a></li>
      
    </ul>

  </div>
</nav>
</section>
<div class="container">
  <h2 class="reg-head">User Registration</h2>
  <p id="error"></p>
 

  <form id="form" name="form" method="post" action="{{ URL::to('store') }}" data-toggle="validator" class="contact-form text-left" enctype="multipart/form-data">
        {{ csrf_field() }}
  <div class="form-group">
      <label for="uname">Username:</label>
      <input type="text" class="form-control" style="width: 500px;" id="uname" placeholder="Enter Username" name="uname" required maxlength="250">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" style="width: 500px;" id="password" placeholder="Enter password" name="password" required maxlength="50" >
    </div>
    <div class="form-group">
      <label for="confirmpassword">Confirm Password:</label>
      <input type="password" class="form-control" style="width: 500px;" id="confirmpassword" placeholder="Confirm password" name="confirmpassword" required maxlength="50">
    </div>
    <div class="form-group">
      <label for="mail">Email:</label>
      <input type="email" class="form-control" style="width: 500px;" id="email" placeholder="Enter mail" name="email" required maxlength="100">
    </div>
    <div class="form-group">
      <label for="dob">Date Of Birth:</label>
      <input type="date" class="form-control" style="width: 500px;" id="dob" placeholder="Enter dob" name="dob"  required>
    </div>
    <div class="form-group">
      <label for="city">City:</label>
      <input type="text" class="form-control" style="width: 500px;" id="city" placeholder="Enter city" name="city" required maxlength="100">
    </div>
  
    <input type="submit" id="register" value="Register" class="btn btn-primary" name="register">
</form>
</div>
@endsection

@section('script')
<script type="text/javascript">

  $(document).ready(function(){
        $( "#form" ).validate({
                       rules: {
                      uname: {
                               required: true
                              },
                      password: {
                               required:true,
                               minlength: 5
                              },
                      confirmpassword: {
                               required:true,
                               minlength: 5,
                               equalTo : "#password"
                              },
                      mail: {
                               required:true,
                               email:true
                             },
                      dob: {
                               required:true,
                              },
                      city: {
                               required:true,
                              }
                      
                              },

                      messages: {
                      uname: {
                              required: "Enter your username!"
                               },
                      email: {
                              required:"Enter your email!",
                              email:"Invalid email"
                              },
                      password: {
                              required:"Enter your password!",
                              minlength:"Minimum 5 characters!"
                              },
                      confirmpassword: {
                              required:"Confirm password!"
                              },
                      dob: {
                              required:"Select DOB!"
                              },
                      city: {
                             required: "Enter city!"
                                }
                                }
                    });
            });
</script>

@endsection