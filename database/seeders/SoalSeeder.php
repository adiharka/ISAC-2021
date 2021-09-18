<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;

class SoalSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $packet_id = DB::table('packets')->insertGetId([
            //Nama Paket soal
            'name' => 'Soal Uji Coba',
            //Deskripsi
            'detail' => 'Soal ini adalah paket soal yang disediakan oleh panitia ISAC 2021 agar kalian bisa mencoba mekanisme pengerjaan soal di web. Hasil dari jawaban kalian tidak akan mempengaruhi penilaian apapun dalam penyisihan',
            //Banyak soal
            'question_count' => 5,
            'open' => Carbon::now()->format('Y-m-d H:i:s'),
            'close' => Carbon::now()->addHours(5)->format('Y-m-d H:i:s'),
            // Durasi dlm menit
            'duration' => '60',
        ]);


        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '1',
            'question' => 'Siapa nama panjang Einstein',
            'A' => 'Albert Einstein',
            'B' => 'Budi Einstein',
            'C' => 'Rahmat Einstein',
            'D' => 'Einstein Santoso',
            'E' => 'Einstein Slamet',
            'right_answer' => 'A',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '2',
            'question' => 'Orang pada gambar sedang ngapain?',
            'img' => 'trial/2.jpg',
            'A' => 'Cosplay Kura-kura',
            'B' => 'Menyatu dengan lantai',
            'C' => 'Gabut',
            'D' => 'Mencari kitab suci',
            'E' => 'Tiarap',
            'right_answer' => 'A',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '3',
            'question' => 'Mana foto Jokowi?',
            'imgAnswer' => 1,
            'A' => 'trial/3A.jpg',
            'B' => 'trial/3B.jpg',
            'C' => 'trial/3C.jpg',
            'D' => 'trial/3D.jpg',
            'E' => 'trial/3E.jpg',
            'right_answer' => 'B',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '4',
            'question' => 'Dari gambar tersebut, berapa jawaban yang tepat?',
            'imgAnswer' => 1,
            'img' => 'trial/4.jpg',
            'A' => 'trial/4A.jpg',
            'B' => 'trial/4B.jpeg',
            'C' => 'trial/4C.jpeg',
            'D' => 'trial/4D.png',
            'E' => 'trial/4E.png',
            'right_answer' => 'A',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '5',
            'question' =>
            'Berapa hasil dari 1201<sup>21</sup> + 1200<sup>21</sup>? ',
            'A' => 'Soal uji coba',
            'B' => 'Ngga usah dihitung beneran',
            'C' => 'Jangan lupa dipersiapkan ya!',
            'D' => 'Semangat',
            'E' => '<3',
            'right_answer' => 'B',
        ]);
    }
}
