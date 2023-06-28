<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\StoreRequest;
use App\Http\Resources\PersonResource;
use App\Models\Person;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): PersonResource
    {
        $personData = $request->validated();

        $newPerson = Person::firstOrCreate(['name' => $personData['name']], $personData);

        return new PersonResource($newPerson);
    }
}
