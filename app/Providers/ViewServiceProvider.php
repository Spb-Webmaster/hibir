<?php

namespace App\Providers;




use App\View\Composers\AreaComposer;
use App\View\Composers\InfoComposer;

use App\View\Composers\ReligionComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        View::composer(['include.blocks.slider.news_slider' ], InfoComposer::class);
        View::composer(['include.blocks.religions.religions_index' ], ReligionComposer::class);
        View::composer(['include.blocks.region.region_select'], AreaComposer::class);

    }
}
