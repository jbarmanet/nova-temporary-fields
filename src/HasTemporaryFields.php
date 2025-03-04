<?php

namespace Ganyicz\NovaTemporaryFields;

use Illuminate\Support\Collection;
use Laravel\Nova\Http\Requests\NovaRequest;

trait HasTemporaryFields
{
    protected static function fillFields(NovaRequest $request, $model, Collection $fields): array
    {
        return parent::fillFields($request, $model, $fields->reject(function ($field) {
            return $field->meta['_temp'] ?? false;
        }));
    }
}