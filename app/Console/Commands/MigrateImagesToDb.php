<?php

namespace App\Console\Commands;

use App\Models\Album;
use App\Models\BlogPost;
use App\Models\Capability;
use App\Models\Certificate;
use App\Models\EquipmentRental;
use App\Models\Fleet;
use App\Models\FleetCategory;
use App\Models\FuneralService;
use App\Models\GalleryImage;
use App\Models\HeroSlide;
use App\Models\Mortuary;
use App\Models\Page;
use App\Models\Service;
use App\Models\Setting;
use App\Models\SisterConcern;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Console\Command;

class MigrateImagesToDb extends Command
{
    protected $signature = 'images:migrate-to-db';
    protected $description = 'Migrate existing filesystem images into database blob columns';

    private array $models = [
        HeroSlide::class => ['image'],
        Setting::class => ['logo', 'favicon'],
        GalleryImage::class => ['image'],
        Album::class => ['cover_image'],
        Testimonial::class => ['image'],
        TeamMember::class => ['image'],
        Certificate::class => ['image'],
        BlogPost::class => ['featured_image', 'image'],
        Capability::class => ['image', 'icon'],
        SisterConcern::class => ['logo'],
        Page::class => ['hero_image'],
        Service::class => ['image', 'banner_image'],
        FuneralService::class => ['image', 'banner_image'],
        Fleet::class => ['image'],
        FleetCategory::class => ['image'],
        EquipmentRental::class => ['image'],
        Mortuary::class => ['image'],
    ];

    public function handle(): int
    {
        $total = 0;

        foreach ($this->models as $modelClass => $fields) {
            $records = $modelClass::all();
            foreach ($records as $record) {
                $dirty = false;
                foreach ($fields as $field) {
                    $blobCol = $field . '_blob';
                    $mimeCol = $field . '_mime';

                    if (!empty($record->{$blobCol})) {
                        continue;
                    }

                    $path = $record->{$field};
                    if (empty($path)) {
                        continue;
                    }

                    if (str_starts_with($path, 'http') || str_starts_with($path, 'data:')) {
                        continue;
                    }

                    $candidates = [
                        $path,
                        storage_path('app/public/' . $path),
                        public_path($path),
                        public_path('storage/' . $path),
                        base_path($path),
                    ];

                    $contents = null;
                    foreach ($candidates as $candidate) {
                        if (file_exists($candidate) && is_file($candidate)) {
                            $read = file_get_contents($candidate);
                            if ($read !== false) {
                                $contents = $read;
                                break;
                            }
                        }
                    }

                    if ($contents !== null) {
                        $record->{$blobCol} = base64_encode($contents);

                        $mime = null;
                        foreach ($candidates as $candidate) {
                            if (file_exists($candidate)) {
                                $detected = mime_content_type($candidate);
                                if ($detected) {
                                    $mime = $detected;
                                    break;
                                }
                            }
                        }
                        $record->{$mimeCol} = $mime ?: 'image/jpeg';
                        $dirty = true;
                    }
                }

                if ($dirty) {
                    $record->saveQuietly();
                    $total++;
                    $this->output->write('.');
                }
            }
        }

        $this->newLine();
        $this->info("Migrated {$total} records.");

        return Command::SUCCESS;
    }
}
