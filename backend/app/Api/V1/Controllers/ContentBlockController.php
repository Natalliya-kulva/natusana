<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\ContentBlock;

class ContentBlockController extends Controller
{
    use Helpers;

    private $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function get($item_id) {
        if ( $item_id ) {
            return ContentBlock::where(['name' => $item_id])->first();
        }

        return ContentBlock::get();
    }
}
