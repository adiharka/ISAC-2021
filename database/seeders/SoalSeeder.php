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
            'name' => 'Paket Soal A',
            'detail' => 'Babak penyisihan akan diberikan soal dalam bentuk Multiple Choice Question (MCQ) dengan durasi pengerjaan 100 menit. Metode penilaian menggunakan sistem Item Response Theory (IRT).',
            'question_count' => 6,
            'open' => Carbon::now()->format('Y-m-d H:i:s'),
            'close' => Carbon::now()->addHours(5)->format('Y-m-d H:i:s'),
            'duration' => '5',
            // dlm menit
        ]);


        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '1',
            'question' => 'Makasi udh nyoba websitenya, bebas mau diisi bener apa gak. Jawabannya A',
            'A' => 'Bombardir',
            'B' => 'Nuklir',
            'C' => 'Takbir',
            'D' => 'Bombay',
            'E' => 'Tahu',
            'right_answer' => 'A',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '2',
            'question' => 'Contoh soal yg pake gambar, nyaman nggak nih pakeknya',
            'img' => '1.jpeg',
            'A' => 'Rusa',
            'B' => 'Singa',
            'C' => 'Macan',
            'D' => 'Kucing',
            'E' => 'Angsa',
            'right_answer' => 'A',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '3',
            'question' => 'Ini contoh soal yang pilgannya gambar. Nyaman nggak diliatnya??',
            'imgAnswer' => 1,
            'A' => '2A.jpg',
            'B' => '2B.jpg',
            'C' => '2C.jpg',
            'D' => '2D.jpg',
            'E' => '2A.jpg',
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
            'E' => '4b.png',
            'right_answer' => 'A',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '5',
            'question' =>
            'Soal pake syntax html jadi bisa enter atau kuadrat.<br>
            Contohnya H<sub>2</sub>O + 1200<sup>21</sup>. <br>
            <strong>Tebel</strong> ama <small>Kecil</small> atau <strike>Coret</strike> <em>Italic</em>!',
            'A' => 'Cakeb',
            'B' => 'Mantab',
            'C' => 'James',
            'D' => 'Pocari',
            'E' => 'Asep',
            'right_answer' => 'B',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '6',
            'question' => 'Soal tambah2 biar banyak. Ini soalnya diacak tiap peserta yak',
            'imgAnswer' => 1,
            'img' => '4.png',
            'A' => '4a.png',
            'B' => '4b.png',
            'C' => '4c.png',
            'D' => '4d.png',
            'E' => '4.png',
            'right_answer' => 'A',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '7',
            'question' =>
            'Soal lagi, jawabannya pake emoji wkwkwk.<br>
            Pake emot ni ngab H<sub>2</sub>O + 1200<sup>21</sup>. <br>
            <strong>Tebel</strong> ama <small>Kecil</small> atau <strike>Coret</strike> <em>Italic</em>!',
            'img' => '4.png',
            'A' => '✰⋆🌟✪🔯✨',
            'B' => '💨🌬️',
            'C' => '🌎🌎',
            'D' => '⏳',
            'E' => '⏳⏳⏳',
            'right_answer' => 'C',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '8',
            'question' =>
            'Kalo ada kritik saran apapun nanti bisa ditulis abis akhiri soal yaa!',
            'A' => 'Mlz',
            'B' => 'Gamao',
            'C' => 'Yes',
            'D' => 'Ngga',
            'E' => 'Ngga',
            'right_answer' => 'C',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '9',
            'question' =>
            'Jangan lupa nanti habis akhiri soal buat ngisi kritik saran ngab!',
            'A' => 'Ngga',
            'B' => 'Oke',
            'C' => 'Ngga',
            'D' => 'Ngga',
            'E' => 'Ngga',
            'right_answer' => 'B',
        ]);


        $packet_id = DB::table('packets')->insertGetId([
            'name' => 'Paket Soal B',
            'detail' => 'Babak penyisihan akan diberikan soal dalam bentuk Multiple Choice Question (MCQ) dengan durasi pengerjaan 100 menit. Metode penilaian menggunakan sistem Item Response Theory (IRT).',
            'question_count' => 4,
            'open' => Carbon::now()->format('Y-m-d H:i:s'),
            'close' => Carbon::now()->addHours(5)->format('Y-m-d H:i:s'),
            'duration' => '5',
            // dlm menit
        ]);


        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '1',
            'question' => 'Makasi udh nyoba websitenya, bebas mau diisi bener apa gak. Jawabannya A',
            'A' => 'Bombardir',
            'B' => 'Nuklir',
            'C' => 'Takbir',
            'D' => 'Bombay',
            'E' => 'Kambing',
            'right_answer' => 'A',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '2',
            'question' => 'Contoh soal yg pake gambar, nyaman nggak nih pakeknya',
            'img' => '1.jpeg',
            'A' => 'Rusa',
            'B' => 'Singa',
            'C' => 'Macan',
            'D' => 'Kucing',
            'E' => 'Burung',
            'right_answer' => 'A',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '3',
            'question' => 'Ini contoh soal yang pilgannya gambar. Nyaman nggak diliatnya??',
            'imgAnswer' => 1,
            'A' => '2A.jpg',
            'B' => '2B.jpg',
            'C' => '2C.jpg',
            'D' => '2D.jpg',
            'E' => '2A.jpg',
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
            'E' => '4b.png',
            'right_answer' => 'A',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '5',
            'question' =>
            'Kalo ada kritik saran apapun nanti bisa ditulis abis akhiri soal yaa!',
            'A' => 'Mlz',
            'B' => 'Gamao',
            'C' => 'Yes',
            'D' => 'Ngga',
            'E' => 'Ngga',
            'right_answer' => 'C',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '6',
            'question' =>
            'Jangan lupa nanti habis akhiri soal buat ngisi kritik saran ngab!',
            'A' => 'Ngga',
            'B' => 'Oke',
            'C' => 'Ngga',
            'D' => 'Ngga',
            'E' => 'Ngga',
            'right_answer' => 'B',
        ]);
    }
}
