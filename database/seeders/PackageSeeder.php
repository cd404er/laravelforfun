<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [
                'name' => 'Value 50 Mbps',
                'slug' => 'value-50-mbps',
                'speed_mbps' => 50,
                'price' => 309000,
                'description' => 'Cocok untuk kebutuhan browsing harian, bersosial media, dan streaming video berkualitas HD keluarga kecil Anda.',
                'is_active' => true,
                'features' => ['Koneksi Fiber Optic 100%', 'Unlimited Quota / Tanpa FUP', 'Gratis sewa modem router standar', 'Layanan Pelanggan 24/7'],
            ],
            [
                'name' => 'Fast 100 Mbps',
                'slug' => 'fast-100-mbps',
                'speed_mbps' => 100,
                'price' => 389000,
                'description' => 'Sangat ideal untuk streaming 4K Ultra HD tanpa buffer, download file berukuran besar, dan mendukung produktivitas WFH dengan lancar.',
                'is_active' => true,
                'features' => ['Koneksi Fiber Optic 100%', 'Unlimited Quota / Tanpa FUP', 'Kecepatan Simetris 1:1 (Download/Upload)', 'Dual-Band Router Premium'],
            ],
            [
                'name' => 'Nova 150 Mbps',
                'slug' => 'nova-150-mbps',
                'speed_mbps' => 150,
                'price' => 469000,
                'description' => 'Paket premium dengan kecepatan tinggi untuk rumah dengan banyak perangkat terhubung secara bersamaan tanpa penurunan performa.',
                'is_active' => true,
                'features' => ['Koneksi Fiber Optic 100%', 'Unlimited Quota / Tanpa FUP', 'Prioritas Bandwidth & Routing Optimal', 'Wi-Fi 6 Router Smart Device'],
            ],
            [
                'name' => 'Gamer 250 Mbps',
                'slug' => 'gamer-250-mbps',
                'speed_mbps' => 250,
                'price' => 599000,
                'description' => 'Didesain khusus untuk para gamer dengan optimasi routing latensi rendah (ping kecil) ke game server populer dunia.',
                'is_active' => true,
                'features' => ['Koneksi Fiber Optic 100%', 'Low Latency & Custom Routing Game Server', 'Symmetrical Bandwidth 1:1', 'Premium Gaming Router'],
            ],
        ];

        foreach ($packages as $pkg) {
            Package::create($pkg);
        }
    }
}
