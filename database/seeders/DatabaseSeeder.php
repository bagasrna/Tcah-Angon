<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PopUp;
use App\Models\Panduan;
use App\Models\Blog;
use App\Models\AboutUs;
use App\Models\Peternak;
use App\Models\Kandang;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        PopUp::create([
            'title' => 'Profesional',
            'description' => 'Kualitas pengelolaan akan dilakukan secara terjadwal dan konsisten. Disisi lain, pengolahan kandang berbasis IoT sehingga kualitas yang dihasil sesuai harapan.'
        ]);

        PopUp::create([
            'title' => 'Transparan',
            'description' => 'Investor dapat memonitoring kandang dengan camera cctv kandang. Tcah Angon secara real-time terkait kondisi ternak. Alur bagi hasil investasi akan dilaporkan setiap 2 kali sebulan.'
        ]);

        PopUp::create([
            'title' => 'Aman',
            'description' => 'Keamanan seluruh data pengguna dan transaksi menjadi salah satu prioritas Tcah Angon untuk kenyamanan pengguna.'
        ]);

        Panduan::create([
            'title' => 'Investasi',
            'description' => 'Ini Adalah Panduan Investasi'
        ]);

        Panduan::create([
            'title' => 'Syarat dan Ketentuan',
            'description' => 'Ini Adalah Panduan Syarat dan Ketentuan'
        ]);

        Panduan::create([
            'title' => 'Pertanyaan Umum',
            'description' => 'Ini Adalah Panduan Pertanyaan Umum'
        ]);

        Blog::create([
            'title' => 'Cara mengolah daging domba makin empuk',
            'description' => 'Ini Adalah Blog Cara mengolah daging domba makin empuk'
        ]);

        Blog::create([
            'title' => 'Tips agar domba sehat',
            'description' => 'Ini Adalah Blog Tips agar domba sehat'
        ]);

        Blog::create([
            'title' => 'Tips memasak daging domba',
            'description' => 'Ini Adalah Blog Tips memasak daging domba'
        ]);

        AboutUs::create([
            'title' => 'Apa Itu Tcah Angon',
            'description' => 'Tcah Angon hadir dengan aplikasi investasi'
        ]);

        AboutUs::create([
            'title' => 'OJK',
            'description' => 'Ini Adalah About Us OJK'
        ]);

        AboutUs::create([
            'title' => 'Customer',
            'description' => 'Ini Adalah About Us Customer'
        ]);

        Peternak::create([
            'name' => 'Ibu Muslimah',
            'status' => 'Peternak modern domba lokal',
            'address' => 'Dampit, Malang',
            'rating' => 4,
            'description' => 'Ibu Muslimah adalah peternak lokal modern yang telah bergabung selama 1 tahun dengan Tcah Angon dan telah banyak bekerjasama dengan sukses. Ibu Muslimah mendapat penghargaan "The Most Active Farmer" (2021) pada acara peringatan Hari Ternak yang diadakan di Yogyakarta',
            'dokumentasi' => 'https://i.ibb.co/zmQ6CJB/Cuplikan-layar-2022-11-16-055054.jpg',
        ]);

        Kandang::create([
            'peternak_id' => 1,
            'name' => 'Domba Ekor Tipis',
            'bagi_hasil' => 40,
            'potensi_roi' => 'https://drive.google.com/file/d/1a8pFyZhmkUKp2WnSvW8e9aJUmzGrDCi4/view?usp=share_link',
            'status' => 33,
            'harga' => 100000,
            'paket' => 1,
        ]);
    }
}
