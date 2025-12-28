<?php

namespace App\Livewire\Dashboard;

use App\Models\Booking;
use App\Models\BookingStatus;
use Carbon\Carbon;
use Livewire\Component;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;
use Illuminate\Support\Arr;
use Jenssegers\Agent\Agent;

class Dashboard extends Component
{
    public function render()
    {
      Carbon::setLocale('es');
      $now = Carbon::now();
      $months = [$now->copy()->subMonths(2), $now->copy()->subMonth(), $now, $now->copy()->addMonth(), $now->copy()->addMonths(2)];
      $labels = Arr::map($months, fn($month) => $month->shortMonthName . ' ' . $month->year);
      $data = Arr::map($months, fn($month) => Booking::whereNot('status_id', BookingStatus::CANCELLED)->whereYear('date', $month->year)->whereMonth('date', $month->month)->count());
      $agent = new Agent();
    $chart = Chartjs::build()
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 300, 'height' => $agent->isDesktop() ? 100 : 300])
            ->labels($labels)
            ->datasets([
                [
                    "label" => __('Bookings'),
                    'backgroundColor' => '#696cff57',
                    'borderColor' => '#696cff',
                    'borderWidth' => 5,
                    'data' => $data
                ],
            ])
            ;

            //dd($chart);
        return view('livewire.dashboard.dashboard')->with('chart', $chart);
    }
}
