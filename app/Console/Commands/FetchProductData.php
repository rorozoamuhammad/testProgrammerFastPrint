<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


class FetchProductData extends Command
{
    protected $signature = 'app:get-produk-data';

    protected $description = 'Mengambil data dari API FastPrint';

    public function handle()
    {
        $username = 'tesprogrammer'. date('dmy') .'C'. date('H');
        $cekPass = 'bisacoding-'. date('d-m-y');
        $password = md5($cekPass);
        $this->info("Menghubungi API via CURL...");

        // Data yang akan dikirim
        $postData = [
            'username' => $username,
            'password' => $password,
        ];

        // Inisialisasi CURL
        $ch = curl_init('https://recruitment.fastprint.co.id/tes/api_tes_programmer');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $this->info("HTTP Code: " . $httpCode);
        $this->info("Raw Response: " . $response);

        if ($httpCode == 200) {
            // Mengubah string JSON menjadi array PHP
            $result = json_decode($response, true);
            if (isset($result['error']) && $result['error'] != "0") {
                $this->error("API Error: " . ($result['ket'] ?? 'Terjadi kesalahan pada parameter.'));
                return;
            }
            if (isset($result['data'])) {
                foreach ($result['data'] as $item) {
                    // Simpan Kategori
                    $kategori = \App\Models\Kategori::firstOrCreate([
                        'nama_kategori' => $item['kategori']
                    ]);

                    // Simpan Status
                    $status = \App\Models\Status::firstOrCreate([
                        'nama_status' => $item['status']
                    ]);

                    // Simpan Produk
                    \App\Models\Produk::updateOrCreate(
                        ['id_produk' => $item['id_produk']],
                        [
                            'nama_produk' => $item['nama_produk'],
                            'harga' => $item['harga'],
                            'kategori_id' => $kategori->id_kategori,
                            'status_id' => $status->id_status,
                        ]
                    );
                }
                $this->info("Berhasil! Data telah masuk ke SQLite.");
            }
        } else {
            $this->error("Gagal! Kode HTTP: " . $httpCode);
        }
    }
}
