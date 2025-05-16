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
    $directory = storage_path('app/universities');
    $files = glob($directory . '/*.json'); // get all .json files

    foreach ($files as $filePath) {
        $json = file_get_contents($filePath);
        $data = json_decode($json, true);

        if (!$data || !isset($data['university'])) {
            $this->error("❌ Invalid JSON in file: " . basename($filePath));
            continue;
        }

        $uniData = $data['university'];

        // ✅ Log what you're importing
        $this->info('🔍 Importing university: ' . $uniData['id']);

        // ✅ Actually create/update university (this was missing before!)
        $university = University::updateOrCreate(
            ['code' => $uniData['id']],
            ['name' => $uniData['name'], 'website' => $uniData['website']]
        );

        // ✅ Faculties loop
        foreach ($uniData['faculties'] as $facultyData) {
            $faculty = Faculty::updateOrCreate(
                ['university_id' => $university->id, 'name' => $facultyData['name']],
                []
            );

            // ✅ Majors loop
            foreach ($facultyData['majors'] as $majorName) {
                Major::updateOrCreate(
                    ['faculty_id' => $faculty->id, 'name' => $majorName],
                    []
                );
            }
        }

        $this->info('✅ Done with: ' . $uniData['name']);
    }

    $this->info('🎉 All universities imported successfully!');
    return 0;
}

}
