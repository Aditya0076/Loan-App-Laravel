<?php

namespace App\Filament\Widgets;

use App\Models\Loan;
use Filament\Widgets\ChartWidget;

class TotalBorrower extends ChartWidget
{
    protected static ?string $heading = 'Total Borrower';

    protected function getData(): array
    {
        $data = Loan::query()
            ->selectRaw('borrower_name, count(*) as count')
            ->groupBy('borrower_name')
            ->pluck('count', 'borrower_name');
        return [
            'datasets' => [
                [
                    'label' => 'Name Borrower',
                    'data' => $data,
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                ]
            ],

            'labels' => ['Total Borrower'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
