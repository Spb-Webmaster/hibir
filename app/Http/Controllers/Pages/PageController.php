<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Вывод страницы
     */
    public function page(Page $page)
    {

        return view('pages.page',
            [
                'page' => $page,
            ]);
    }



}
