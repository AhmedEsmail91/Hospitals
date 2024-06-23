<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArTranslations extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dayMapping = [
            'Monday' => 'الاثنين',
            'Tuesday' => 'الثلاثاء',
            'Wednesday' => 'الأربعاء',
            'Thursday' => 'الخميس',
            'Friday' => 'الجمعة',
            'Saturday' => 'السبت',
            'Sunday' => 'الأحد'
        ];
        $data = DB::table('doctor_translations')
            ->select('locale', 'name', 'appointments', 'doctor_id')
            ->get();

        // Prepare data for insertion with modified locale and translated appointments
        $insertData = [];
        foreach ($data as $row) {
            $translatedAppointments = array_map(function ($day) use ($dayMapping) {
                return $dayMapping[$day] ?? $day;
            }, explode(',', $row->appointments));

            $insertData[] = [
                'locale' => 'ar',
                'name' => $row->name,
                'appointments' => implode(',', $translatedAppointments),
                'doctor_id' => $row->doctor_id,
            ];
        }

        // Insert modified data back into the doctor_translations table
        DB::table('doctor_translations')->insert($insertData);
    }
}
