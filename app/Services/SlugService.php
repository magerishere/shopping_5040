<?php

namespace App\Services;


use App\Models\Slug;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SlugService
{

    /**
     * Create a new SlugService service.
     *
     * @return void
     */
    public function __construct(protected ?Model $model = null)
    {
        //
    }

    private function getQuery(): Builder
    {
        return Slug::query();
    }

    public function useModel(?Model $model = null): self
    {
        $this->model = $model;
        return $this;
    }

    public function create(string $value): Slug
    {
        $value = $this->makeContent($value);

        return $this->model->slug()->create([
            'content' => $value
        ]);
    }

    public function update(string $value): Slug
    {
        $value = $this->makeContent($value);

        $this->model->slug()->update([
            'content' => $value
        ]);

        $this->model->refresh();

        return $this->model->slug;
    }

    public function makeContent(string $value = '', string $separator = '-'): string
    {
        if (empty($value)) {
            return '';
        }

        // Convert all dashes/underscores into separator
        $flip = $separator === '-' ? '_' : '-';

        $value = preg_replace('![' . preg_quote($flip) . ']+!u', $separator, $value);

        // Replace @ with the word 'at'
        $value = str_replace('@', $separator . 'at' . $separator, $value);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $value = preg_replace('![^' . preg_quote($separator) . '\pL\pN\s]+!u', '', Str::lower($value));

        // Replace all separator characters and whitespace by a single separator
        $value = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $value);
        // remove separator in first and last character
        $value = trim($value, $separator);
        // if slug exists
        if ($existsSlug = $this->getByContent($value)) {
            $last_character = getLastStr($existsSlug->content);
            // if last character is numeric
            if (is_numeric($last_character)) {
                $new_last_character = (int)$last_character + 1;
                $value = replaceLastStr($last_character, $new_last_character, $existsSlug->content);
            } else {
                // set is number one for unique slug
                $value = $existsSlug->content . '-1';
            }
            // again check slug
            return $this->makeContent($value);
        }

        return $value;
    }

    public function getByContent(string $value): ?Slug
    {
        $query = $this->getQuery();

        if ($this->model) {
            return $query->where([
                'sluggable_type' => get_class($this->model),
                'content' => $value,
            ])->whereNot('sluggable_id', $this->model->id)->first();
        }

        return $query->where('content', $value)->first();
    }

}
