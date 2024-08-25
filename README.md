### Project Description: Movie Rating System Using Laravel API

This project is an API built using the Laravel framework, designed for managing and rating movies. The system allows users to interact with movies by creating accounts, submitting ratings, and writing reviews. It follows a RESTful architecture and provides a variety of endpoints for handling data.

#### Detailed Code Description:

1. **Routing:**
   - API routes are defined using `Route::apiResource` to create a set of endpoints for managing movies via the `MovieController`.
   - `Route::post` provides endpoints for managing user registration, login, and logout using the `AuthController`.
   - An additional route is defined for adding ratings to movies through the `RatingController`.

2. **Migrations:**
   - **Ratings Table (`ratings`):**
     - Includes columns like `user_id` and `movie_id` as foreign keys linking to users and movies tables.
     - Contains a `rating` column for ratings between 1 and 5, and an optional `review` column for adding a textual review.
   - **Movies Table (`movies`):**
     - Includes movie details such as title, director, genre, release year, and description.
   - **Personal Access Tokens Table (`personal_access_tokens`):**
     - Supports authentication through personal access tokens used by Laravel Sanctum.

3. **Services:**
   - `MovieService` provides services for managing movies:
     - **Create Movie:** Validates input data before creating the movie.
     - **Update Movie:** Validates input data before updating movie details.
     - **Delete Movie:** Deletes the movie from the database.

4. **Models:**
   - **`Rating` Class:**
     - Represents a user's rating for a specific movie, with specified fillable fields.
   - **`Movie` Class:**
     - Represents the movie and includes fields such as title, director, genre, release year, and description.
     - Supports relationships with ratings and calculates the average rating for movies.

5. **Controllers:**
   - **`RatingController`:**
     - Provides basic operations for creating, retrieving, updating, and deleting ratings.
   - **`MovieController`:**
     - Provides functions for managing movies, such as retrieving a list of movies with filtering options by genre or director, creating movies, displaying a specific movie's details with ratings, and updating or deleting movies.
