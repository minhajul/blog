<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubscriberExport implements FromCollection, WithHeadings
{
    public $subscribers;

    public function __construct($subscribers)
    {
        $this->subscribers = $subscribers;
    }

    public function collection(): Collection
    {
        return $this->subscribers->map(function ($subscriber) {
            return [
                'ID' => $subscriber->id,
                'Email' => $subscriber->email,
                'Status' => $subscriber->status(),
                'Created At' => $subscriber->created_at,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Email',
            'Status',
            'Created At',
        ];
    }
}
