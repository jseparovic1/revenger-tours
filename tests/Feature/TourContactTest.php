<?php

namespace Tests\Feature;

use App\Mail\TourRequested;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Mail;
use Tests\TestCase;

class TourContactTest extends TestCase
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

        $this->withExceptionHandling();

        $response = $this->postJson(route('request.store'), [
            'email' => 'mate@mate.com',
            'name' => 'Mate',
            'people' => 2,
            'dateInput' => Carbon::now()->toDateString(),
        ]);

        $response->assertStatus(Response::HTTP_OK);

        Mail::assertQueued(TourRequested::class);
    }
}
