<!DOCTYPE html>
<html>
<head>
	<title>ArchTouch Movie Database</title>
</head>
<body>
<style type="text/css">
	
.movie-box{
	width: 350px;		
}
</style>
<div>
@include('MovieApp.searchForm')
</div>
<div class="movie_list">
@foreach ($movies as $movie)
    @include('MovieApp.movie', ['movie' => $movie])
@endforeach
<div>
</body>
</html>


