<?php

namespace App\Http\Controllers;

use App\Models\Regobject;
use Domain\Catalog\ViewModels\AutoCompleteViewModel;
use Illuminate\Http\Request;

class AjaxController
{
    public function bigAutocomplete(Request $request)
    {

        $result = AutoCompleteViewModel::make()->bigSearch($request);

        header('Content-Type: application/json');
        return response()->json($result);

    }

    public function topAutocomplete(Request $request)
    {

        $result = AutoCompleteViewModel::make()->topSearch($request);

        header('Content-Type: application/json');
        return response()->json($result);

    }
}
