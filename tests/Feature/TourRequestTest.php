<?php

namespace Tests\Feature;

use App\Mail\TourRequested;
use App\Tour;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Mail;
use Tests\TestCase;

class TourRequestTest extends TestCase
{
    /**
     * @test
     */
    public function it_validates_contact_request()
    {
        $response = $this->postJson(route('request.store'), []);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonFragment([
            'errors' => [
                'email' => ['The email field is required.'],
                'name' => ['The name field is required.'],
                'people' => ['The people field is required.'],
                'tour' => ['The tour field is required.'],
                'dateInput' => ['The date input field is required.'],
            ],
            'message' => 'The given data was invalid.'
        ]);
    }

    /**
     * @test
     */
    public function it_sends_email_to_site_owner()
    {
        Mail::fake();

        /** @var Tour $tour */
        $tour = factory(Tour::class)->create();

        $this->withExceptionHandling();

        $response = $this->postJson(route('request.store'), [
            'email' => 'mate@mate.com',
            'name' => 'Mate',
            'people' => 2,
            'tour' => $tour->id,
            'dateInput' => Carbon::now()->toDateString(),
        ]);

        $response->assertStatus(Response::HTTP_OK);

        Mail::assertQueued(TourRequested::class);
    }
}
