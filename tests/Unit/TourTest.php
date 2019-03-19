<?php

namespace Tests\Unit;

use App\Services\TimeProvider;
use App\Tour;
use Carbon\Carbon;
use Tests\TestCase;

class TourTest extends TestCase
{
    /**
     * @test
     * @dataProvider seasonDatesProvider
     */
    public function it_shows_valid_sassoon_price($nowMonth, $nowDay, $expectedPrice)
    {
        /** @var Tour $tour */
        $tour = factory(Tour::class)->create([
            'price' => 120,
            'price_off' => 100,
        ]);

        $this->mock(TimeProvider::class, function ($timeProviderMock) use ($nowMonth, $nowDay) {
            $timeProviderMock
                ->shouldReceive('now')
                ->once()
                ->andReturn(Carbon::create(now()->year, $nowMonth, $nowDay));
        });

        $this->assertEquals($expectedPrice, $tour->priceNow());
    }

    public function seasonDatesProvider()
    {
        return [
            "Season staring date" => [7, 1, 120],
            "Season mid date" => [8, 1, 120],
            "Season ending date" => [9, 5, 120],
            "Off season staring date" => [9, 6, 100],
            "Off season ending date" => [6, 30, 100],
        ];
    }
}
