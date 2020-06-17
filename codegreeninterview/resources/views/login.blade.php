@extends('Layout.head')

<style type="text/css">
	.login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-form-1{
    padding: 5%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    color: #333;
}
.login-form-2{
    padding: 5%;
    background: #0062cc;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    color: #fff;
}
.login-container form{
    padding: 10%;
}
.btnSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    border: none;
    cursor: pointer;
}
.login-form-1 .btnSubmit{
    font-weight: 600;
    color: #fff;
    background-color: #0062cc;
}
.login-form-2 .btnSubmit{
    font-weight: 600;
    color: #0062cc;
    background-color: #fff;
}
.login-form-2 .ForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.login-tbl{
	margin-left: 330px;
}
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

<section>
	<div class="login-tbl">
	<div class="container login-container" >
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>User Login</h3>
                    
                     <form id="form" name="form" method="post" action="{{ URL::to('profile') }}" data-toggle="validator" class="contact-form text-left" enctype="multipart/form-data" autocomplete="off">
              				{{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username *" name="uname" id="uname" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password *" value="" name="password" id="password" />
                        </div>
                        @if(!empty($loginerror) && $loginerror =="Failed")
                         <label style="color: red; text-align: center">Invalid username & password!</label>
                         <br>
                         @endif
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                        
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</section>

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
                               required:true
                              }
                      
                              },

                      messages: {
                      uname: {
                              required: "Enter your username!"
                               },
                      password: {
                              required:"Enter your password!",
                              }
                                }
                    });
            });
</script>

@endsection