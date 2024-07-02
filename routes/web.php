<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// routes/web.php
// routes/web.php

use App\Http\Controllers\QuoteController;

Route::get('/quotes', [QuoteController::class, 'showQuotesView'])->name('quotes');
Route::get('/api/quote/random', [QuoteController::class, 'randomQuote'])->name('randomQuote');
Route::get('/api/quote/search', [QuoteController::class, 'searchQuoteByAuthor'])->name('searchQuoteByAuthor');
