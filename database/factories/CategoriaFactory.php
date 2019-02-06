<?php

use Faker\Generator as Faker;

$factory->define(App\Categoria::class, function (Faker $faker) {
    return [
        //'cat_codigo' => $faker->regexify('([CAT-][0-9]{1,4})$'),
        'cat_codigo' => $faker->unique()->numerify('CAT-#'),
        'cat_codigop' => $faker->optional($weight = 0.0)->randomDigit,
        'cat_nombre' => $faker->text($maxNbChars = 30),
    ];
});
