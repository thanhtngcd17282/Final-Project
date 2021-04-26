@extends('layouts.main')

@section('content')
@include('shared._header')

<section class="wrapper">
    <div class="inner">
        <header class="special">
            <h2>User information</h2>
        </header>
        <div class="">
            <form class="" action="{{ route('user.update') }}" method="post">
                @csrf
                @if(session('class'))
                <div class="alert alert-{{session('class')}}">
                    <li>{{session('message')}}</li>
                </div>
                @endif

                <div class="form-group">
                    <label><i class="text-danger">(*)</i>E-Mail</label>
                    <input id="email" name="email" type="text" placeholder="Your name" class="form-control" readonly="readonly" value="{{ Auth::user()->email }}">
                </div>

                <div class="form-group">
                    <label><i class="text-danger">(*)</i>Full Name</label>
                    <input id="name" name="name" type="text" placeholder="Your FullName" class="form-control" value="{{ Auth::user()->name }}">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" style="display: block" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>

                <div id="formnewpass">
                    <div class="form-group">
                        <label>New password</label>
                        <input name="password" id="password" value="" type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Confirm new password</label>
                        <input name="confirm_password" id="confirm_password" value="" type="password" class="form-control">
                        <span style="display: block"  id='message'></span>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" style="display: block" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default btn-md pull-right">Save Change</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection


@section('custom-js')
<script>
    $(document).ready(function() {

	$('#confirm_password').on('keyup', function () {
		if ($('#password').val() == $('#confirm_password').val()) {
			$('#message').html('Matching').css('color', 'green');
		} else
		$('#message').html('Confirm password must be same as password !').css('color', 'red');
	}).focus(function() {
		$('#message').show();
	}).blur(function() {
		$('#message').hide();
	});
});
</script>
@endsection
