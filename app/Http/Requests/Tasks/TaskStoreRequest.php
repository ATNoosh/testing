<?php

namespace App\Http\Requests\Tasks;

use App\Constants\TaskStatuses;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class TaskStoreRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('sanctum')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:500'],
            'status' => ['required', Rule::in(TaskStatuses::getAll())],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => $this->user()->id,
        ]);
    }
}
