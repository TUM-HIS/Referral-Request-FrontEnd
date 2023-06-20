<?php

namespace Database\Factories;

use App\Models\m_f_l_s;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $facilities = m_f_l_s::take(1000)->pluck('Code');

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
            'name' => fake()->firstName() . " " . fake()->randomElement($kenyanSecondNames),
            'email' => fake()->unique()->safeEmail(),
            'username' => fake()->unique()->userName(),
            'role_id' => fake()->numberBetween(1, 4),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'facility_id' => fake()->randomElement($facilities),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
