<?php

use Illuminate\Database\Seeder;

class WalletsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('wallets')->insert(
                [
                    [
                        'name' => 'Uber1',
                        'type_money' => '$',
                        'money' => '1000',
                        'note' => '',
                        'user_id' => '1',
                        'current' => 'no',
                        'image' => 'uploads/uber.jpg',
                        'created_at' => new DateTime(),
                        'updated_at' => new DateTime()
                    ],
                    [
                        'name' => 'VietComBank',
                        'type_money' => 'đ',
                        'money' => '10000000',
                        'note' => '',
                        'user_id' => '1',
                        'current' => 'yes',
                        'image' => 'uploads/vietcombank.jpg',
                        'created_at' => new DateTime(),
                        'updated_at' => new DateTime()
                    ],
                    [
                        'name' => 'Đông Á',
                        'type_money' => '$',
                        'money' => '1000',
                        'note' => '',
                        'user_id' => '2',
                        'current' => 'no',
                        'image' => 'uploads/uber.jpg',
                        'created_at' => new DateTime(),
                        'updated_at' => new DateTime()
                    ],
                    [
                        'name' => 'VietTinBank',
                        'type_money' => 'đ',
                        'money' => '10000000',
                        'note' => '',
                        'user_id' => '2',
                        'current' => 'no',
                        'image' => 'uploads/vietcombank.jpg',
                        'created_at' => new DateTime(),
                        'updated_at' => new DateTime()
                    ]
                ]
        );
    }

}
