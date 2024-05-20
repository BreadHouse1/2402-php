<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // seeder를 여러개 동시에 실행하고 싶을때 databaseSeeder를 사용해서 $this->call에 배열형태로 넣어주면 됨
        $this->call([
            UserSeeder::class,
        ]);
        // Board는 호출후 factory에 접근해서 ()에 원하는 생성 갯수를 정해주면 됨
        Board::factory(50)->create();
    }
}
