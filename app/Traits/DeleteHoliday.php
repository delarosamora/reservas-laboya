<?php

namespace App\Traits;

use App\Models\Holiday;
use Illuminate\Support\Facades\Log;
use Throwable;

trait DeleteHoliday
{
    public function delete(Holiday $holiday){
    try{
      $holiday->delete();
      session()->flash('success', __('Holiday deleted succesfully'));
      $this->redirectRoute('admin.holidays.index', [], true, true);
    }catch(Throwable $e){
      session()->flash('error', __('Error while deleting holiday'));
      Log::error($e->getMessage());
      Log::error($e->getTraceAsString());
    }
  }
}
