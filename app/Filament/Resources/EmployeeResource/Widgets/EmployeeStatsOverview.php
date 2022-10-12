<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $ind = Country::where('country_code', 'IND')->withCount('employee')->first();
        $test = Country::where('country_code', 'Test2')->withCount('employee')->first();
        return [
            Card::make('All Employees', Employee::all()->count()),
            Card::make($ind->name . ' Employees', $ind->employee_count),
            Card::make($test->name . ' Employees', $test->employee_count),
        ];
    }
}