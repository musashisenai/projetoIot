<?php

use App\Livewire\Dashboard;
use App\Models\Ambiente;
use App\Models\Registro;
use App\Models\Sensor;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', Dashboard::class)->name('dashboard');



