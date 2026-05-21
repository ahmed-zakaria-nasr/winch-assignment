<?php

namespace Presentation\Cpanel\Requests;

use Domain\Order\Enums\OrderStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ListDriverOrdersRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => ['sometimes', Rule::enum(OrderStatus::class)],
            'per_page' => ['sometimes', 'integer', 'min:1', 'max:100'],
        ];
    }

    public function status(): ?OrderStatus
    {
        $status = $this->validated('status');

        return $status !== null ? OrderStatus::from($status) : null;
    }

    public function perPage(): int
    {
        return $this->integer('per_page', 15);
    }
}
