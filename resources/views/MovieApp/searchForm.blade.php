<div id="menu" class="form search">
<form method="POST" action="{{ action('MovieApp@index') }}">
	@csrf
	<input type="number" name="quantity" min="1" value="20">
	<button type="submit">List</button>
</form>
<form method="POST" action="{{ action('MovieApp@find') }}">
	@csrf
	<input type="text" name="q"> <button type="submit">Find</button>
</form>


<a href="{{ action('MovieApp@index') }}">Upcoming</a>
</div>