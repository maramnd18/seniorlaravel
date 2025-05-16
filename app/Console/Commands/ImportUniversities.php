<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\University;
use App\Models\Faculty;
use App\Models\Major;

class ImportUniversities extends Command
{
    protected $signature = 'import:universities';
    protected $description = 'Import universities, faculties, and majors from JSON';

    public function handle()
    {
        $json = file_get_contents(storage_path('app/universities/mu.json'));

        $data = json_decode($json, true);

        if (!$data || !isset($data['university'])) {
            $this->error('Invalid JSON data.');
            return 1;
        }

        $uniData = $data['university'];

        // Create or update university
        $university = University::updateOrCreate(
            ['code' => $uniData['id']],
            [
                'name' => $uniData['name'],
                'website' => $uniData['website']
            ]
        );

        // Loop faculties
        foreach ($uniData['faculties'] as $facultyData) {
            $faculty = Faculty::updateOrCreate(
                ['university_id' => $university->id, 'name' => $facultyData['name']],
                []
            );

            // Loop majors
            foreach ($facultyData['majors'] as $majorName) {
                Major::updateOrCreate(
                    ['faculty_id' => $faculty->id, 'name' => $majorName],
                    []
                );
            }
        }

        $this->info('✅ All universities imported successfully!');
        return 0;
    }
}
