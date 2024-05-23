<?php

namespace App\Http\Controllers;

use App\Models\Regobject;
use Domain\Catalog\ViewModels\AutoCompleteViewModel;
use Illuminate\Http\Request;

class AjaxController
{
    public function autocomplete(Request $request)
    {

        $result = AutoCompleteViewModel::make()->search($request);

        header('Content-Type: application/json');
        return response()->json($result);

    }
}
