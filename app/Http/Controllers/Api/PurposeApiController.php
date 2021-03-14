<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Purpose;
use Illuminate\Http\Request;
use App\Http\Resources\Purpose as PurposeResource;
use Illuminate\Support\Collection;
use Illuminate\Http\Response;

class PurposeApiController extends Controller
{
    public function allServicePurposes($id)
    {
    	$purposes = Purpose::where('service_id', $id)->get();

    	if ($purposes) {
    		return PurposeResource::collection($purposes);
    	}

    	return response()->json('No purpose with matching service id found.');
    }
}
