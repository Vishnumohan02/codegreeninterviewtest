@extends('Layout.head')
<style type="text/css">
    .nav-color{
        background-color: #4dff4d;
    }
    .successmsg{
       background-color: #87FC77;
       width: 60%;
       height: 20%;
       margin-left: 225px;
       margin-top: 75px;
    }
    .msg{
      text-align: center;
      padding-top: 15px;
    }
    .msg1{
      text-align: center;
      padding-top: 0px;
    }
    .home-title{
      text-align: center;
    }
</style>
@section('content')

<section>
  <nav class="navbar  nav-color">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="/">Home</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{ url('/Register') }}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
      <li><a href="{{ url('/Login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
</section>

<section>
  <div>
    <h1 class="home-title">Home page</h1>
  </div>
</section>

@if(!empty($success))
  <section>
    <div class="successmsg">
        <h4 class="msg">Your registration is successfully completed.</h4><br>
       <h4 class="msg1">Please login using your username & password.</h4>
    </div>
  </section>
@endif
@endsection