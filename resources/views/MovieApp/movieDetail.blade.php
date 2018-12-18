<!DOCTYPE html>
<html>
<head>
	<title>ArchTouch Movie Database</title>
</head>
<body>
@include('MovieApp.searchForm')
<div class="movie_detail">

    @include('MovieApp.movie', ['movie' => $movie])
    <div class="genre">
    	{{ $movie->getGenre() }}
    </div>
<div>
</body>
</html>


