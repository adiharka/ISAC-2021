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
            'name' => 'Soal Ujian Manteb',
            'detail' => 'Babak penyisihan akan diberikan 50 soal dalam bentuk Multiple Choice Question (MCQ) dengan durasi pengerjaan 100 menit. Metode penilaian menggunakan sistem Item Response Theory (IRT).',
            'question_count' => 6,
            'open' => Carbon::now()->format('Y-m-d H:i:s'),
            'close' => Carbon::now()->addHours(5)->format('Y-m-d H:i:s'),
            'duration' => '1',
            // dlm menit
        ]);


        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '1',
            'question' => 'Soal normal gada gambar atau aneh2 lainnya',
            'A' => 'Bombardir',
            'B' => 'Nuklir',
            'C' => 'Takbir',
            'D' => 'Bombay',
            'right_answer' => 'A',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '2',
            'question' => 'Soal pake gambar ya kek gini ngab',
            'img' => '1.jpeg',
            'A' => 'Rusa',
            'B' => 'Singa',
            'C' => 'Macan',
            'D' => 'Kucing',
            'right_answer' => 'A',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '3',
            'question' => 'Soal jawabannya pake gambar',
            'imgAnswer' => 1,
            'A' => '2A.jpg',
            'B' => '2B.jpg',
            'C' => '2C.jpg',
            'D' => '2D.jpg',
            'right_answer' => 'C',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '4',
            'question' => 'Soal pake gambar trus jawabannya pake gambar uga',
            'imgAnswer' => 1,
            'img' => '4.png',
            'A' => '4a.png',
            'B' => '4b.png',
            'C' => '4c.png',
            'D' => '4d.png',
            'right_answer' => 'A',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '5',
            'question' =>
            'Soal pake syntax html jadi bisa enter atau kuadrat ngab.<br>
            Mencoba H<sub>2</sub>O + 1200<sup>21</sup>. <br>
            <strong>Tebel</strong> ama <small>Kecil</small> atau <strike>Coret</strike> <em>Italic</em>!',
            'A' => 'Catty',
            'B' => 'Pussy',
            'C' => 'James',
            'D' => 'Pocari',
            'right_answer' => 'B',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '6',
            'question' => 'Soal tambah2 biar banyak',
            'imgAnswer' => 1,
            'img' => '4.png',
            'A' => '4a.png',
            'B' => '4b.png',
            'C' => '4c.png',
            'D' => '4d.png',
            'right_answer' => 'A',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '7',
            'question' =>
            'Wangi-wangi huh hah.<br>
            Pake emot ni ngab H<sub>2</sub>O + 1200<sup>21</sup>. <br>
            <strong>Tebel</strong> ama <small>Kecil</small> atau <strike>Coret</strike> <em>Italic</em>!',
            'img' => '4.png',
            'A' => '✰⋆🌟✪🔯✨',
            'B' => '💨🌬️',
            'C' => '🌎🌎',
            'D' => '⏳',
            'right_answer' => 'C',
        ]);
    }
}
