<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\StoreRequest;
use App\Http\Resources\PersonResource;
use App\Models\Person;
use Illuminate\Http\Response;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): Response
    {
        $personData = $request->validated();

        $newPerson = Person::firstOrCreate(['name' => $personData['name']], $personData);

        return response(new PersonResource($newPerson), 201);
    }
}
