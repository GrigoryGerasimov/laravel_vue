<?php

namespace App\Http\Controllers\People;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke(): array
    {
        return [
            [
                'name' => 'John Doe',
                'age' => 22,
                'gender' => 'male',
                'occupation' => 'backer'
            ],
            [
                'name' => 'Jane Doe',
                'age' => 36,
                'gender' => 'female',
                'occupation' => 'doctor'
            ],
            [
                'name' => 'Mary-Ann Wintertale',
                'age' => 40,
                'gender' => 'female',
                'occupation' => 'gardener'
            ],
            [
                'name' => 'James Thosie',
                'age' => 19,
                'gender' => 'other',
                'occupation' => 'student'
            ],
            [
                'name' => 'Howard Easter',
                'age' => 87,
                'gender' => 'male',
                'occupation' => 'colonel'
            ]
        ];
    }
}
