<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsfontSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings_pdffonts = [
            ['name' => 'dejavusansextralight', 'value' => 'dejavusansextralight'],
            ['name' => 'angsanaupcb', 'value' => 'angsanaupcb'],
            ['name' => 'pdfatimesb', 'value' => 'pdfatimesb'],
            ['name' => 'hysmyeongjostdmedium', 'value' => 'hysmyeongjostdmedium'],
            ['name' => 'aealarabiya', 'value' => 'aealarabiya'],
            ['name' => 'dejavuserifcondensedb', 'value' => 'dejavuserifcondensedb'],
            ['name' => 'roboto', 'value' => 'roboto'],
            ['name' => 'dejavuserif', 'value' => 'dejavuserif'],
            ['name' => 'cordiaupc', 'value' => 'cordiaupc'],
            ['name' => 'pdfazapfdingbats', 'value' => 'pdfazapfdingbats'],
            ['name' => 'freesansb', 'value' => 'freesansb'],
            ['name' => 'pdfatimes', 'value' => 'pdfatimes'],
            ['name' => 'courier', 'value' => 'courier'],
            ['name' => 'dejavusansb', 'value' => 'dejavusansb'],
            ['name' => 'robotob', 'value' => 'robotob'],
            ['name' => 'freemono', 'value' => 'freemono'],
            ['name' => 'dejavusanscondensed', 'value' => 'dejavusanscondensed'],
            ['name' => 'pdfacourierb', 'value' => 'pdfacourierb'],
            ['name' => 'symbol', 'value' => 'symbol'],
            ['name' => 'thsarabunb', 'value' => 'thsarabunb'],
            ['name' => 'cordiaupcb', 'value' => 'cordiaupcb'],
            ['name' => 'freemonob', 'value' => 'freemonob'],
            ['name' => 'cid0cs', 'value' => 'cid0cs'],
            ['name' => 'cid0jp', 'value' => 'cid0jp'],
            ['name' => 'timesb', 'value' => 'timesb'],
            ['name' => 'pdfacourier', 'value' => 'pdfacourier'],
            ['name' => 'dejavusans', 'value' => 'dejavusans'],
            ['name' => 'pdfasymbol', 'value' => 'pdfasymbol'],
            ['name' => 'thniramitasb', 'value' => 'thniramitasb'],
            ['name' => 'khmeroscontent', 'value' => 'khmeroscontent'],
            ['name' => 'kozminproregular', 'value' => 'kozminproregular'],
            ['name' => 'khmerosbokor', 'value' => 'khmerosbokor'],
            ['name' => 'freeserif', 'value' => 'freeserif'],
            ['name' => 'khmeros', 'value' => 'khmeros'],
            ['name' => 'stsongstdlight', 'value' => 'stsongstdlight'],
            ['name' => 'times', 'value' => 'times'],
            ['name' => 'notosansb', 'value' => 'notosansb'],
            ['name' => 'aefurat', 'value' => 'aefurat'],
            ['name' => 'helvetica', 'value' => 'helvetica'],
            ['name' => 'dejavuserifcondensed', 'value' => 'dejavuserifcondensed'],
            ['name' => 'dejavusansmonob', 'value' => 'dejavusansmonob'],
            ['name' => 'pdfahelveticab', 'value' => 'pdfahelveticab'],
            ['name' => 'thsarabun', 'value' => 'thsarabun'],
            ['name' => 'helveticab', 'value' => 'helveticab'],
            ['name' => 'msungstdlight', 'value' => 'msungstdlight'],
            ['name' => 'droidsansfallback', 'value' => 'droidsansfallback'],
            ['name' => 'kozgopromedium', 'value' => 'kozgopromedium'],
            ['name' => 'hindb', 'value' => 'hindb'],
            ['name' => 'freesans', 'value' => 'freesans'],
            ['name' => 'cid0kr', 'value' => 'cid0kr'],
            ['name' => 'courierb', 'value' => 'courierb'],
            ['name' => 'zapfdingbats', 'value' => 'zapfdingbats'],
            ['name' => 'dejavusansmono', 'value' => 'dejavusansmono'],
            ['name' => 'pyidaungsu', 'value' => 'pyidaungsu'],
            ['name' => 'dejavusanscondensedb', 'value' => 'dejavusanscondensedb'],
            ['name' => 'angsanaupc', 'value' => 'angsanaupc'],
            ['name' => 'thniramitas', 'value' => 'thniramitas'],
            ['name' => 'freeserifb', 'value' => 'freeserifb'],
            ['name' => 'hind', 'value' => 'hind'],
            ['name' => 'pdfahelvetica', 'value' => 'pdfahelvetica'],
            ['name' => 'cid0ct', 'value' => 'cid0ct'],
            ['name' => 'notosans', 'value' => 'notosans'],
            ['name' => 'dejavuserifb', 'value' => 'dejavuserifb']

        ];

        DB::table('settings_pdffonts')->insert($settings_pdffonts);
    }
}
