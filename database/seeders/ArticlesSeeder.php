<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            [
                'title' => 'Artificial Intelligence (AI): Pengertian, Perkembangan, Cara Kerja, dan Dampaknya',
                'content' => 'Kemunculan konsep kecerdasan buatan pertama kali ditemukan setelah Perang Dunia II oleh seorang matematikawan dan filsuf muda bernama Alan Turing pada 1947. Alan turing beraggapan bahwa jika manusia bisa mengolah informasi dan memecahkan masalah juga membuat keputusan dari informasi tersebut, maka mesin juga bisa melakukannya. Dilansir dari Science in the News, dari kerangka logis tersebut Alan Turing membuat suatu makalah pada 1950 tentang bagaimana membangun mesin cerdas dan cara menguji kecerdasan mereka. Sejak saat itulah artificial intelligent berkembang pesat hingga sekarang',
                'id_categories' => 1,
                'image' => 'images/pic1.png'
            ],
            [
                'title' => 'Pengaruh Spesifikasi Laptop Terhadap Produktifitas',
                'content' => 'Dalam era digital saat ini, peran laptop dalam mendukung produktivitas tidak dapat dipandang remeh. Sebagai alat kerja multifungsi, laptop menjadi kawan setia bagi banyak individu, baik dalam pekerjaan, pendidikan, maupun kegiatan sehari-hari. Namun, di balik kemudahan yang ditawarkannya, terdapat faktor krusial yang dapat memberikan dampak signifikan pada tingkat produktivitas pengguna: spesifikasi laptop.',
                'id_categories' => 4,
                'image' => 'images/pic2.jpg'
            ],
            [
                'title' => 'Waduh! Gen Z Kena Mental?',
                'content' => 'Gen Z merupakan generasi yang lahir di antara tahun 1997-2012, berdasarkan penelitian dari University College London Gen Z lebih rentan terkena masalah mental. Tingkat depresi Gen Z dua pertiga lebih tinggi daripada millenial.  Menurut studi lain yang dilakukan American Psychological Association menunjukkan bahwa 27 persen dari Gen Z rawan mengalami kecemasan dan juga depresi. Meski demikian, Gen Z cenderung bersifat terbuka dan mencari bantuan.',
                'id_categories' => 5,
                'image' => 'images/pic3.jpg'
            ],
            [
                'title' => 'Dampak IoT Pada Industri dan Kegiatan Sehari-hari',
                'content' => 'Apakah Anda pernah membayangkan bagaimana suatu teknologi dapat mengubah cara kita menjalani kehidupan sehari-hari? Inilah dampak dari Internet of Things (IoT) yang semakin merambah ke berbagai sektor industri dan kehidupan kita. Bersama dengan perkembangan teknologi yang pesat, IoT telah membawa perubahan signifikan dalam efisiensi dan produktivitas, tidak hanya dalam industri, tetapi juga dalam kehidupan sehari-hari.',
                'id_categories' => 2,
                'image' => 'images/pic4.jpg'
            ],
            [
                'title' => 'Pengguna Internet Indonesia Tembus 221 Juta, Didominasi Gen Z',
                'content' => 'Pengguna internet di Indonesia pada awal 2024 ini dilaporkan mencapai 221,5 juta jiwa atau tepatnya 221.563.479 jiwa. Dari jumlah tersebut, Generasi Z (kelahiran 1997-2012 berusia 12-27 tahun) menjadi kelompok usia yang paling banyak terkoneksi internet. Hal tersebut terungkap dalam laporan terbaru bertajuk "Survei Penetrasi Internet Indonesia 2024" yang dirilis oleh Asosiasi Penyelenggara Jasa Internet Indonesia (APJII) baru-baru ini.',
                'id_categories' => 3,
                'image' => 'images/pic5.jpg'
            ],
        ]);
    }
}
