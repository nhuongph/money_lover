<?php

use Illuminate\Database\Seeder;

class TransMoneysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trans_moneys')->insert(
                [
                    [
                        'name' => 'Foot & Bevegate',
                        'note' => 'Eat',
                        'image' => 'uploads/foot.jpg',
                        'category_id'=>'1',
                        'wallet_id'=>'3',
                        'money'=>'-10000',
                        'type_money'=>'đ',
                        'created_at' => new DateTime(),
                        'updated_at' => new DateTime()
                    ],
                    [
                        'name' => 'Foot & Bevegate',
                        'note' => 'Eat KFC',
                        'image' => 'uploads/foot.jpg',
                        'category_id'=>'2',
                        'wallet_id'=>'3',
                        'money'=>'-20000',
                        'type_money'=>'đ',
                        'created_at' => new DateTime(),
                        'updated_at' => new DateTime()
                    ]
                ]
        );
    }
}
