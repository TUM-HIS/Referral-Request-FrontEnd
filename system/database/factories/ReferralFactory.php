<?php

namespace Database\Factories;

use App\Models\m_f_l_s;
use App\Models\Referral;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Referral>
 */
class ReferralFactory extends Factory
{
    protected $model = Referral::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $facilities = m_f_l_s::take(1000)->pluck('Code');
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

        $from = '2023-05-01';
        $to = '2023-08-01';

        return [
        'clientName' => $faker->firstName." ".fake()->randomElement($kenyanSecondNames),
        'clientUPI' => $faker->numerify('#############'),
        'referringOfficer' => $faker->firstName." ".fake()->randomElement($kenyanSecondNames),
        'referredFacility' => $faker->randomElement($facilities),
        'historyInvestigation' => '634334',
        'diagnosis' => '634334',
        'reasonReferral' => '635506',
        'additionalNotes' => $faker->randomElement(['chest pains', 'heartburn', 'muscle pull', 'fever', 'isomania']),
        'priorityLevel' => $faker->randomElement(['urgent', 'less urgent', 'asap', 'mild']),
        'serviceCategory' => $faker->randomElement(['Category 12', 'Category 11', 'Category 8', 'Category 5', 'Category 4', 'Category 3', 'Category 23', 'Category 16']),
        'service' => $faker->randomElement(['service1', 'service2', 'service4', 'service7', 'service15', 'service10', 'service9', 'service20', 'service16', 'service31' ]),
        'referring_facility_id' => $faker->randomElement($facilities),
        'serviceNotes' => $faker->randomElement(['AHTTAHAFA', 'HATTAHTSTA', 'AGSTTSFSGTRS', 'STRTSRRTSRST']),
        'status' => $faker->randomElement(['Pending', 'Accepted', 'Rejected']),
        'created_at' => $faker->dateTimeBetween($from, $to)
        ];
    }
}
