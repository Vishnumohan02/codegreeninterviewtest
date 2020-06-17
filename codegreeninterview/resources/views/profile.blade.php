@extends('Layout.head')
<style type="text/css">
	.nav-color{
        background-color: #4dff4d;
    }
</style>
<style type="text/css">
  body{
    margin: 0;
    font-size: .9rem;
    font-weight: 400;
    line-height: 1.6;
    color: #212529;
    text-align: left;
    background-color: #f5f8fa;
}

.navbar-laravel
{
    box-shadow: 0 2px 4px rgba(0,0,0,.04);
}

.navbar-brand , .nav-link, .my-form, .login-form
{
    font-family: Raleway, sans-serif;
}

.my-form
{
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}

.my-form .row
{
    margin-left: 0;
    margin-right: 0;
}

.login-form
{
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}

.login-form .row
{
    margin-left: 0;
    margin-right: 0;
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
      <li><a href="{{ url('edit',$userdata->id) }}"><span class="glyphicon glyphicon-user"></span> Edit profile</a></li>
      <li><a href="{{ url('/Logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
</section>

<section style="text-align: center;">
  <div>
    <h3>Welcome to your profile</h3>
  </div>
<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            
                                <div class="form-group row">
                                    <label for="uname" class="col-md-4 col-form-label text-md-right">Username</label>
                                    <div class="col-md-6">
                                        <input type="text" id="uname" class="form-control" name="full-name" value="{{ $userdata->uname }}" readonly="readonly">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email-address" value="{{ $userdata->email }}" readonly="readonly">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="dob" class="col-md-4 col-form-label text-md-right">Date of birth</label>
                                    <div class="col-md-6">
                                        <input type="text" id="dob" class="form-control" value="{{ $userdata->dob }}" readonly="readonly">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
                                    <div class="col-md-6">
                                        <input type="text" id="city" class="form-control" value="{{ $userdata->city }}" readonly="readonly">
                                    </div>
                                </div>

                                </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</main>

</section>

@endsection
