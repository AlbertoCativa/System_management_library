<?php

use App\Livewire\Admin\{Book, Reader, Reading, Home, Category};
use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;

Route::get("/", Login::class)->name("login");
Route::get("/livros", Book::class)->name("book");
Route::get("/reader", Reader::class)->name("reader");
Route::get("/emprestimo", Reading::class)->name("reading");
Route::get("/categoria", Category::class)->name("category");
Route::get("/home", Home::class)->name("home");