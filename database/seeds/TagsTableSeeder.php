<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i=0; $i < 5 ; $i++) {
            $newTag = new Tag();
            $newTag->name = $faker->sentence(2);
            
            $slug = Str::slug($newTag->name, '-');

            $slugEditable = $slug;

            $currentSlug = Tag::where('slug', $slug)->first();

            $contatore = 1;
            while($currentSlug) {
                $slug = $slugEditable . '-' . $contatore;
                $contatore++;
                $currentSlug = Tag::where('slug', $slug)->first();
            }

            $newTag->slug = $slug;

            $newTag->save();
        }
    }
}
