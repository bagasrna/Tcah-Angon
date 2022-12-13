<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
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
        User::create([
            'first_name' => 'Fadli',
            'last_name' => 'Bagas',
            'address' => 'Jalan Dampit No 88',
            'phone' => '081234567890',
            'email' => 'bagasrnfull@gmail.com',
            'password' => bcrypt('spenesa234'),
            'activation_code' => 234765,
            'is_active' => 1,
        ]);

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
            'description' => 'Cara Investasi
            1. Tentukan Investasi yang tepat dan baik
            2. Pahami proses investasi
            3. Verifikasi dengan akurat
            5. Amati pergerakan harga
            6. Jangan takut memulai'
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

        Peternak::create([
            'name' => 'Pak Sugeng',
            'status' => 'Peternak modern domba lokal',
            'photo' => 'https://i.ibb.co/zmQ6CJB/Cuplikan-layar-2022-11-16-055054.jpg',
            'address' => 'Dampit, Malang',
            'rating' => 5,
            'description' => 'Pak  Sugeng adalah peternak lokal modern yang telah bergabung Tcah Angon dan telah banyak berkerjasama dengan sukses. Pak Sugeng peternak yang sangat menekuni beberapa ternak dan sistem fattening yang modern.',
            'dokumentasi' => 'https://i.ibb.co/zmQ6CJB/Cuplikan-layar-2022-11-16-055054.jpg',
        ]);

        Peternak::create([
            'name' => 'Pak Budi',
            'status' => 'Peternak modern domba lokal',
            'photo' => 'https://i.ibb.co/zmQ6CJB/Cuplikan-layar-2022-11-16-055054.jpg',
            'address' => 'Dampit, Malang',
            'rating' => 5,
            'description' => 'Pak Budi adalah peternak lokal modern yang telah bergabung Tcah Angon dan telah banyak berkerjasama dengan sukses. Pak Sugeng peternak yang sangat ramah dan memiliki kandang yang sudah sangat mumpuni dalam program ternak domba yang baik.',
            'dokumentasi' => 'https://i.ibb.co/zmQ6CJB/Cuplikan-layar-2022-11-16-055054.jpg',
        ]);

        Kandang::create([
            'peternak_id' => 1,
            'name' => 'Domba Ekor Tipis',
            'foto' => 'ibb.co',
            'bagi_hasil' => 40,
            'potensi_roi' => 'https://drive.google.com/file/d/1a8pFyZhmkUKp2WnSvW8e9aJUmzGrDCi4/view?usp=share_link',
            'unit_tersedia' => 165,
            'status' => 1,
            'harga' => 100000,
            'harga_kg' => 55000,
            'paket' => 1,
            'proposal' => 'https://drive.google.com/file/d/1a8pFyZhmkUKp2WnSvW8e9aJUmzGrDCi4/view?usp=share_link',
            'dibutuhkan' => 16500000,
            'terkumpul' => 0,
            'durasi' => 3,
            'berat_awal' => 60,
            'estimasi' => 20000000,
            'berat_akhir' => 90,
            'persentase' => 24.57,
            'berat' => 82,
            'kesehatan' => "Baik",
            'pakan' => "Standard",
        ]);

        Pembayaran::create([
            'peternak_id' => 1,
            'bank' => 'BCA',
            'rekening' => '5070533828'
        ]);

        Pembayaran::create([
            'peternak_id' => 1,
            'bank' => 'BRI',
            'rekening' => '6212312321'
        ]);

        Pembayaran::create([
            'peternak_id' => 2,
            'bank' => 'BCA',
            'rekening' => '5070533828'
        ]);

        Pembayaran::create([
            'peternak_id' => 3,
            'bank' => 'BCA',
            'rekening' => '5070533828'
        ]);

        Investasi::create([
            'user_id' => 1,
            'kandang_id' => 1,
            'pembayaran_id' => 1,
            'jumlah_unit' => 5,
            'total_harga' => 500000,
            'is_done' => 0,
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
