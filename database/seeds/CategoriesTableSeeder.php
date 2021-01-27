<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5 ; $i++) {
            $newCategory = new Category();
            $newCategory->name = $faker->sentence(3);

            $slug = Str::slug($newCategory->name, '-');

            $slugEditable = $slug;


            $currentSlug = Category::where('slug', $slug)->first();
            $contatore = 1;

            while($currentSlug) {

                $slug = $slugEditable . '-' . $contatore;
                $contatore++;
                $currentSlug = Category::where('slug', $slug)->first();
            }

            $newCategory->slug = $slug;

            $newCategory->save();
        }
    }
}
