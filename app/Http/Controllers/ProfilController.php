<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function show($slug)
    {
        // Data konten untuk setiap menu
        $data = [
            'struktur-organisasi' => [
                'title' => 'Struktur Organisasi',
                'type' => 'image',
                'content' => 'img/struktur-organisasi.png'
            ],
            'visi-dan-misi' => [
                'title' => 'Visi dan Misi',
                'type' => 'visi_misi',
                'visi' => 'Terwujudnya Infrastruktur Cipta Karya dan Sumber Daya Air Yang Optimal...',
                'misi' => [
                    'Merumuskan kebijakan bidang Cipta Karya & SDA.',
                    'Melakukan konservasi dan pendayagunaan SDA.',
                    'Memberikan pelayanan optimal dan efisien.',
                    'Peningkatan ketersediaan bangunan gedung.'
                ]
            ],
            'tugas-dan-fungsi' => [
                'title' => 'Tugas dan Fungsi',
                'type' => 'text',
                'content' => 'Tugas pokok Dinas CIKASDA adalah membantu Gubernur dalam urusan Pekerjaan Umum...'
            ],
            // Tambahkan slug lainnya di sini (sejarah, pejabat, lhkpn, dsb)
        ];

        $page = $data[$slug] ?? abort(404);

        return view('pages.profil-detail', compact('page'));
    }
}