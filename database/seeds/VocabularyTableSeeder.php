<?php

use Illuminate\Database\Seeder;

class VocabularyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Vocabulary::class, 30)->create();
    }
}
