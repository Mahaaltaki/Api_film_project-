<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Services\MovieService;
//use App\Services\MovieService;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{//query to bring all films
    $movies = Movie::query();

    // Filtering by genre if the genre was inputed  or director if the genre was inputed
    if ($request->has('genre')) {
        $movies->where('genre', $request->genre);
    }

    if ($request->has('director')) {
        $movies->where('director', $request->director);
    }

    // Sorting by release_year
    if ($request->has('sort_by')) {
        //set the order ascending or descending
        $sortDirection = $request->has('sort_direction') && $request->sort_direction === 'desc' ? 'desc' : 'asc';
        $movies->orderBy($request->sort_by, $sortDirection);
    }
   // Paginate the movies and include the ratings
   return $movies->with('ratings')->paginate($request->get('per_page', 10))->map(function ($movie) {
    $movie->average_rating = $movie->averageRating();
    return $movie;
});
}


    /**
     * call createMovie function from movieService
     * @parms request
     * store movie
     * @return movie
     */
    public function store(Request $request, MovieService $movieService)
{
    $movie = $movieService->createMovie($request->all());
    return response()->json($movie, 201);
}
//show film with rating
public function show(Movie $movie)
    {
        $movie->load('ratings'); // Load the ratings relationship
        $movie->average_rating = $movie->averageRating(); // Add the average rating to the movie
        return response()->json($movie);
    }

//update data of the film
public function update(Request $request, Movie $movie, MovieService $movieService)
{
    $movie = $movieService->updateMovie($movie, $request->all());
    return response()->json($movie);
}
//delete the film
public function destroy(Movie $movie, MovieService $movieService)
{
    $movieService->deleteMovie($movie);
    return response()->json(null, 204);
}
}