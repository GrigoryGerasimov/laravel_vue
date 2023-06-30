<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\RedirectResponse;

class RestoreController extends Controller
{
    public function __invoke(Person $person): RedirectResponse
    {
        $person->restore();

        return redirect()->route('people.index');
    }
}
