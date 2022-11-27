<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PopUp;
use App\Models\Panduan;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\AboutUs;
use App\Models\Peternak;
use App\Models\Kandang;
use App\Models\Pembayaran;
use App\Models\Investasi;
use App\Models\Ulasan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
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

        Faq::create([
            'title' => 'Ini adalah FAQ 1',
            'description' => 'Ini Adalah Description FAQ 1'
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
            'photo' => 'https://i.ibb.co/zmQ6CJB/Cuplikan-layar-2022-11-16-055054.jpg',
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
            'unit_tersedia' => 33,
            'status' => 1,
            'harga' => 100000,
            'paket' => 1,
            'proposal' => 'https://drive.google.com/file/d/1a8pFyZhmkUKp2WnSvW8e9aJUmzGrDCi4/view?usp=share_link',
        ]);

        Pembayaran::create([
            'user_id' => 1,
            'bank' => 'BCA',
            'rekening' => '5070533828'
        ]);

        Investasi::create([
            'user_id' => 1,
            'kandang_id' => 1,
            'pembayaran_id' => 1,
            'jumlah_unit' => 5,
            'total_harga' => 500000,
            'bukti_pembayaran' => 'Ini Image',
        ]);

        Ulasan::create([
            'peternak_id' => 1,
            'name' => 'Agung Setyawan',
            'bidang_ahli' => "Uji Kandang",
            'rating' => 5,
            'ulasan' => 'Kandang sudah layak menjadi tempat ternak. Standart pakan dengan wilayah sekitar juga sudah sangat cocok untuk pemeliharaan.',
        ]);

        Ulasan::create([
            'peternak_id' => 1,
            'name' => 'Dimas Sapoetra',
            'bidang_ahli' => "Ahli Kesehatan Hewan",
            'rating' => 4.7,
            'ulasan' => 'Kesehatan stabil dibantu dengan monitoring yang bagus dan modern membuat kesehatan makin terjaga.',
        ]);

        Ulasan::create([
            'peternak_id' => 1,
            'name' => 'Evelyn Wijaya',
            'bidang_ahli' => "Ahli Pakan",
            'rating' => 4.7,
            'ulasan' => 'Pemberian pakan sudah sangat bagus dengan sistem yang benar dan baik',
        ]);
    }
}
