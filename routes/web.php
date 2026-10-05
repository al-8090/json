<?php

use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;


// 1. Simpan data katalog dalam array PHP (Tema: Alat Tulis & Buku)
$katalogProduk = [
    [
        "id" => 1,
        "nama" => "Buku Tulis Kiky",
        "harga" => 4500,
        "kategori" => "Alat Tulis",
        "tersedia" => true
    ],
    [
        "id" => 2,
        "nama" => "Buku Lima Sekawan",
        "harga" => 5000,
        "kategori" => "Novel",
        "tersedia" => true
    ],
    [
        "id" => 3,
        "nama" => "Pensil 2B Faber Castell",
        "harga" => 3000,
        "kategori" => "Alat Tulis",
        "tersedia" => true
    ],
    [
        "id" => 4,
        "nama" => "Penggaris Besi 30cm",
        "harga" => 7000,
        "kategori" => "Alat Tulis",
        "tersedia" => false // Minimal satu produk tidak tersedia
    ],
    [
        "id" => 5,
        "nama" => "Penghapus Joyko",
        "harga" => 2000,
        "kategori" => "Alat Tulis",
        "tersedia" => true
    ]
];

// 2. Endpoint GET /quotes (Mengambil seluruh quotes/produk)
Route::get('/quotes', function () use ($katalogProduk) {
    return response()->json($katalogProduk);
});


// 3. Endpoint GET /quotes/{id} (Mengambil satu quotes & tangani jika tidak ditemukan)
Route::get('/quotes/{id}', function ($id) use ($katalogProduk) {
    // Cari produk berdasarkan ID
    foreach ($katalogProduk as $produk) {
        if ($produk['id'] == $id) {
            return response()->json($produk);
        }
    }

    // Jika ID tidak ditemukan, kembalikan status HTTP 404 dan pesan JSON error
    return response()->json([
        "pesan" => "Quotes dengan ID $id tidak ditemukan"
    ], 404);
});


Route::resource('/', QuoteController::class);
