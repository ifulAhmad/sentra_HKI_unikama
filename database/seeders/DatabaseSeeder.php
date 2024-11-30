<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Applicant;
use App\Models\CopyrightType;
use App\Models\CopyrightSubType;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'test applincant 1',
            'email' => 'test1@example.com',
            'username' => 'testing1',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
        User::create([
            'nama' => 'test applincant 2',
            'email' => 'test2@example.com',
            'username' => 'testing2',
            'password' => bcrypt('password'),
            'role' => 'pemohon',
        ]);

        // Data untuk CopyrightType
        $copyrightTypes = [
            [
                "type" => "Karya Tulis",
                "subtypes" => ["Atlas", "Biografi", "Booklet", "Buku", "Buku Mewarnai", "Buku Panduan/Petunjuk", "Buku Pelajaran", "Buku Saku", "Bunga Rampai", "Cerita Bergambar", "Diktat", "Dongeng", "E-Book", "Ensiklopedia", "Jurnal", "Kamus", "Karya Ilmiah", "Karya Tulis", "Karya Tulis (Artikel)", "Karya Tulis (Skripsi)", "Karya Tulis (Tesis)", "Karya Tulis (Disertasi)", "Karya Tulis Lainnya", "Komik", "Novel", "Perwajaan Karya Tulis", "Proposal Penelitian", "Puisi", "Resensi", "Resume/Ringkasan", "Saduran", "Sinopsis", "Tafsir", "Terjemahan"]
            ],
            [
                "type" => "Karya Seni",
                "subtypes" => ["Alat Peraga", "Arsitektur", "Baliho", "Banner", "Brosur", "Diorama", "Flyer", "Kaligrafi", "Karya Seni Batik", "Karya Seni Rupa", "Kolase", "Leaflet", "Motif Sasirangan", "Motif Tapis", "Motif Tenun Ikat", "Motif Ulos", "Pamflet", "Peta", "Poster", "Seni Gambar", "Seni Ilustrasi", "Seni Lukis", "Seni Motif", "Seni Motif Lainnya", "Seni Pahat", "Seni Patung", "Seni Rupa", "Seni Songket", "Seni Terapan", "Seni Umum", "Sketsa", "Spanduk Ukiran"]
            ],
            [
                "type" => "Musik",
                "subtypes" => ["Aransemen", "Lagu (Musik Dengan Teks)", "Musik", "Musik Blues", "Musik Country", "Musik Dangdut", "Musik Elektronik", "Musik Funk", "Musik Gospel", "Musik Hip Hop, Rap, Rapcore", "Musik Jazz", "Musik Karawitan", "Musik Latin", "Musik Metal", "Musik Rhythm and Blues", "Musik Rock", "Musik Ska, Reggae, Dub", "Musik Tanpa Teks"]
            ],
            [
                "type" => "Karya Audio Visual",
                "subtypes" => ["Film", "Film Cerita", "Film Dokumenter", "Film Iklan", "Film Kartun", "Karya Rekaman Video", "Karya Siaran", "Karya Siaran Media Radio", "Karya Siaran Media Televisi dan Film", "Karya Siaran Video", "Karya Sinematografi", "Kuliah", "Reportase"]
            ],
            [
                "type" => "Karya Fotografi",
                "subtypes" => ["Karya Fotografi", "Potret"]
            ],
            [
                "type" => "Karya Drama dan Koreografi",
                "subtypes" => ["Drama/Pertunjukan", "Drama Musikan", "Ketoprak", "Komedi/Lawak", "Koreografi", "Lenong", "Ludruk", "Opera", "Pantomim", "Pentas Musik", "Pewayangan", "Seni Akrobat", "Seni Pertunjukan", "Sirkus", "Sulap", "Tari (Sendra Tari)"]
            ],
            [
                "type" => "Karya Rekaman",
                "subtypes" => ["Ceramah", "Karya Rekaman Suara atau Bunyi", "Khutbah", "Pidato"]
            ],
            [
                "type" => "Karya Komputer",
                "subtypes" => ["Basis Data", "Kompilasi Ciptaan/Data", "Permainan Video (Video Game)", "Program Komputer"]
            ],
        ];

        foreach ($copyrightTypes as $data) {
            $copyrightType = CopyrightType::create([
                'type' => $data['type'],
                'slug' => Str::slug($data['type']),
            ]);

            foreach ($data['subtypes'] as $subtype) {
                CopyrightSubType::create([
                    'type' => $subtype,
                    'copyright_type_id' => $copyrightType->id,
                ]);
            }
        }
    }
}
