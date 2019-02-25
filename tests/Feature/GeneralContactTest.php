<?php

namespace Tests\Feature;

use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class GeneralContactTest extends TestCase
{
    /**
     * @test
     */
    public function it_validates_general_contact_form()
    {
        $response = $this->postJson(route('request.general.store'), []);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonFragment([
            'errors' => [
                'name' => ['The name field is required.'],
                'email' => ['The email field is required.'],
                'subject' => ['The subject field is required.'],
                'message' => ['The message field is required.'],
            ],
            'message' => 'The given data was invalid.'
        ]);
    }

    /**
     * @test
     */
    public function it_sends_general_contact_email_to_site_owner()
    {
        Mail::fake();

        $response = $this->postJson(route('request.general.store'), [
            'name' => 'Mark Jonson',
            'email' => 'mar@jonson.com',
            'subject' => "This is mail subject",
            'message' => "Hi, I'm bit retarded so sory",
        ]);

        $response->assertStatus(Response::HTTP_OK);

        Mail::assertQueued(Contact::class);
    }
}
