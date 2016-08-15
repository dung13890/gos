<?php

use Illuminate\Support\Str;

// Locations
$factory->define(App\Model\Location::class, function (Faker\Generator $faker) {
    return [
        'code' => str_random(5),
        'name' => $faker->name,
        'description' => $faker->text(120),
    ];
});

// Units
$factory->define(App\Model\Unit::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'short_name' => Str::slug($faker->name, '.'),
        'description' => $faker->text(120),
    ];
});

// Rooms
$factory->define(App\Model\Room::class, function (Faker\Generator $faker) {
    return [
        'code' => $faker->name,
        'name' => Str::slug($faker->name, '.'),
        'description' => $faker->text(120),
        'organizational' => $faker->text(120),
        'manager' => $faker->name,
        'member' => 10,
        'branch_id' => 1,
    ];
});


// Branches
$factory->define(App\Model\Branch::class, function (Faker\Generator $faker) {
    return [
        'code' => str_random(5),
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'address' => $faker->text(120),
        'fax' => str_random(11),
        'website' => 'http://tanphat.vn/',
        'status' => 1,
    ];
});

// Manufacturers
$factory->define(App\Model\Manufacturer::class, function (Faker\Generator $faker) {
    return [
        'code' => str_random(5),
        'name' => $faker->name,
        'description' => $faker->text(120),
    ];
});

// Roles
$factory->define(App\Model\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text(120),
    ];
});


// Permissions
$factory->define(App\Model\Permission::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'slug' => Str::slug($faker->name, '-'),
        'description' => $faker->text(120),
        'model' => 'User',
    ];
});

// Positions
$factory->define(App\Model\Position::class, function (Faker\Generator $faker) {
    return [
        'code' => str_random(5),
        'name' => $faker->text(50),
    ];
});

$factory->define(App\Model\User::class, function (Faker\Generator $faker) {
    return [
        'code' => str_random(5),
        'username' => $faker->firstNameMale,
        'password' => bcrypt(12345678),
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->text(50),
        'position_id' => 1,
    ];
});
