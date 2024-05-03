<?php
namespace Domain\Hotel\ViewModels;

use App\Models\Hotel;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class HotelViewModel
{
    use Makeable;

    public function OneHotel($slug)
    {
        $hotels = Cache::rememberForever('hotel', function () {
            return Hotel::query()
                ->get_hotels()
                ->get();
        });
        $hotel = $hotels->firstWhere('slug', $slug);
        return $hotel;

    }



}
