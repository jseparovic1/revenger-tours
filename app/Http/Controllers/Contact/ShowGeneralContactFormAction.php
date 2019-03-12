<?php

declare(strict_types=1);

namespace App\Http\Controllers\Contact;

use App\Tour;
use Illuminate\Http\Request;

class ShowGeneralContactFormAction
{
    public function __invoke(Request $request)
    {
        if($request->has('tour')) {
            $tour = Tour::findOrFail($request->get('tour'));
            $privateTour = "Private tour request for {$tour->title}";
        }

        return response()->view('contact.general', [
            'privateTour' =>  $privateTour ?? ''
        ]);
    }
}
