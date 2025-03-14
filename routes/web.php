<?php

use App\Livewire\Admin\{Book, Reader, Reading};
use Illuminate\Support\Facades\Route;

Route::get("/", Book::class)->name("book");
Route::get("/reader", Reader::class)->name("reader");
Route::get("/emprestimo", Reading::class)->name("reading");