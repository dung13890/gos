<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BranchesTableSeeder::class);
        $this->call(ManufacturersTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
