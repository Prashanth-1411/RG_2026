<?php

namespace App\Models\Concerns;

trait HasImageBlobs
{
    public static function bootHasImageBlobs(): void
    {
        static::saving(function ($model) {
            $model->storeBlobs();
        });
    }

    public function initializeHasImageBlobs(): void
    {
        foreach ($this->imageBlobFields() as $field => $cols) {
            $urlField = $field . '_url';
            if (!in_array($urlField, $this->appends, true)) {
                $this->appends[] = $urlField;
            }
        }
    }

    abstract protected function imageBlobFields(): array;

    public function hasAttribute($key)
    {
        if ($this->isImageUrlField($key)) {
            return true;
        }

        return parent::hasAttribute($key);
    }

    public function getAttributeValue($key)
    {
        if ($this->isImageUrlField($key, $field)) {
            return $this->getImageUrl($field);
        }

        return parent::getAttributeValue($key);
    }

    protected function mutateAttribute($key, $value)
    {
        if ($this->isImageUrlField($key, $field)) {
            return $this->getImageUrl($field);
        }

        return parent::mutateAttribute($key, $value);
    }

    private function isImageUrlField(string $key, ?string &$matchedField = null): bool
    {
        foreach ($this->imageBlobFields() as $field => $cols) {
            if ($key === $field . '_url') {
                $matchedField = $field;
                return true;
            }
        }

        return false;
    }

    protected function storeBlobs(): void
    {
        foreach ($this->imageBlobFields() as $field => [$blobCol, $mimeCol]) {
            $path = $this->{$field};

            if (empty($path)) {
                continue;
            }

            if (str_starts_with($path, 'data:')) {
                continue;
            }

            if ($this->{$blobCol} && !$this->isDirty($field)) {
                continue;
            }

            $contents = $this->readFileContents($path);
            if ($contents !== null) {
                $this->{$blobCol} = base64_encode($contents);
                $this->{$mimeCol} = $this->detectMimeType($path, $contents);
            }
        }
    }

    public function getImageUrl(string $field): ?string
    {
        $fields = $this->imageBlobFields();
        if (!isset($fields[$field])) {
            return $this->{$field} ?? null;
        }

        [$blobCol, $mimeCol] = $fields[$field];
        $blob = $this->{$blobCol};
        $mime = $this->{$mimeCol};

        if ($blob && $mime) {
            return 'data:' . $mime . ';base64,' . $blob;
        }

        $path = $this->{$field};
        if (!$path) {
            return null;
        }

        if (str_starts_with($path, 'http') || str_starts_with($path, 'data:')) {
            return $path;
        }

        return asset('storage/' . $path);
    }

    private function readFileContents(string $path): ?string
    {
        $candidates = [
            $path,
            storage_path('app/public/' . $path),
            public_path($path),
            public_path('storage/' . $path),
            base_path($path),
        ];

        foreach ($candidates as $candidate) {
            if (file_exists($candidate) && is_file($candidate)) {
                $contents = file_get_contents($candidate);
                return $contents !== false ? $contents : null;
            }
        }

        return null;
    }

    private function detectMimeType(string $path, string $contents): string
    {
        $candidates = [
            $path,
            storage_path('app/public/' . $path),
            public_path($path),
            public_path('storage/' . $path),
            base_path($path),
        ];

        foreach ($candidates as $candidate) {
            if (file_exists($candidate)) {
                $mime = mime_content_type($candidate);
                if ($mime) {
                    return $mime;
                }
            }
        }

        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $detected = $finfo->buffer($contents);
        return $detected ?: 'image/jpeg';
    }
}
