<form action="{{ url('/') }}?foo=get&baz=get" method="POST">
	{{ csrf_field() }}

	<input type="hidden" name="foo" value="bar" />
	<input type="hidden" name="baz" value="baz">
	<input type="submit" name="Send">
</form>