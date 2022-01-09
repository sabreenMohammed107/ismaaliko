<?php

namespace Database\Seeders;

use App\Models\Company_contact;
use Illuminate\Database\Seeder;

class CompanyContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Company_contact::create([
            'address'=>'قطعة 508، مخازن الشباب، منطقة
            300 السادس من اكتوبر، الجيزة',
        'phone'=>'  <span>201001140214</span>  <span>201033597474</span>
        ',
        'email'=>'admin@gmail.com',
        'google_map'=>'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3452.8272233472703!2d31.344593185140344!3d30.070486624297363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583e0dd2418453%3A0x48a86997f284f8d6!2sSenior%20Steps!5e0!3m2!1sar!2seg!4v1640907406037!5m2!1sar!2seg',
        'facebook'=>Null,
        'twitter'=>Null,
        'instagram'=>Null,
        'youtube'=>Null,
        'linkedin'=>Null,
        ]);

    }
}
