<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Demo\Test;

class TestController extends Controller
{
  private $request;

  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  public function get()
  {
    return Test::get();
  }
}
