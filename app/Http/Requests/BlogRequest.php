<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Enums\BlogStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

final class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:2'],
            'banner' => ['nullable', 'max:1024'],
            'status' => ['required', new Enum(BlogStatus::class)],
            'details' => ['required', 'string'],
        ];
    }
}
