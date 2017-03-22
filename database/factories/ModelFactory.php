<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'ams_account_id' => $faker->unique()->ean8
    ];
});

$factory->define(App\Models\EnglishLargeCategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->randomElement(['Listening', 'Speaking', 'Reading', 'Writing'])
    ];
});

$factory->define(App\Models\EnglishElementType::class, function (Faker\Generator $faker) {
    return [
        'type' => $faker->unique()->randomElement(['traning_elements', 'brashup_elements'])
    ];
});

$statuses = [
    'not_started' => '未着手',
    'inprogress'  => '取り組み中',
    'skip'        => 'スキップ',
    'completed'   => '完了'
];

$factory->define(App\Models\EnglishLearningStatus::class, function (Faker\Generator $faker) use ($statuses) {
    $status = $faker->unique()->randomElement(array_keys($statuses));
    $name   = $statuses[$status];

    return [
        'learning_status' => $status,
        'name' => $name
    ];
});

$factory->define(App\Models\EnglishMediumCategory::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Medium Category ' . ucfirst($faker->word),
        'english_large_categories_id' => App\Models\EnglishLargeCategory::all()->random()->id,
        'description' => $faker->text(255)
    ];
});

$factory->define(App\Models\EnglishSmallCategory::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Small Category ' . ucfirst($faker->word),
        'english_medium_categories_id' => App\Models\EnglishMediumCategory::all()->random()->id,
        'description' => $faker->text(255),
        'explanation' => $faker->text
    ];
});

$factory->define(App\Models\EnglishElement::class, function (Faker\Generator $faker) {
    return [
        'english_small_categories_id' => App\Models\EnglishSmallCategory::all()->random()->id,
        'element_type' => App\Models\EnglishElementType::all()->random()->type,
        'name' => 'English Element ' . ucfirst($faker->word),
        'url' => $faker->url,
        'learning_content_id' => $faker->randomDigit
    ];
});

$factory->define(App\Models\UserEnglishLearning::class, function (Faker\Generator $faker) {
    return [
        'users_id' => App\Models\User::all()->random()->id,
        'english_elements_id' => App\Models\EnglishElement::all()->random()->id,
        'learning_status' => App\Models\EnglishLearningStatus::all()->random()->learning_status,
    ];
});
