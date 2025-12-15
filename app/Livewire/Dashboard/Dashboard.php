<?php

namespace App\Livewire\Dashboard;

use App\Models\Booking;
use Carbon\Carbon;
use Livewire\Component;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;
use Jenssegers\Agent\Agent;

class Dashboard extends Component
{
    public function render()
    {
      $year = Carbon::now()->year;
      $agent = new Agent();
    $chart = Chartjs::build()
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 300, 'height' => $agent->isDesktop() ? 100 : 300])
            ->labels([__('January'), __('February'), __('March'), __('April'), __('May'), __('June'), __('July'), __('August'), __('September'), __('October'), __('November'), __('December')])
            ->datasets([
                [
                    "label" => __('Bookings'),
                    'backgroundColor' => '#696cff57',
                    'borderColor' => '#696cff',
                    'borderWidth' => 5,
                    'data' => [
                      Booking::whereYear('date', $year)->whereMonth('date', 1)->count(),
                      Booking::whereYear('date', $year)->whereMonth('date', 2)->count(),
                      Booking::whereYear('date', $year)->whereMonth('date', 3)->count(),
                      Booking::whereYear('date', $year)->whereMonth('date', 4)->count(),
                      Booking::whereYear('date', $year)->whereMonth('date', 5)->count(),
                      Booking::whereYear('date', $year)->whereMonth('date', 6)->count(),
                      Booking::whereYear('date', $year)->whereMonth('date', 7)->count(),
                      Booking::whereYear('date', $year)->whereMonth('date', 8)->count(),
                      Booking::whereYear('date', $year)->whereMonth('date', 9)->count(),
                      Booking::whereYear('date', $year)->whereMonth('date', 10)->count(),
                      Booking::whereYear('date', $year)->whereMonth('date', 11)->count(),
                      Booking::whereYear('date', $year)->whereMonth('date', 12)->count(),
                    ]
                ],
            ])
            ;

            //dd($chart);
        return view('livewire.dashboard.dashboard')->with('chart', $chart);
    }
}
