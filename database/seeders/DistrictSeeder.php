<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $info = array(
            'Bagerhat',
            'Bandarban',
            'Barguna',
            'Barisal',
            'Bhola',
            'Bogra',
            'Brahamanbaria',
            'Chandpur',
            'Chapainababganj',
            'Chittagong',
            'Chuadanga',
            'Comilla',
            'Cox\'s Bazar',
            'Dhaka',
            'Dinajpur',
            'Faridpur',
            'Feni',
            'Gaibandha',
            'Gazipur',
            'Gopalganj',
            'Habiganj',
            'Jamalpur',
            'Jessore',
            'Jhalokathi',
            'Jhenaidah',
            'Joypurhat',
            'Khagrachhari',
            'Khulna',
            'Kishorganj',
            'Kurigram',
            'Kushtia',
            'Lalmonirhat',
            'Laxmipur',
            'Madaripur',
            'Magura',
            'Manikganj',
            'Meherpur',
            'Moulavibazar',
            'Munshiganj',
            'Mymensingh',
            'Naogaon',
            'Narayanganj',
            'Natore',
            'Netrakona',
            'Nilfamari',
            'Noakhali',
            'Norail',
            'Norsingdi',
            'Pabna',
            'Panchagarh',
            'Patuakhali',
            'Pirojpur',
            'Rajbari',
            'Rajshahi',
            'Rangamati',
            'Rangpur',
            'Satkhira',
            'Shariatpur',
            'Sherpur',
            'Sirajganj',
            'Sunamganj',
            'Sylhet',
            'Tangail',
            'Thakurgaon'
       );

       foreach($info as $row)
       {
           $district = new District();
           $district->name = $row;
           $district->save();
       }
    }
}
