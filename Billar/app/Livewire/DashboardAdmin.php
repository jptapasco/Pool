<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardAdmin extends Component
{
    public $usuario_actual;
    public function mount()
    {
        $this->usuario_actual=Auth::user();
    }
    public function render()
    {
        return view('livewire.dashboard-admin')->extends('layouts.app')->section('content');
    }
}
