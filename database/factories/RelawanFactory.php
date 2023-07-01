<?php

namespace Database\Factories;

use App\Models\Relawan;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Models\Relawan>
 */
class RelawanFactory extends Factory
{
    protected $model = Relawan::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $phoneNumber = $this->faker->e164PhoneNumber();
        $phoneNumber = Str::replaceFirst('+', '', $phoneNumber);
        $user = User::create([
            'name' => $this->faker->name(),
            'contact' => $phoneNumber,
            'email' => $this->faker->email(),
            'alamat' => $this->faker->address(),
            'password' => Hash::make('123456'),
            'foto' => '',
        ]);
        $user->assignRole('relawan-premium');
         // Mendapatkan data acak dari tabel kecamatan berdasarkan query
        $kecamatan = DB::selectOne('SELECT * FROM kecamatan WHERE kabkota_id = 6472');
        return [
            'users_id' => $user->id,
            'relawan_id' => 1913,
            'kandidat_id' => 44,
            'id_wilayah' => $kecamatan->id,
            'status' => 'kecamatan',
            'left' => null,
            'right' => null,
            'no_kta' => $this->faker->nik(),
            'nik' => $this->faker->nik(),
            'jenis_kelamin' => $this->faker->randomElement(['Perempuan', 'Laki-laki']),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->dateTimeBetween('-118 year', '-18 year'),
            'status_perkawinan' => $this->faker->randomElement(['Belum', 'Sudah', 'Belum']),
        ];
    }
}
