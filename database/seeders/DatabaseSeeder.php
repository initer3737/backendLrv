<?php

namespace Database\Seeders;
use App\Models\Todo;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // tidak perlu memanggil todo faktori sebab fungsi Todo::factory mengacu kepada Todo factori yang ada di folder factory
        Todo::factory(90)
        ->create();
    }
}
