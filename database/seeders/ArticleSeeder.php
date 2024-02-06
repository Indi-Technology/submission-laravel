<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            [
                'title' => 'Sambut Hari Pelanggan Nasional 2023, Intip Inovasi Customer Experience di Tokopedia Care',
                'content' => 'Yogyakarta, 31 Agustus 2023 – Di era experience economy, konsumen tidak lagi hanya menginginkan barang atau jasa, tetapi juga pengalaman mengesankan. Memaksimalkan nilai tambah pada pengalaman pelanggan (customer experience) menjadi hal yang sangat penting.

                “Tokopedia sebagai perusahaan teknologi Indonesia berupaya memberikan pengalaman terbaik bagi pelanggan lewat Tokopedia Care–pusat layanan pelanggan yang 100% berbasis digital dan tersedia 24/7 melalui berbagai kanal–sehingga pertanyaan pelanggan dapat dijawab secara cepat, tepat dan transparan,” ungkap Senior Vice President of Sales, Operations, and Product Tokopedia, Rudy Dalimunthe.
                
                Rudy menambahkan, “Tokopedia Care menggabungkan tiga elemen dalam memberikan customer experience terbaik, yaitu (1) human touch lewat tim Customer First Squad atau CFS, (2) teknologi dan (3) voice of customer dengan mempertimbangkan umpan balik dari pelanggan.”',
                'image' => null,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kembali digelar, Tokopedia terus gencarkan inklusivitas di industri teknologi lewat START Women in Tech',
                'content' => 'Tokopedia lewat Tokopedia Academy kembali menggelar konferensi tahunan START Women in Tech pada 17 Juni 2023. Tahun ini, konferensi yang diadakan secara hybrid tersebut memiliki tema bertajuk “A Way Forward & Beyond for Women in Technology”, dengan harapan dapat terus menginspirasi para perempuan untuk berkontribusi dalam memajukan industri teknologi tanah air.

                Sedikit berbeda dari tahun-tahun sebelumnya, START Women in Tech diadakan secara hybrid atau perpaduan antara online dan offline, dimana sesi offline merupakan sesi talk show bersama para pemimpin Tokopedia, Gojek, dan GoTo, dan memberikan kesempatan partisipan untuk menyaksikannya secara langsung di auditorium Tokopedia Tower. Para partisipan yang hadir secara langsung juga mendapatkan kesempatan untuk berdiskusi lebih dalam dan membangun jejaring pada sesi networking.',
                'image' => null,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Teknologi Berdampak Positif Bagi Masyarakat',
                'content' => 'Teknologi telah berkembang pesat selama beberapa dekade terakhir dan memberikan banyak manfaat positif bagi kehidupan kita.

                Dalam artikel ini, saya akan membahas beberapa teknologi positif yang
                telah memberikan dampak positif bagi masyarakat.
                
                1. Internet
                Internet adalah salah satu teknologi yang paling penting dan paling berpengaruh dalam sejarah manusia. Internet telah mengubah cara kita berkomunikasi, bekerja, dan belajar. Internet memungkinkan kita untuk terhubung dengan orang-orang dari seluruh dunia, mencari informasi dengan mudah, dan mengakses layanan online yang memberikan banyak manfaat bagi masyarakat.
                
                2. Telepon Pintar
                Telepon pintar adalah teknologi yang sangat populer di seluruh dunia. Telepon pintar telah mengubah cara kita hidup dan bekerja. Telepon pintar memungkinkan kita untuk terhubung dengan orang lain, melakukan pekerjaan, dan mengakses informasi dengan mudah. Telepon pintar juga memungkinkan kita untuk mengakses aplikasi yang bermanfaat untuk kesehatan, pendidikan, dan keamanan.
                
                3. Teknologi Medis
                Teknologi medis telah mengalami kemajuan yang luar biasa selama beberapa tahun terakhir. Teknologi medis telah memberikan banyak manfaat bagi masyarakat dalam bidang kesehatan. Teknologi medis membantu dokter dan tenaga medis dalam mendiagnosis penyakit dengan lebih cepat dan akurat, serta memberikan pengobatan yang lebih efektif bagi pasien.
                
                4. Energi Terbarukan
                Energi terbarukan adalah teknologi yang sangat penting bagi masa depan kita. Energi terbarukan seperti energi surya dan energi angin membantu mengurangi polusi dan mengurangi ketergantungan kita pada bahan bakar fosil yang semakin langka. Energi terbarukan juga membantu mengurangi biaya energi dan memberikan keuntungan bagi lingkungan.
                
                5. Robotika
                Robotika adalah teknologi yang memungkinkan kita untuk mengembangkan robot yang dapat membantu kita dalam pekerjaan sehari-hari. Robotika membantu kita dalam mempercepat produksi, memperbaiki keamanan, dan membantu dalam eksplorasi. Robotika juga membantu mengurangi risiko pada pekerjaan yang berbahaya.
                
                Dalam kesimpulan, teknologi memiliki banyak manfaat positif bagi kehidupan kita. Internet, telepon pintar, teknologi medis, energi terbarukan, dan robotika adalah beberapa teknologi positif yang telah memberikan dampak positif bagi masyarakat. Namun, kita harus selalu berhati-hati dan mempertimbangkan dampak yang mungkin terjadi dari penggunaan teknologi.',
                'image' => null,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pemanfaatan ChatGPT Dalam Membantu Pekerjaan Khususnya Dalam Bidang Pemrograman',
                'content' => 'Pemrograman adalah salah satu bidang yang pastinya di zaman modern ini makin dijadikan sorotan. Kenapa tidak, bidang ini semakin berkembang pesat karena telah membangun sebagian besar perkembangan di era digital saat ini. Perkembangan bidang pemrograman tidak hanya terjadi pada tingkat teknologi, tetapi juga pada lingkup penggunaannya. Dalam era digital seperti saat ini, hampir semua hal dapat dilakukan dengan bantuan program atau aplikasi. Mulai dari kegiatan sehari-hari seperti berbelanja, bermain game, hingga menjalankan bisnis atau mengakses informasi dapat dilakukan dengan bantuan program atau aplikasi.

                Penggunaan kecerdasan buatan (AI) dan pembelajaran mesin untuk meningkatkan efektivitas dan kualitas program merupakan tren baru dalam pengembangan perangkat lunak. Dalam situasi ini, perangkat lunak yang didukung oleh AI dan teknologi pembelajaran mesin dapat mengidentifikasi pola penggunaan dan memberi pengguna solusi yang lebih terspesialisasi dan efisien. Program chatbot yang didukung AI, misalnya, dapat merespons pertanyaan konsumen dengan lebih cepat dan akurat. Salah satu program chatbot yang sedang menarik perhatian dan semakin berkembang adalah ChatGPT.
                
                ChatGPT adalah sistem yang menggunakan kecerdasan buatan untuk memproses bahasa alami dan merespons dengan cara yang mirip dengan manusia. Dalam penggunaannya, ChatGPT dapat berkomunikasi dengan pengguna melalui pesan teks. Dalam beberapa kasus, ChatGPT bahkan mampu memberikan respon yang lebih akurat dan cepat daripada manusia.',
                'image' => null,
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
