<?php
use Faker\Generator as Faker;
use Faker\Provider\ms_MY\Education;
// $faker->addProvider(new \Bezhanov\Faker\Provider\Educator($faker));

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'avatar'=>'uploads/avatars/avatar2.jpg',
        'title' => $faker->title,
        'ic_num' => $faker->myKadNumber,
        'matric_num' => $faker->creditCardNumber(),
        'study_mode' => $faker->randomElement($array = array ('Undergraduate','Master', 'PhD')),
        'passport_num' => $faker->ean8,
        'citizenship' => $faker->country,
        'department' => $faker->departments,
        'faculty' => $faker->faculty,        
        'office_num' => $faker->fixedLineNumber,
        'mobile_num' => $faker->mobileNumber,
    ];
});
