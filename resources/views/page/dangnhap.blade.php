@extends('master')
@section('content')
<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="login-form"><!--login form-->
					<h2>Login to your account</h2>
					<form action="{{route('login')}}" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						@if(Session::has('flag'))
							<div class="alert alert-{{Session::get('flag')}}">
								{{Session::get('message')}}
							</div>
						@endif
						<!-- <input type="text" placeholder="Name" /> -->
						<input type="email" name="email" placeholder="Email Address" />
						<input type="password" name="password" placeholder="Password"/>
						<span>
							<input type="checkbox" class="checkbox"> 
							Keep me signed in
						</span>
						<button type="submit" class="btn btn-default">Login</button>
					</form>
				</div><!--/login form-->
			</div>
		</div>
	</div>
</section><!--/form-->
@endsection