<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Document;
use Ramsey\Uuid\Uuid;

$factory->define(Document::class, function (Faker $faker) {
   
    return [
        
        'id'=>  Uuid::uuid4()->toString(),
        'status' => 
                $faker->randomElement(['draft','published']),
        'payload' => $faker->unique()->randomElement(array('actor' => $faker->name),array('meta'=>array('type'=>$faker->realText(rand(10,20)),'color'=>$faker->colorName)), array('actions'=>'action',array( $faker->realText(rand(10,20)),'actor' =>  $faker->name)))
      

    ];
});
