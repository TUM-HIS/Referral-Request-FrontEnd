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


        $kenyanSecondNames = [
            'Wanjiru', 'Muthoni', 'Nyambura', 'Njoroge', 'Kamau',
            'Kariuki', 'Nyagah', 'Wambui', 'Maina', 'Ndung\'u',
            'Ochieng', 'Nyang\'au', 'Auma', 'Omondi', 'Onyango',
            'Anyango', 'Oloo', 'Otieno', 'Odhiambo', 'Okoth',
            'Owino', 'Omollo', 'Wafula', 'Simiyu', 'Masinde',
            'Were', 'Wanyonyi', 'Waithaka', 'Githinji', 'Njau',
            'Gichuru', 'Njeri', 'Mutua', 'Muli', 'Mwikali',
            'Waweru', 'Muchiri', 'Gitau', 'Nduta', 'Waiguru',
            'Mutiso', 'Mwende', 'Muthengi', 'Kaberia', 'Gacheru',
            'Mbai', 'Nyaga', 'Mwangi', 'Njeru', 'Wairimu',
            'Kathure', 'Murungi', 'Kariuki', 'Mueni', 'Munyao',
            'Muraya', 'Mwangangi', 'Wawira', 'Mbugua', 'Kimani',
            'Wambugu', 'Kipchirchir', 'Chebet', 'Kiprop', 'Langat',
            'Cherono', 'Rono', 'Kimutai', 'Kimeli', 'Chepkoech',
            'Jepchirchir', 'Kemboi', 'Rotich', 'Cherop', 'Chepkurui',
            'Kiplagat', 'Koech', 'Sum', 'Ng\'eno', 'Simotwo',
            'Kipngetich', 'Kibiwott', 'Kiptoo', 'Ngeno', 'Kipkirui',
            'Koros', 'Kamotho', 'Githaiga', 'Ndung\'u', 'Mburu',
            'Wanyama', 'Nyamai', 'Karanja', 'Kinyua', 'Kiarie',
            'Kamande', 'Gitonga', 'Mwangi', 'Ngugi', 'Wanjiku',
            'Ndungu', 'Mwai', 'Mugo', 'Njenga', 'Wachira',
            'Chege', 'Wamalwa', 'Khamisi', 'Onyancha', 'Wesa',
            'Adhiambo', 'Opondo', 'Achola', 'Odera', 'Aw'
        ];

        return [
                'first_name' => $faker->firstName,
                'last_name' => fake()->randomElement($kenyanSecondNames),
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
