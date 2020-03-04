<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Tour;
use Tests\TestCase;

class SmokeTest extends TestCase
{
    /**
     * @test
     * @dataProvider getAppRoutes
     */
    public function it_can_visit_all_defined_routes(string $route): void
    {
        $this->seed();

        $this->get($route)->assertOk();
    }

    public function getAppRoutes(): array
    {
        return [
            'Show home page' => ['/'],
            'Show tours list action' => ['/tours'],
//            'Show single tour' => ['/tour/blue-lagoon'], @todo fix this test...
            'Show private tours' => ['/tour/private'],
            'Show tour request contact form' => ['/tour/request'],

            'Show contact form' => ['/contact'],
            'Show blog posts list' => ['/blog'],
            'Show single blog post' => ['/blog/blue-lagoon-diary'],
        ];
    }
}
