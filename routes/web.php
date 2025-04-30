<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/biodata', function () {
    return view('biodata');
});
Route::get('/namasaya', function ( ) {
    echo "sucianti";
});
Route::get('/matakuliah/{mk}', function ( $mk ) {
    echo "matakuliah: " . $mk;
});

Route::get('/mahasiswa/{mhs}', function ( $mhs ) {
    echo "tampilkan data mahasiswa bernama: " . $mhs;
});

Route::get('/stok_barang/{brng?}/{stok?}', function ($brng = 'kipas', $stok = 'samsung') {
    echo "cek sisa stok: " . $brng . " = " . $stok;
});

Route::get('/user1/{id}', function ($id) {
    echo "tampilkan user dengan ID: " . $id;
})->whereNumber('id');

Route::get('/user/{id}', function ($id) {
    echo "Tampilkan user dengan ID: " . $id;
})->where('id', '[a-zA-Z]{2}[0-9]+');
