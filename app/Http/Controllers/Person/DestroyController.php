<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Response;

class DestroyController extends Controller
{
    public function __invoke(Person $person): Response
    {
        $isDeleted = $person->delete();

        return response($isDeleted);
    }
}
