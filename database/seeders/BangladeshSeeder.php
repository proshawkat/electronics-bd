<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BangladeshSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $regions = [
            111 => 'Barisal',
            112 => 'Chittagong',
            113 => 'Dhaka',
            114 => 'Khulna',
            115 => 'Mymensingh',
            116 => 'Rajshahi',
            117 => 'Rangpur',
            118 => 'Sylhet',
        ];

        $cities = [
            111 => ['Barguna', 'Barisal', 'Bhola', 'Jhalokati', 'Patuakhali', 'Pirojpur'],
            112 => ['Bandarban', 'Brahmanbaria', 'Chandpur', 'Chattogram', 'Cox\'s Bazar', 'Cumilla', 'Feni', 'Khagrachari', 'Lakshmipur', 'Noakhali', 'Rangamati'],
            113 => ['Dhaka', 'Faridpur', 'Gazipur', 'Gopalganj', 'Kishoreganj', 'Madaripur', 'Manikganj', 'Munshiganj', 'Narayanganj', 'Narsingdi', 'Rajbari', 'Shariatpur', 'Tangail'],
            114 => ['Bagerhat', 'Chuadanga', 'Jashore', 'Jhenaidah', 'Khulna', 'Kushtia', 'Magura', 'Meherpur', 'Narail', 'Satkhira'],
            115 => ['Jamalpur', 'Mymensingh', 'Netrokona', 'Sherpur'],
            116 => ['Bogura', 'Jaipurhat', 'Naogaon', 'Natore', 'Pabna', 'Rajshahi', 'Sirajganj'],
            117 => ['Dinajpur', 'Gaibandha', 'Kurigram', 'Lalmonirhat', 'Nilphamari', 'Panchagarh', 'Rangpur', 'Thakurgaon'],
            118 => ['Habiganj', 'Moulvibazar', 'Sunamganj', 'Sylhet'],
        ];

        foreach ($regions as $id => $name) {
            DB::table('regions')->insert([
                'id' => $id,
                'name' => $name,
            ]);

            foreach ($cities[$id] as $city) {
                DB::table('cities')->insert([
                    'region_id' => $id,
                    'name' => $city,
                ]);
            }
        }
    }
}
