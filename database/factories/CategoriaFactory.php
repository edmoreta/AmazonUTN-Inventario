<?php

use Faker\Generator as Faker;

$factory->define(App\Categoria::class, function (Faker $faker) {
    return [
        'cat_codigo' => $faker->regexify('([CAT-][0-9]{1,4})$'),
        'cat_codigop' => $faker->regexify('([CAT-][0-9]{1,4})$'),
        'cat_nombre' => $faker->text($maxNbChars = 30),
    ];
});
