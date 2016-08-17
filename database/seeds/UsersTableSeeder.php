<?php

use Illuminate\Database\Seeder;
use App\Model\Room;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$rooms = app(Room::class)->all();
        $users = factory(App\Model\User::class, 10)->create()->each(function ($user) use ($rooms) {
        	$user->rooms()->attach($rooms->lists('id')->random(2)->all());
        });
        $users->first()->update([
        	'username' => 'admin'
        ]);
    }
}
