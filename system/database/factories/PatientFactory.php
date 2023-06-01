<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    protected $model = Patient::class;
    public function definition()
    {

        $faker = \Faker\Factory::create();

        return [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'dob' => $faker->dateTime,
                'idNo' => $faker->numerify('#########'),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'country' => $faker->country,
                'countyOfBirth' => $faker->city,
                'telephone' => $faker->phoneNumber,
                'telephone1' => $faker->phoneNumber,
                'county' => $faker->city,
                'subCounty' => $faker->city,
                'village' => $faker->streetName,
                'landmark' => $faker->streetAddress,
                'address' => $faker->address,
                'kinName' => $faker->name,
                'relationship' => $faker->randomElement(['Father', 'Mother', 'Sibling', 'Relative', 'Spouse']),
                'kinResidence' => $faker->address,
                'kinTelephone' => $faker->phoneNumber,
                'mail' => $faker->email,
                'upi' => $faker->numerify('################'),
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
            ];
    }
}
