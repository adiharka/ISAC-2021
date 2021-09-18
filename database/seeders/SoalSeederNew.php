<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;

class SoalSeederNew extends Seeder
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
            'name' => 'Soal Penyisihan',
            //Deskripsi
            'detail' => 'Babak penyisihan akan diberikan 50 soal dalam bentuk Multiple Choice Question (MCQ) dengan durasi pengerjaan 100 menit. Metode penilaian menggunakan sistem Item Response Theory (IRT).<br>
            ⛔️DISCLAIMER: Panitia ISAC 2021 tidak bertanggung jawab atas kendala jaringan dan device. Segala bentuk persiapan jaringan internet, device yang digunakan, dan koordinasi antar anggota tim sepenuhnya menjadi tanggung jawab Peserta Olimpiade ISAC 2021.',
            //Banyak soal
            'question_count' => 50,
            'open' => Carbon::now()->format('Y-m-d H:i:s'),
            'close' => Carbon::now()->addHours(5)->format('Y-m-d H:i:s'),
            // Durasi dlm menit
            'duration' => '100',
        ]);

        // soal logika
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '1',
            'question' =>
            '17 @ 5 # 2 = 4 <br>
            13 @ 3 # 6 = 6 <br>
             Maka 26794 @ 65 #1354 adalah …',
            'A' => '19766',
            'B' => '18676',
            'C' => '19586',
            'D' => '18956',
            'E' => '16889',
            'right_answer' => 'D',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '2',
            'question' => 'Pada pelaksanaan ospek fakultas, mahasiswa dibagi ke dalam x ruang kelas di Fakultas Sains dan Teknologi.
                           Apabila satu kelas diisi 40 mahasiswa, maka akan ada sisa 2 kelas. Namun jika satu kelas diisi 36 mahasiswa,
                           maka akan ada 8 mahasiswa yang tidak mendapatkan ruang kelas. Berapakah nilai x?',
            'A' => '22',
            'B' => '15',
            'C' => '20',
            'D' => '30',
            'E' => '32',
            'right_answer' => 'A',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '3',
            'question' => 'Hasil dari 3<sup>2021</sup> * 2021 * 213 * 3 % 10 adalah',

            'A' => '3',
            'B' => '1',
            'C' => '2',
            'D' => '7',
            'E' => '9',
            'right_answer' => 'E',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '4',
            'question' =>
            'Terdapat 8 mahasiswa yang harus iuran sebesar x rupiah untuk kebutuhan praktikum. <br>
            Apabila terdapat 2 mahasiswa yang tidak dapat mengikuti praktikum, berapa kenaikan iuran tiap mahasiswa?',
            'A' => '0',
            'B' => 'x/2',
            'C' => '3x/8',
            'D' => 'x/24',
            'E' => 'x/12',
            'right_answer' => 'D',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '5',
            'question' =>
            '<ul>
            <li>A -> L</li>
            <li>S -> D</li>
            <li>I -> T</li>
            <li>* adalah perkalian</li>
            <li>/ adalah pembagian</li>
            <li>+ adalah penjumlahan</li>
            <li>- adalah pengurangan</li>
            <li>^2 adalah kuadrat</li>
            </ul>
            Maka 5 adalah hasil operasi dari …
            ',
            'A' => 'HPIJ * AXBP + HPIJ',
            'B' => 'GPZNPC + IPBEPC',
            'C' => 'IXVP * SJP - HPIJ',
            'D' => 'TCPB * HPIJ * CDA',
            'E' => 'SJP / HPIJ + IXVP + HPIJ',
            'right_answer' => 'C',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '6',
            'question' =>
            'Berapakah 3<sup>1945</sup> × 2<sup>1948</sup> / 6<sup>500</sup> mod  10 ?',
            'A' => '8',
            'B' => '6',
            'C' => '4',
            'D' => '2',
            'E' => '0',
            'right_answer' => 'A',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '7',
            'question' =>
            'Diketahui A, B, C dan D adalah empat bilangan bulat positif dengan syarat A < B < C < D. Jika hasil kali A dan C adalah 28,
            dan hasil kali B dan D adalah 55 . Berapakah nilai B dikali C ?',
            'A' => '5',
            'B' => '11',
            'C' => '21',
            'D' => '35',
            'E' => '44',
            'right_answer' => 'D',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '8',
            'question' =>
            'Diketahui sebuah bilangan bulat yang terbentuk dari empat angka berbeda. Bila keempat angka tersebut ditambah, maka hasil penjumlahannya adalah 20.
            Angka pertama ditambah angka terakhir bernilai sama dengan angka kedua ditambah angka ketiga.
            Selisih angka pertama dan angka kedua sama dengan selisih angka ketiga dan angka keempat.
            Angka pertama dikali angka ketiga habis dibagi dengan hasil kali angka kedua dengan angka keempat.
            Bilangan tersebut adalah …',
            'A' => '5',
            'B' => '11',
            'C' => '21',
            'D' => '35',
            'E' => '44',
            'right_answer' => 'D',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '9',
            'question' =>
            'Jika 15a/b = 6 dan b ≠ 0, berapa persentase b terhadap 15a – 3b?',
            'A' => '0,16%',
            'B' => '0,33%',
            'C' => '16,67%',
            'D' => '33,33%',
            'E' => '30%',
            'right_answer' => 'B',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '10',
            'question' =>
            'Berapakah nilai 3,5% dari 355 ?',
            'A' => '1,2425',
            'B' => '2,485',
            'C' => '12,425',
            'D' => '24,825',
            'E' => '124,25',
            'right_answer' => 'C',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '11',
            'question' =>
            '⌈7/5⌉ + ⌈9/4⌉ + ⌈3/9⌉ + ⌊11/2⌋ – ⌊27/4⌋ + ⌊1/2⌋ – ⌈6/8⌉ + ⌊9/5⌋ – ⌈24/20⌉ – ⌊1/3⌋ = …',
            'A' => '1,75',
            'B' => '2',
            'C' => '2,75',
            'D' => '3',
            'E' => '3,75',
            'right_answer' => 'D',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '12',
            'question' =>
            'Buna dilahirkan pada abad ke-19 dan ia meninggal pada abad ke-20.
            Ia meninggal tepat pada umur x di tahun x<sup>2</sup>.
            Pada tahun berapa ia dilahirkan?',
            'A' => '1884',
            'B' => '1892',
            'C' => '1900',
            'D' => '1908',
            'E' => '1916',
            'right_answer' => 'B',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '13',
            'question' =>
            '43 pasangan menghadiri sebuah pesta. Setiap tamu bersalaman dengan tamu lainnya, tetapi tamu tidak akan bersalaman dengan pasangan sendiri.<br>
            Berapa jumlah salaman yang terjadi dalam pesta tersebut?',
            'A' => '3541',
            'B' => '3555',
            'C' => '3598',
            'D' => '3612',
            'E' => '3655',
            'right_answer' => 'D',
        ]);

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '14',
            'question' =>
            'Pernyataan 1: “Dalam daftar ini terdapat tepat 915 pernyataan yang salah.”<br>
            Pernyataan 2: “Dalam daftar ini terdapat tepat 914 pernyataan yang salah.”<br>
            . . .<br>
            Pernyataan 915: “Dalam daftar ini terdapat tepat 1 pernyataan yang salah.”<br>
            Jika hanya ada 1 pernyataan yang benar, pernyataan nomor berapakah yang tepat?',
            'A' => '506',
            'B' => '507',
            'C' => '914',
            'D' => '915',
            'E' => 'Semua jawaban salah',
            'right_answer' => 'E',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '15',
            'question' =>
            '(A ∧ (B ∨ A)) ∧ (~B ∨ (A ∧ ~B)) memiliki nilai yang sama dengan',
            'A' => 'A ∨ ~B',
            'B' => '~A ∨ B',
            'C' => 'A ∧ B',
            'D' => 'A ∧ ~B',
            'E' => '(~A ∧ B) ∨ A',
            'right_answer' => 'D',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '16',
            'question' =>
            'Urutan nilai kebenaran dari p ∧ q  → (q ∨ r) adalah …',
            'A' => 'TTTTTTTT',
            'B' => 'TTFFTTTT',
            'C' => 'TTTTFFTT',
            'D' => 'TTTTTTFF',
            'E' => 'e)	TTFFTTFF',
            'right_answer' => 'A',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '17',
            'question' =>
            'Urutan nilai kebenaran dari p ∨ r → (¬p ∧ (q ∨ ¬r)) adalah …',
            'A' => 'TTFFTTTT',
            'B' => 'FFFFTTFT',
            'C' => 'TTTTFFTT',
            'D' => 'TTTTTTFF',
            'E' => 'TTFFTTFF',
            'right_answer' => 'B',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '18',
            'question' =>
            'Perhatikan kalimat berikut:<br>
            &emsp “Ada idola yang digemari oleh semua orang.”<br>
            Terjemahan kalimat di atas dengan menggunakan kuantor adalah …',
            'A' => '(∀x)( Ǝy)F(x,y)',
            'B' => '(∀x)~(y)( Ǝz)F(x,y,z)',
            'C' => '(Ǝx)(∀y)F(x,y)',
            'D' => '(Ǝx)(y)(∀z)F(x,y,z)',
            'E' => 'TTFFTTFF',
            'right_answer' => 'C',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '19',
            'question' =>
            'Perhatikan kalimat berikut:<br>
            &emsp “Tidak semua lulusan kuliah memiliki pekerjaan.”<br>
            Terjemahan kalimat di atas dengan menggunakan kuantor adalah …',
            'A' => '((∀x)F(x))',
            'B' => '~((∀x)F(x))',
            'C' => '((Ǝx)F(x))',
            'D' => '~((Ǝx)F(x))',
            'E' => '(Ǝ(∀x)F(x))',
            'right_answer' => 'B',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '20',
            'question' =>
            'Terdapat angka 0, 1, 2, 4, 6, dan 9 yang akan membentuk suatu bilangan.
            Dengan pengulangan angka tidak diperbolehkan,
            banyaknya susunan bilangan empat angka yang habis dibagi 5 dan kurang dari 6000 yang dapat dibentuk oleh angka-angka tersebut adalah …',
            'A' => '12',
            'B' => '24',
            'C' => '36',
            'D' => '48',
            'E' => '60',
            'right_answer' => 'C',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '21',
            'question' =>
            'Mikey menemukan suatu kertas, karena terburu-buru dia terjatuh dan pandangannya menjadi kabur. Isi kertas tersebut :<br>
            <ul><li>&emsp KEKW
            </li></ul>
            Setelah Mikey berputar-putar, dia akhirnya bisa membaca teks tersebut. Apakah arti teks tersebut?',
            'A' => 'LULS',
            'B' => 'RLRD',
            'C' => 'LSLC',
            'D' => 'UWUM',
            'E' => 'MNML',
            'right_answer' => 'B',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '22',
            'question' =>
            'Kamu sedang memecahkan Teka-Teki berikut :<br>
            &emsp OMEGALUL<br>
            Pada Teka-teki ini terdapat keterangan :<br>
            Kurangkan mereka dengan yang paling akhir, kemudian jumlahkan<br>
            Apakah jawaban dari Teka-Teki tersebut?',
            'A' => '112',
            'B' => '120',
            'C' => '-122',
            'D' => '-120',
            'E' => '60',
            'right_answer' => 'A',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '23',
            'question' =>
            'M, S, T, S, W, ..., ..., K, F, J',
            'A' => 'Y,A',
            'B' => 'O,W',
            'C' => 'R,T',
            'D' => 'X,D',
            'E' => 'V,Y',
            'right_answer' => 'C',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '24',
            'question' =>
            '1, 8, 28, … , … , 56',
            'A' => '46,57',
            'B' => '50,30',
            'C' => '48,87',
            'D' => '56,70',
            'E' => '55,45',
            'right_answer' => 'D',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '25',
            'question' =>
            'S, J, D, ..., ..., M, E, A',
            'A' => 'F,T',
            'B' => 'L,J',
            'C' => 'E,J',
            'D' => 'T,A',
            'E' => 'S,D',
            'right_answer' => 'A',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '26',
            'question' =>
            'Perhatikan beberapa kalimat berikut beserta maknanya dalam bahasa Wakanda!
            <ul>
            <li>Rakyan adalah bos mafia: Rakyan aw! s0PbWh f1Maw</li>
            <li>Krisna sebagai wakil bos: Krisna wa v!c3 s0PbWh.</li>
            <li>Mafia yang bertarung: f1Maw b3bzh pnt1.</li>
            </ul>
            “Wakil bos mafia yang bertarung adalah Krisna” dalam bahasa Wakanda adalah …',
            'A' => 'v!ce sOPbuHa f1Maw b3bzh vm1E aw! Krisna',
            'B' => 'v!c3 s0PbWh n3fv !ng pnt1 wa Krisna',
            'C' => 'v!c3 spB4Wh f1Maw b3bzh pnt1 wa Krisna',
            'D' => 'v!c3 s0PbWh f1Maw b3bzh pnt1 aw! Krisna',
            'E' => 'v!c3 s0PbWh nEfu !ng vm!3 aw! Krisna',
            'right_answer' => 'D',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '27',
            'question' =>
            'Perhatikan syarat posisi duduk berikut :<br
            Terdapat meja berbentuk lingkaran dengan terdapat 8 Kursi yang mengelilingi meja tersebut dan tertata rapi. Terdapat 8 orang sedang bergurau di meja tersebut.
            Suatu saat, Sutha mulai usil dan menjewer telinga teman yang duduk di dekat kursinya. Akan tetapi, sutha tidak bisa menjewer teman yang kursinya berada selisih dua kursi dari kursinya.
            Pada saat itu Sutha melihat keaadan di meja dengan kondisi :<br>
            <ol>
            <li>Jenny dan Jojon saling berseberangan</li>
            <li>Di samping Jojon, terdapat Leonardo yang dapat menjewer telinga si Tomy</li>
            <li>Shahnaz dapat menjewer telinga Jenny</li>
            <li>Sutha hanya dapat dijewer oleh Dewangga dan Jojon</li>
            <li>James tidak bisa menjewer telinga siapapun kecuali Jenny dan Tomy</li>
            </ol>
            Dari keadaan diatas, Dewangga merasa ada yang menjewer telinganya. Siapakah orang yang memungkinkan untuk menjewer telinga Dewangga?',
            'A' => 'Jenny',
            'B' => 'James',
            'C' => 'Shahnaz',
            'D' => 'Jojon',
            'E' => 'Tomy',
            'right_answer' => 'C',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '28',
            'question' =>
            'Perhatikan syarat posisi duduk berikut :<br>
            Terdapat meja berbentuk lingkaran dengan terdapat 8 Kursi yang mengelilingi meja tersebut dan tertata rapi. Terdapat 8 orang sedang bergurau di meja tersebut.
            Suatu saat, Sutha mulai usil dan menjewer telinga teman yang duduk di dekat kursinya. Akan tetapi, sutha tidak bisa menjewer teman yang kursinya berada selisih dua kursi dari kursinya.
            ada saat itu Sutha melihat keaadan di meja dengan kondisi :
            <ul>
            <li>Jenny dan Jojon saling berseberangan</li>
            <li>Di samping Jojon, terdapat Leonardo yang dapat menjewer telinga si Tomy</li>
            <li>Shahnaz dapat menjewer telinga Jenny</li>
            <li>Sutha hanya dapat dijewer oleh Dewangga dan Jojon</li>
            <li>James tidak bisa menjewer telinga siapapun kecuali Jenny dan Tomy</li>
            </ul>
            Dari keadaan diatas, siapakah yang memiliki selisih jarak kursi terjauh dari kursi yang diduduki oleh Tomy?',
            'A' => 'Jenny',
            'B' => 'James',
            'C' => 'Dewangga',
            'D' => 'Sutha',
            'E' => 'Tomy',
            'right_answer' => 'C',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '29',
            'question' =>
            'Dinda berangkat pergi menemui Mirza yang sedang sakit di rumahnya setelah pulang sekolah pada pukul 15.00.
            Perjalanan tersebut ditemput selama 30 Menit 9000 Detik hingga ia sampai di rumah Mirza<br>
            Pernyataan yang sesuai adalah …',
            'img'=>'penyisihan/29.png',
            'A' => 'X < Y',
            'B' => '2X < Y',
            'C' => 'X > 2Y',
            'D' => '3X ≠ 4Y',
            'E' => 'Tidak ada pernyataan yang sesuai',
            'right_answer' => 'E',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '30',
            'question' =>
            'Perhatikan tabel berikut! Berapakah yang nilai “ ? “ yang memenuhi?',
            'img'=>'penyisihan/30.png',
            'A' => '√81',
            'B' => '√1',
            'C' => '√49',
            'D' => '81',
            'E' => '2',
            'right_answer' => 'A',
        ]);
        //soal SI dasar
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '31',
            'question' =>
            'Sistem informasi yang berfungsi untuk manajemen hubungan pelanggan, manajemen penjualan, dan manajemen promosi adalah …',
            'A' => 'Manufacturing information systems',
            'B' => 'Accounting information systems',
            'C' => 'Enterprise collaboration systems',
            'D' => 'Marketing information systems',
            'E' => 'Cross-functional enterprise systems',
            'right_answer' => 'D',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '32',
            'question' =>
            'Berikut strategi-strategi penggunaan teknologi informasi untuk perusahaan, <i>kecuali</i>…',
            'A' => 'Mengembangkan sistem informasi antar perusahaan untuk mempertahankan pelanggan atau pemasok.',
            'B' => 'Melakukan investasi besar terhadap IT untuk membangun hambatan masuk terhadap pesaing',
            'C' => 'Menyertakan komponen IT dalam produk untuk menyulitkan substitusi produk pesaing',
            'D' => 'Manfaatkan investasi pada SDM, perangkat keras, perangkat lunak, database, dan jaringan dari aplikasi strategis ke dalam penggunaan operasional',
            'E' => 'Menciptakan biaya peralihan melalui pengembangan sistem informasi secara inovatif dan berkelanjutan',
            'right_answer' => 'D',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '33',
            'question' =>
            'Pertukaran secara otomatis dokumen bisnis elektronik di antara jejaring komputer para rekanan bisnis dinamakan …',
            'A' => 'Pertukaran data digital',
            'B' => 'Pertukaran dokumen analog',
            'C' => 'Pertukaran data elektronik',
            'D' => 'Pertukaran dokumen otomatis',
            'E' => 'Pertukaran data listrik',
            'right_answer' => 'C',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '34',
            'question' =>
            'Entri data, pemrosesan transaksi, pengelolaan basis data, pembuatan dokumen <br>
            dan laporan, serta pemrosesan permintaan merupakan …',
            'A' => 'Siklus pemrosesan transaksi',
            'B' => 'Siklus pemrosesan data',
            'C' => 'Siklus pemrosesan dokumen',
            'D' => 'Siklus pemrosesan laporan',
            'E' => 'Siklus pemrosesan permintaan',
            'right_answer' => 'A',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '35',
            'question' =>
            'Berikut ini yang tidak termasuk dalam strategi kompetitif dasar dalam bisnis adalah …',
            'A' => 'Cost leadership strategy',
            'B' => 'Innovation strategy',
            'C' => 'Infiltration strategy',
            'D' => 'Growth strategy',
            'E' => 'Alliance strategy',
            'right_answer' => 'C',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '36',
            'question' =>
            'Komponen Sistem Informasi terdiri dari …',
            'A' => 'People, data, network, software, dan hardware',
            'B' => 'Decision analysis, network, software, hardware, dan fact',
            'C' => 'People, procedure, decision analysis, software, dan hardware',
            'D' => 'Procedure, network, software, hardware, dan fact',
            'E' => 'Decision analysis, network, software, hardware, dan procedure',
            'right_answer' => 'A',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '37',
            'question' =>
            'Urutan jenjang data dari tingkat paling tinggi hingga paling kecil adalah …',
            'A' => 'Characters, record, file, data field, database',
            'B' => 'Characters, data field, record, file, database',
            'C' => 'Database, file, record, data field, characters',
            'D' => 'Database, data field, file, record, characters',
            'E' => 'Database, data field, record, file, characters',
            'right_answer' => 'C',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '38',
            'question' =>
            'Perhatikan daftar di bawah ini
            <ol type="I">
            <li>Peralatan</li>
            <li>Pentargetan</li>
            <li>Lokasi</li>
            <li>Strategi Promosi</li>
            <li>Perekrutan</li>
            <li>Proses Bisnis</li>
            <li>Bukti Fisik</li>
            </ol>
            Poin yang termasuk ke dalam strategi pemasaran 7P adalah …
            ',
            'A' => 'i, ii, v, vi',
            'B' => 'ii, v, vi, vii',
            'C' => 'iii, iv, vi, vii',
            'D' => 'ii, iv, vi, vii',
            'E' => 'i, iv, vi, vii',
            'right_answer' => 'C',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '39',
            'question' =>
            'Perhatikan daftar di bawah ini<br>
            <ol type="I">
            <li>Meningkatkan efisiensi pada aktivitas rutin</li>
            <li>Perencanaan dan manajemen yang terkontrol</li>
            <li>Mendapatkan target yang tepat</li>
            <li>Mengoptimasikan SEO</li>
            <li>Memperoleh backlink yang berkualitas dan kredibel</li>
            <li>Ekosistem perusahaan yang terintegrasi</li>
            </ol>
            Poin yang merupakan manfaat dari direktori bisnis daring adalah …',
            'A' => 'i, iii,vi',
            'B' => 'i, ii, iv',
            'C' => 'ii, v, vi',
            'D' => 'iii, iv, v',
            'E' => 'iii, iv, vi',
            'right_answer' => 'D',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '40',
            'question' =>
            'Perhatikan datar di bawah ini
            <ol type="a">
            <li>Mengintegrasikan sebagian besar dari proses bisnis yang ada</li>
            <li>Membantu proses pengambilan keputusan dan juga fokus pada manajemen berdasarkan persepsi yang ada</li>
            <li>Memproses seluruh transaksi organisasi perusahaan</li>
            <li>Mendukung berbagai proses pengambilan keputusan pada pembahasan masalah yang lebih terstruktur, tidak terstruktur, ataupun yang semi terstruktur</li>
            <li>Memungkinkan perpaduan proses transaksi dan kegiatan perencanaan</li>
            <li>Memiliki berbagai subsistem yang yang terintegrasi dengan sedemikian rupa dan bisa berfungsi dalam suatu kesatuan sistem yang andal</li>
            <li>Ekosistem perusahaan yang terintegrasi</li>
            </ol>
            Poin yang merupakan karakteristik dari Decision Support System adalah …',
            'A' => 'a, f, g',
            'B' => 'c, f, g',
            'C' => 'b, d, e',
            'D' => 'a, c, e',
            'E' => 'b, d, f',
            'right_answer' => 'E',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '41',
            'question' =>
            'Yang tidak termasuk dalam perhitungan Pendapatan Domestik Bruto adalah …',
            'A' => 'Investasi',
            'B' => 'Pendapatan bersih dari Ekspor',
            'C' => 'Pengeluaran Pemerintah',
            'D' => 'Dana yang dipinjamkan untuk negara lain',
            'E' => 'Konsumsi Individu ',
            'right_answer' => 'D',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '42',
            'question' =>
            'Keadaan dimana Pengeluaran sama dengan Pendapatan adalah …',
            'A' => 'PDB',
            'B' => 'GDP',
            'C' => 'BEP',
            'D' => 'SCM',
            'E' => 'BAP',
            'right_answer' => 'C',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '43',
            'question' =>
            'Apabila biaya produksi suatu barang meningkat dan harga barang substitusinya juga meningkat, maka …',
            'A' => 'kurva penawaran dan kurva permintaan bergeser ke kiri',
            'B' => 'kurva penawaran dan kurva permintaan bergeser ke kanan ',
            'C' => 'kurva penawaran bergeser ke kiri dan kurva permintaan bergeser ke kanan ',
            'D' => 'kurva penawaran bergeser ke kanan dan kurva permintaan bisa bergeser ke  kiri',
            'E' => 'terjadi pergerakan di sepanjang kurva penawaran dan kurva permintaan',
            'right_answer' => 'C',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '44',
            'question' =>
            'Rakyan selalu membeli tinta printer di Toko Tekno Jawa Dwipa. Pada suatu hari dia mendapati bahwa banyak sekali pembeli yang menginginkan printer.
            Diketahui bahwa printer dan tinta printer merupakan suatu barang yang bersifat (...X...) ,maka apabila harga printer tiba-tiba melambung tinggi akibat permintaan yang cukup banyak hasilnya adalah (...Y...)<br>
            Untuk melengkapi bagian X dan Y di atas. Jawaban yang benar adalah …',
            'A' => 'X = (Komplementer), Y = (Harga tinta mengalami kenaikan)',
            'B' => 'X = (Substitusi), Y = (Harga tinta mengalami kenaikan)',
            'C' => 'X = (Menggantikan), Y = (Jumlah stock tinta menjadi langka)',
            'D' => 'X = (Komplementer), Y = (Harga tinta mengalami penurunan)',
            'E' => 'X = (Substitusi), Y = (Harga tinta mengalami penurunan)',
            'right_answer' => 'A',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '45',
            'question' =>
            'Perhatikan tabel!<br>
            Airwangga adalah seorang yang hanya menggunakan internet untuk begadang.<br>
            Manakah provider yang paling efektif dipakai oleh Airwangga? (Efisiensi kuota dan harga dipertimbangkan)<br>
            <strong>notes : Efektif bukan sekadar yang paling murah!</strong>',
            'A' => 'XXL',
            'B' => 'Simpantuh',
            'C' => 'Indobang',
            'D' => 'Mentereng',
            'E' => 'Ehsiap',
            'right_answer' => 'C',
        ]);

        //soal Coding

        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '46',
            'question' =>
            'Outputnya adalah …',
            'img'=>'penyisihan/46.png',
            'A' => '4',
            'B' => '3',
            'C' => '4.5',
            'D' => '2',
            'E' => '2.75',
            'right_answer' => 'B',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '47',
            'question' =>
            'Jika n=5, outputnya adalah …',
            'img'=>'penyisihan/47.png',
            'imgAnswer' => 1,
            'A' => 'penyisihan/47a.png',
            'B' => 'penyisihan/47b.png',
            'C' => 'penyisihan/47c.png',
            'D' => 'penyisihan/47d.png',
            'E' => 'penyisihan/47e.png',
            'right_answer' => 'E',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '48',
            'question' =>
            'Jika outputnya adalah 60, maka x = …',
            'img'=>'penyisihan/48.png',
            'A' => '4',
            'B' => '3.5',
            'C' => '8',
            'D' => '5',
            'E' => '7.5',
            'right_answer' => 'A',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '49',
            'question' =>
            'Berapakah nilai x pada akhir dari potongan program yang ada pada gambar?',
            'img'=>'penyisihan/49.png',
            'A' => '56',
            'B' => '84',
            'C' => '120',
            'D' => '165',
            'E' => '220',
            'right_answer' => 'C',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '50',
            'question' =>
            'Berapa nilai d jika a = 6, b = 4, c = 9?',
            'img'=>'penyisihan/50.png',
            'A' => '21',
            'B' => '27',
            'C' => '30',
            'D' => '33',
            'E' => '36',
            'right_answer' => 'E',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '51',
            'question' =>
            'Berapakah output fungsi tersebut?',
            'img'=>'penyisihan/51.png',
            'A' => '1',
            'B' => '6',
            'C' => '11',
            'D' => '16 ',
            'E' => '21',
            'right_answer' => 'A',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '52',
            'question' =>
            'Apakah yang akan terjadi ketika program tersebut dijalankan?',
            'img'=>'penyisihan/52.png',
            'A' => 'Terjadi error',
            'B' => 'Tidak menghasilkan output',
            'C' => 'Menghasilkan output 30',
            'D' => 'Menghasilkan output 40',
            'E' => 'Menghasilkan output 50',
            'right_answer' => 'B',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '53',
            'question' =>
            'Output dari program tersebut adalah …',
            'img'=>'penyisihan/53.png',
            'A' => '1000',
            'B' => '1100',
            'C' => '1120',
            'D' => '1200',
            'E' => '1220',
            'right_answer' => 'E',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '54',
            'question' =>
            'Agar exception yang kemungkinan muncul pada block try dapat disimpan dalam suatu variabel,
            maka bagian rumpang (ditandai dengan ‘...’) harus diisi dengan sintaks …',
            'img'=>'penyisihan/54.png',
            'A' => 'catch',
            'B' => 'insert',
            'C' => 'throw',
            'D' => 'finally',
            'E' => 'throws',
            'right_answer' => 'A',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '55',
            'question' =>
            'Pesan error yang muncul akan menunjukan error …',
            'img'=>'penyisihan/55.png',
            'A' => 'NumberFormatException',
            'B' => 'ArrayIndexOutOfBoundsException',
            'C' => 'NoSuchIndexException',
            'D' => 'InvocationTargetException',
            'E' => 'UnsupportedLookAndFeelException',
            'right_answer' => 'B',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '56',
            'question' =>
            'Output dari program adalah …',
            'img'=>'penyisihan/56.png',
            'A' => 'Angkanya adalah 10',
            'B' => 'Angkanya adalah 0.',
            'C' => 'Error',
            'D' => 'Angkanya adalah angka',
            'E' => 'Program tidak memberikan keluaran',
            'right_answer' => 'C',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '57',
            'question' =>
            'Output dari program adalah …',
            'img'=>'penyisihan/57.png',
            'A' => 'Tulisan “ISAC” Sebanyak 2020x dan tulisan Selesai',
            'B' => 'Tulisan “ISAC” Sebanyak 2021x dan tulisan Selesai',
            'C' => 'Program error',
            'D' => 'Tulisan “ISAC” Sebanyak 1x dan Tulisan Selesai sebanyak 2021x',
            'E' => 'Program berjalan tetapi tidak memberikan keluaran',
            'right_answer' => 'C',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '58',
            'question' =>
            'Output dari program adalah …',
            'img'=>'penyisihan/58.png',
            'A' => 'Program tercompile dan berjalan',
            'B' => 'Compiler Error',
            'C' => 'Program tercompile tetapi mengeluarkan exception',
            'D' => '∞',
            'E' => '2021/0',
            'right_answer' => 'C',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '59',
            'question' =>
            'Output dari logic(10) adalah …',
            'img'=>'penyisihan/59.png',
            'A' => 'x x x x x x x x x x',
            'B' => 'o o o x x x x x x',
            'C' => 'o o o x o o o o x',
            'D' => 'x x x x x o x x x x o',
            'E' => 'x x x x x o o o o o',
            'right_answer' => 'A',
        ]);
        DB::table('questions')->insert([
            'packet_id' => $packet_id,
            'number' => '60',
            'question' =>
            'Agar memunculkan output :<br>
            <ul><li>
            “Faktor 1945 adalah: [1, 5, 389, 1945]”
            </li></ul>
            Bagian x yang hilang dapat diisikan dengan code …
            ',
            'img'=>'penyisihan/60.png',
            'A' => 'print("Faktor",bil,"adalah:",faktor)',
            'B' => 'print("Faktor",faktor,"adalah:",faktor)',
            'C' => 'print("Faktor",bil,"adalah:",pembagi)',
            'D' => 'print("Faktor",bil,"adalah:",faktor)',
            'E' => 'print("Faktor",faktor,"adalah:",bil)',
            'right_answer' => 'A',
        ]);

        //contoh template

        // DB::table('questions')->insert([
        //     'packet_id' => $packet_id,
        //     'number' => '3',
        //     'question' => 'Ini contoh soal yang pilgannya gambar. Nyaman nggak diliatnya??',
        //     'imgAnswer' => 1,
        //     'A' => '2A.jpg',
        //     'B' => '2B.jpg',
        //     'C' => '2C.jpg',
        //     'D' => '2D.jpg',
        //     'E' => '2A.jpg',
        //     'right_answer' => 'C',
        // ]);

        // DB::table('questions')->insert([
        //     'packet_id' => $packet_id,
        //     'number' => '4',
        //     'question' => 'Soal pake gambar trus jawabannya pake gambar uga',
        //     'imgAnswer' => 1,
        //     'img' => '4.png',
        //     'A' => '4a.png',
        //     'B' => '4b.png',
        //     'C' => '4c.png',
        //     'D' => '4d.png',
        //     'E' => '4b.png',
        //     'right_answer' => 'A',
        // ]);

        // DB::table('questions')->insert([
        //     'packet_id' => $packet_id,
        //     'number' => '5',
        //     'question' =>
        //     'Soal pake syntax html jadi bisa enter atau kuadrat.<br>
        //     Contohnya H<sub>2</sub>O + 1200<sup>21</sup>. <br>
        //     <strong>Tebel</strong> ama <small>Kecil</small> atau <strike>Coret</strike> <em>Italic</em>!',
        //     'A' => 'Cakeb',
        //     'B' => 'Mantab',
        //     'C' => 'James',
        //     'D' => 'Pocari',
        //     'E' => 'Asep',
        //     'right_answer' => 'B',
        // ]);

        // DB::table('questions')->insert([
        //     'packet_id' => $packet_id,
        //     'number' => '6',
        //     'question' => 'Berapakah 3<sup>1945</sup> × 2<sup>1948</sup> / 6<sup>500</sup> mod  10 ?',
        //     'A' => '8',
        //     'B' => '6',
        //     'C' => '4',
        //     'D' => '2',
        //     'E' => '0',
        //     'right_answer' => 'A',
        // ]);

        // DB::table('questions')->insert([
        //     'packet_id' => $packet_id,
        //     'number' => '7',
        //     'question' =>
        //     'Soal lagi, jawabannya pake emoji wkwkwk.<br>
        //     Pake emot ni ngab H<sub>2</sub>O + 1200<sup>21</sup>. <br>
        //     <strong>Tebel</strong> ama <small>Kecil</small> atau <strike>Coret</strike> <em>Italic</em>!',
        //     'img' => '4.png',
        //     'A' => '✰⋆🌟✪🔯✨',
        //     'B' => '💨🌬️',
        //     'C' => '🌎🌎',
        //     'D' => '⏳',
        //     'E' => '⏳⏳⏳',
        //     'right_answer' => 'C',
        // ]);

        // DB::table('questions')->insert([
        //     'packet_id' => $packet_id,
        //     'number' => '8',
        //     'question' =>
        //     'Kalo ada kritik saran apapun nanti bisa ditulis abis akhiri soal yaa!',
        //     'A' => 'Mlz',
        //     'B' => 'Gamao',
        //     'C' => 'Yes',
        //     'D' => 'Ngga',
        //     'E' => 'Ngga',
        //     'right_answer' => 'C',
        // ]);

        // DB::table('questions')->insert([
        //     'packet_id' => $packet_id,
        //     'number' => '9',
        //     'question' =>
        //     'Jangan lupa nanti habis akhiri soal buat ngisi kritik saran ngab!',
        //     'A' => 'Ngga',
        //     'B' => 'Oke',
        //     'C' => 'Ngga',
        //     'D' => 'Ngga',
        //     'E' => 'Ngga',
        //     'right_answer' => 'B',
        // ]);


    }
}
