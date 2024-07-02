<?php
// app/Http/Controllers/QuoteController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;

class QuoteController extends Controller
{
    public function randomQuote()
    {
        $quote = Quote::inRandomOrder()->first();
        return response()->json($quote);
    }

    public function searchQuoteByAuthor(Request $request)
    {
        $author = $request->input('author');
        $quotes = Quote::where('author', 'like', '%' . $author . '%')->get();
        return response()->json($quotes);
    }

    public function showQuotesView()
    {
        return view('quotes');
    }
}
