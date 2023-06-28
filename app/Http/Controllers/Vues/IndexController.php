<?php

namespace App\Http\Controllers\Vues;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        return view('vues.index');
    }
}
