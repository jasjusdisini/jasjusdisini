<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->group(['prefix' => 'api'], function () use ($router) {

    // Rute untuk membaca/mengambil data
    $router->get('mahasiswa/read', ['uses' => 'MahasiswaController@showAll']);
    $router->get('dosen/read', ['uses' => 'DosenController@showAll']);
    $router->get('makul/read', ['uses' => 'MakulController@showAll']);     // Untuk menampilkan semua data
    $router->get('mahasiswa/read/{id}', ['uses' => 'MahasiswaController@showOne']); // Untuk menampilkan satu data berdasarkan ID
    $router->get('dosen/read/{id}', ['uses' => 'DosenController@showOne']);
    $router->get('makul/read/{id}', ['uses' => 'MakulController@showOne']);

    // Rute untuk membuat data baru
    $router->post('mahasiswa/create', ['uses' => 'MahasiswaController@create']);
    $router->post('dosen/create', ['uses' => 'DosenController@create']);
    $router->post('makul/create', ['uses' => 'MakulController@create']);

    // Rute untuk memperbarui data
    $router->put('mahasiswa/update/{id}', ['uses' => 'MahasiswaController@update']); // Perhatikan {id} untuk spesifikasi data yang diupdate
    $router->put('dosen/update/{id}', ['uses' => 'DosenController@update']);
    $router->put('makul/update/{id}', ['uses' => 'MakulController@update']);

    // Rute untuk menghapus data
    $router->delete('mahasiswa/delete/{id}', ['uses' => 'MahasiswaController@delete']); // Perhatikan {id} untuk spesifikasi data yang dihapus
    $router->delete('dosen/delete/{id}', ['uses' => 'DosenController@delete']);
    $router->delete('makul/delete/{id}', ['uses' => 'MakulController@delete']);

    //jwt
    $router->post('login', ['uses' => 'AuthController@login']);
    $router->post('logout', ['uses' => 'AuthController@logout']);
    $router->post('refresh', ['uses' => 'AuthController@refresh']);
    $router->post('user-profile', ['uses' => 'AuthController@me']);
});
