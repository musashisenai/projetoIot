<?php

use App\Livewire\AmbienteCreate;
use App\Livewire\AmbienteEdit;
use App\Livewire\AmbienteIndex;
use App\Livewire\Dashboard;
use App\Livewire\SensorCreate;
use App\Livewire\SensorEdit;
use App\Livewire\SensorIndex;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', Dashboard::class)->name('dashboard');

Route::get('ambiente/create', AmbienteCreate::class)->name('ambiente.create');
Route::get('ambiente', AmbienteIndex::class)->name('ambiente.index');
Route::get('ambiente/edit/{id}', AmbienteEdit::class)->name('ambiente.edit');

Route::get('sensor/create', SensorCreate::class)->name('sensor.create');
Route::get('sensor', SensorIndex::class)->name('sensor.index');
Route::get('sensor/edit/{id}', SensorEdit::class)->name('sensor.edit');




