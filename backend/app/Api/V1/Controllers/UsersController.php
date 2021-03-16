<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;

class UsersController extends Controller
{
    use Helpers;

    private $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function get() {
        return [
            'success' => true
        ];
    }
}
