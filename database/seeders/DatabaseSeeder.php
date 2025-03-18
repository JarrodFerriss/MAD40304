<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Nette\Schema\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        \App\Models\User::factory(10)->create();

        DB::table('categories')->truncate();
        $this->call(CategorySeeder::class);

        DB::table('articles')->truncate();
        $this->call(ArticleSeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
