<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    private $images = [
        'https://upload.wikimedia.org/wikipedia/sr/9/97/%D0%9F%D1%83%D0%BB%D0%BF_%D1%84.jpeg',
        'https://upload.wikimedia.org/wikipedia/sr/thumb/c/cb/The_Shawshank_Redemption.jpg/250px-The_Shawshank_Redemption.jpg',
        'https://m.media-amazon.com/images/M/MV5BMzcwYWFkYzktZjAzNC00OGY1LWI4YTgtNzc5MzVjMDVmNjY0XkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_.jpg',
        'https://images-na.ssl-images-amazon.com/images/I/71YVhLef-hL.jpg',
        'https://m.media-amazon.com/images/M/MV5BOGZmYzVkMmItM2NiOS00MDI3LWI4ZWQtMTg0YWZkODRkMmViXkEyXkFqcGdeQXVyODY0NzcxNw@@._V1_FMjpg_UX1000_.jpg',
        'http://3.bp.blogspot.com/-OWHOBuWoWkc/UahlGn1mjII/AAAAAAAABTE/bklC4XcHwpk/s1600/4.jpg',
        'https://upload.wikimedia.org/wikipedia/sr/thumb/f/f2/A_Rainy_Day_in_New_York_poster.jpg/250px-A_Rainy_Day_in_New_York_poster.jpg',
        'https://upload.wikimedia.org/wikipedia/sr/5/50/Midnight_in_Pariiis.jpg',
        
    ];
    private $genres = [
        'action',
        'sci-fi',
        'comedy',
        'romance',
        'thriller'
    ];
    public function definition()
    {
        return [
            'title'=> $this->faker->sentence(2,true),
            'director'=>$this->faker->name(),
            'imageUrl'=>$this->faker->randomElement($this->images),
            'duration'=>$this->faker->numberBetween(60,300),
            'releaseDate'=>$this->faker->date(),
            'genre'=>$this->faker->randomElement($this->genres)
        ];
    }
}
