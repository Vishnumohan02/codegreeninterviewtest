@extends('Layout.head')

<style type="text/css">
	.otp-head{
		text-align: center;
	}
	.otp-tbl{
		text-align: center;
		margin-top: 20px;
	}
	.otp-box{
		 text-align: center;
		 width: 50%;
		 padding: 6px 20px;
		 margin: 8px 0;
		 display: inline-block;
		 border: 1px solid #ccc;
		 border-radius: 4px;
		 box-sizing: border-box;
	}
</style>

@section('content')
<div class="container">
  <h2 class="otp-head">OTP Verification</h2>
  <p id="error"></p>
  
<table>
<div class="otp-tbl">
	<div>Enter OTP to verify and complete your registration.</div>
  <form id="form" name="form" method="post" action="{{ URL::to('otpverification') }}" data-toggle="validator" class="contact-form text-left" enctype="multipart/form-data">
        {{ csrf_field() }}
  	<input type="hidden" name="userid" id="userid" value="{{$userId}}">
  	<input type="text" class="otp-box" style="width:200px" name="otp" id="otp" placeholder="Enter OTP" required="required" maxlength="4">
  	<br>
  	@if(!empty($error) && $error =="Failed")
  	<label style="color: red; text-align: center">Incorrect OTP. Try again!</label>
  	<br>
  	@endif
    <input type="submit" id="verify" value="Verify otp" class="btn btn-primary" name="verify">
</form>
</div>
</table>
</div>
@endsection

@section('script')
<script type="text/javascript">

  $(document).ready(function(){
        $( "#form" ).validate({
                       rules: {
                      otp: {
                               required: true,
                               number:true,
                              }
                      
                              },

                      messages: {
                      otp: {
                              required: "Enter OTP!",
                              number:"Enter OTP correctly"
                               }
                            }
                    });
            });
</script>

@endsection