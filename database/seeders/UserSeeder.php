<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;
use App\Models\Balance;
use App\Models\Category;
use App\Models\Chat;
use App\Models\Ad;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a role
        Role::insert([
            ['name' => 'admin'],
            ['name' => 'manager_verificator'],
            ['name' => 'user']
        ]);

        Category::factory(5)->create();
        
        // Seed users
        User::factory(10)->create()->each(function ($user) {
            // Assign role to user
            $user->role()->associate(Role::inRandomOrder()->first())->save();

            // Create a balance for the user
            $user->balance()->save(Balance::factory()->make([
                'user_id' => $user->id,
            ]));

            // Create some ads for the user
            $ads = Ad::factory(3)->create([
                'user_id' => $user->id,
            ]);


            $ads->each(function ($ad) use($user) {
                // Создаем чат и присваиваем ad_id
                $chats = Chat::factory(3)->create([
                    'user_id' => $user->id,
                ]);

                $chats->each(function ($chat) use($ad) {
                    $chat->update(['ad_id' => $ad->id]);
                     // Обновляем объявление с chat_id
                    $ad->update(['chat_id' => $chat->id]);
                });
               
            });


        });
    }

}
