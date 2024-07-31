<?php

namespace App\Filament\Widgets;

use App\Models\Loan;
use Filament\Widgets\ChartWidget;

class LoanStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Loan Status';

    protected function getData(): array
    {
        $data = Loan::query()
            ->selectRaw('loan_status, count(*) as count')
            ->groupBy('loan_status')
            ->pluck('count', 'loan_status');
        return [
            'datasets' => [
                [
                    'label' => 'Loan Status',
                    'data' => $data,
                ]
            ],

            'labels' => $data->keys(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
