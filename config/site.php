<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Informasi Instansi
    |--------------------------------------------------------------------------
    | Data kontak resmi Dinas CIKASDA Sulawesi Tengah.
    | Edit bagian ini untuk memperbarui informasi kontak di seluruh situs.
    */
    'agency' => [
        'name_short'  => 'Dinas CIKASDA',
        'name_full'   => 'Dinas Cipta Karya & Sumber Daya Air Provinsi Sulawesi Tengah',
        'province'    => 'Prov. Sulawesi Tengah',
        'address'     => 'Jl. Prof. Dr. Moh. Yamin No.33 Palu',
        'email'       => 'cikasda@sultengprov.go.id',
        'phone'       => '(0451) 4015509',
        'logo'        => 'img/logo-sulteng.png',
        'tagline'     => 'Membangun Sulteng Lebih Tangguh',
        'copyright_year' => '2026',
    ],

    /*
    |--------------------------------------------------------------------------
    | Daftar Social Media (Ikuti Kami)
    |--------------------------------------------------------------------------
    | Untuk menambah/mengubah social link, cukup tambahkan/edit array di bawah.
    | - label        : teks yang ditampilkan
    | - url          : URL tujuan
    | - icon         : path aset gambar relatif ke public/ (gunakan asset() di Blade)
    | - hover_class  : Tailwind class warna hover pada teks link
    */
    'socials' => [
        [
            'label'       => 'Instagram',
            'url'         => 'https://instagram.com/cikasda.sulteng',
            'icon'        => 'img/sosmed/logo-instagram.png',
            'hover_class' => 'hover:text-amber-400',
        ],
        [
            'label'       => 'Facebook',
            'url'         => 'https://facebook.com/cikasdaSulteng',
            'icon'        => 'img/sosmed/logo-facebook.png',
            'hover_class' => 'hover:text-blue-400',
        ],
        [
            'label'       => 'YouTube',
            'url'         => 'https://youtube.com/@cikasdasulteng',
            'icon'        => 'img/sosmed/logo-youtube.png',
            'hover_class' => 'hover:text-red-500',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Daftar Pejabat
    |--------------------------------------------------------------------------
    | Untuk memperbarui nama/jabatan/foto pejabat, edit array di bawah.
    | - title : jabatan (ditampilkan kecil di atas nama)
    | - name  : nama lengkap beserta gelar
    | - image : path aset gambar relatif ke public/
    | - alt   : teks alt gambar untuk aksesibilitas
    */
    'officials' => [
        [
            'title' => 'Kepala Dinas',
            'name'  => 'Dr. Andi Ruly, SE., M.Si',
            'image' => 'img/kadis.png',
            'alt'   => 'Foto Kepala Dinas CIKASDA',
        ],
        [
            'title' => 'Sekretaris Dinas',
            'name'  => 'St. Buhafiah B. ST., M.Si',
            'image' => 'img/sekretaris.png',
            'alt'   => 'Foto Sekretaris Dinas CIKASDA',
        ],
    ],

];
