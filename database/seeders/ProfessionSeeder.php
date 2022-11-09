<?php

namespace Database\Seeders;

use App\Models\Profession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ["Tidak bekerja (Di rumah saja)", "Pensiunan", "PNS Kementerian/Lembaga/Pemda", "TNI/Polisi", "Guru/Dosen", "Pegawai Swasta", "Pengusaha/Wiraswasta", "Pengacara/Hakim/Jaksa/Notaris", "Seniman/Pelukis/Artis/Sejenis", "Dokter/Bidan/Perawat", "Pilot/Pramugari", "Pedagang", "Petani/Peternak", "Nelayan", "Buruh (Tani/Pabrik/Bangunan)", "Sopir/Masinis/Kondektur", "Politikus", "Lainnya",];
        foreach ($data as $item) {
            Profession::firstOrCreate(['name' => $item], ['name' => $item]);
        }
    }
}
