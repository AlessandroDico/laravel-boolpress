<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) {
        // $posts = config('posts');
        //
        // foreach ($posts as $post) {
        //     $newPost = new Post();
        //     $newPost->title = $post['title'];
        //     $newPost->author = $post['author'];
        //     $newPost->category = $post['category'];
        //     $newPost->save();
        // }

        for ($i=0; $i < 20 ; $i++) {
            $newPost = new Post();
            $newPost->title = $faker->sentence(3);
            $newPost->subtitle = $faker->sentence(3);
            $newPost->text = $faker->text(2000);

            //funzione per trasformare una stringa in uno slug es: hello world => hello-world (il secondo parametro indica il divisore delle parole contenute nel primo parametro)
            $slug = Str::slug($newPost->title, '-');

            // creo una copia dello slug altrimenti quando faccio l'assegnazione del valore di $slug nel while in caso esistessero più slug al secondo giro ci sarebbe sia il numero del'item precedente che quello dopo es: hello-world-1 al primo giro ed hello-world-1-2 al secondo giro
            $slugEditable = $slug;

            // vado a pescare lo slug corrente che è uguale ad un altro slug (solo in caso esista uno slug uguale)
            $currentSlug = Post::where('slug', $slug)->first();

            $contatore = 1;
            // se trovo due o più slug uguali ovvero $currentSlug esiste entro nel while
            while($currentSlug) {
                // se ne esistono due o più uguali devo concatenarli con un contatore per distinguerli
                $slug = $slugEditable . '-' . $contatore;
                $contatore++;
                // creo la condizione di uscita del ciclo while.. se $currentSlug esisterà il ciclo si ripete se invece non esiste esce
                $currentSlug = Post::where('slug', $slug)->first();
            }

            // quando esco dal while sono sicuro che lo slug non esiste nel db
            // assegno lo slug al post
            $newPost->slug = $slug;

            $newPost->save();
        }

    }
}
