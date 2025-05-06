<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// Halaman statis
Route::get('/biodata', function () {
    return view('biodata');
});

Route::get('/namasaya', function () {
    echo "Sucianti";
});

// Route parameter dinamis
Route::get('/matakuliah/{mk}', function ($mk) {
    echo "Matakuliah: " . $mk;
});

Route::get('/mahasiswa/{mhs}', function ($mhs) {
    echo "Tampilkan data mahasiswa bernama: " . $mhs;
});

// Optional parameter
Route::get('/stok_barang/{brng?}/{stok?}', function ($brng = 'kipas', $stok = 'samsung') {
    echo "Cek sisa stok: " . $brng . " = " . $stok;
});

// Constraint route
Route::get('/user1/{id}', function ($id) {
    echo "Tampilkan user dengan ID: " . $id;
})->whereNumber('id');

Route::get('/user/{id}', function ($id) {
    echo "Tampilkan user dengan ID: " . $id;
})->where('id', '[a-zA-Z]{2}[0-9]+');

// Resource controller untuk Post
Route::resource('index', PostController::class);
