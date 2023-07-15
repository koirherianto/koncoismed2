<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dpt;
use App\Models\Relawan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dpt>
 */
class DptFactory extends Factory
{
    protected $model = Dpt::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {   $genders = array(1,2);
        $gender = $genders[array_rand($genders, 1)];
        $agamas = array(4,5,6,7,8,9);
        $agama = $agamas[array_rand($agamas, 1)];
        $sukus = array(2,3,4,5,6);
        $suku = $sukus[array_rand($sukus, 1)];

        return [
            'nama' => $this->faker->name(),
            'nik' => $this->faker->nik(),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->dateTimeBetween('-118 year', '-18 year'),
            'email' => $this->faker->email(),
            'kontak' => $this->faker->e164PhoneNumber(),
            'jenis_kelamin' => $gender,
            'agama_id' => $agama,
            'tps' => rand(1,50),
            'rt' => rand(1,50),
            'rw' => rand(1,50),
            'alamat' => $this->faker->address(),
            'keterangan' => $this->faker->text(),
            'suku_id' => $suku,
            'id_wilayah' => Relawan::find(1913)->id_wilayah,
            'relawan_id' => 1913,
            'kandidat_id' => 44,
        ];
    }
}
