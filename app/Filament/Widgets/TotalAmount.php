<?php

namespace App\Filament\Widgets;

use App\Models\Loan;
use Filament\Widgets\ChartWidget;

class TotalAmount extends ChartWidget
{
    protected static ?string $heading = 'Total Amount';

    protected function getData(): array
    {
        $data = Loan::query()
            ->selectRaw('borrower_name, sum(amount) as count')
            ->groupBy('borrower_name')
            ->pluck('count', 'borrower_name');
        return [
            'datasets' => [
                [
                    'label' => 'Name Borrower',
                    'data' => $data,
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'borderWidth' => 1
                ]
            ],

            'labels' => ['Total Amount'],
            'total' => $data->sum(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
