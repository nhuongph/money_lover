<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('categories')->insert(
                [
                    [
                        'name' => 'Foot & Bevegate',
                        'note' => 'Eat',
                        'image' => 'uploads/foot.jpg',
                        'created_at' => new DateTime(),
                        'updated_at' => new DateTime()
                    ],
                    [
                        'name' => 'Shopping',
                        'note' => 'Buy Wallet',
                        'image' => 'uploads/shopping.jpg',
                        'created_at' => new DateTime(),
                        'updated_at' => new DateTime()
                    ],
                    [
                        'name' => 'Nạp tiền',
                        'note' => 'Nạp tiền vào Wallet',
                        'image' => 'uploads/nhuongph/category/Nạp tiền.jpg',
                        'created_at' => new DateTime(),
                        'updated_at' => new DateTime()
                    ]
                ]
        );
    }

}
