<?php

namespace App\Livewire\Public;

use Livewire\Component;

class Tutorials extends Component
{

  public function render()
  {
      return view('livewire.public.tutorials')->extends('components.layouts.public')->section('content');
  }
}
