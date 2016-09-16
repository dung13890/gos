<?php

use Illuminate\Database\Seeder;

class CustomerGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\CustomerGroup::class, 10)->create()->each(function($customerGroup) {
            $customerGroup->customers()->save(factory(App\Model\Customer::class)->make());
        });
    }
}
