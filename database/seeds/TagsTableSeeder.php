<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name' => 'Php']);
        Tag::create(['name' => 'Css']);
        Tag::create(['name' => 'RockStar']);
        Tag::create(['name' => 'WordPress']);
        Tag::create(['name' => 'Marketing']);
        Tag::create(['name' => 'Senior']);
    }
}
