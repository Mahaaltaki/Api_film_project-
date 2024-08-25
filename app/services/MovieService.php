<?php
namespace App\Services;

use App\Models\Movie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class MovieService
{
    public function createMovie(array $data)
    { //to verify the validity of the inputs to create film 
        $validator = Validator::make($data, [
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'release_year' => 'required|integer',
            'description' => 'nullable|string',
        ]);
        // if the condition  is not met throw the ValidationException
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return Movie::create($data);
    }

    public function updateMovie(Movie $movie, array $data)
    {//to verify the validity of the inputs
        $validator = Validator::make($data, [
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'release_year' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        /*
        @parms object<movie>
        update the data of film
        @return the same film
        */
        $movie->update($data);
        return $movie;
    }
    /*
    @parms object <movie>
    function to delete movie
    */
    public function deleteMovie(Movie $movie)
    {
        $movie->delete();
    }
}
?>