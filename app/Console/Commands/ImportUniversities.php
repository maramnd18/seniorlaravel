<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\University;
use App\Models\Faculty;

class ImportUniversities extends Command
{
    protected $signature = 'import:universities';
    protected $description = 'Import universities from JSON files into the database';

    public function handle()
{
    $files = Storage::files('universities');

    if (empty($files)) {
        $this->error('No JSON files found in storage/app/universities');
        return;
    }

    foreach ($files as $file) {
        $this->info("Processing file: $file");

        $json = Storage::get($file);
        $data = json_decode($json, true);

        if (!$data) {
            $this->error("Invalid JSON in file: $file");
            continue;
        }

        $university = University::create([
            'name' => $data['name'],
            'logo' => $data['logo'] ?? null,
            'website' => $data['website'] ?? null,
        ]);

        foreach ($data['faculties'] as $facultyData) {
            Faculty::create([
                'university_id' => $university->id,
                'name' => $facultyData['name'],
                'majors' => json_encode($facultyData['majors']),
            ]);
        }
    }

    $this->info("Universities imported successfully!");
}

}
