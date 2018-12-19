<a href="{{ action('MovieApp@detail', ['id' =>  $movie->getId()  ] ) }}">
<div id="movie_{{ $movie->getId()}}" class="movie-box">
	<div class="title">{{ $movie->getName()}}</div>
	<div class="poster">
		<img src="{{$movie->getPoster()}}">
	</div>
	<div class="releaseDate">{{ $movie->getFormatedReleaseDate('m/d/Y') }}</div>
</div>
</a>