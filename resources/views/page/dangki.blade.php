@extends('master')
@section('content')
<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="signup-form"><!--sign up form-->
					<h2>New User Signup!</h2>
					
					<form action="{{route('signup')}}" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						@if(count($errors) > 0)
							<div>
								@foreach($errors as $error)
									<div>
										{{$error}}
									</div>
								@endforeach
							</div>
						@endif
						@if(Session::has('thanhcong'))
							<div>
								{{Session::get('thanhcong')}}
							</div>
						@endif
						<input type="text" name="name" placeholder="Name"/>
						<input type="email" name="email" placeholder="Email Address"/>
						<input type="password" name="password" placeholder="Password"/>
						<input type="password" name="password_cf" placeholder="Password Confirm"/>
						<button type="submit" class="btn btn-default">Signup</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section><!--/form-->
@endsection