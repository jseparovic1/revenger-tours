<?php

declare(strict_types=1);

namespace App\Services;

use Carbon\Carbon;

class TimeProvider
{
   public function now() :Carbon
   {
        return Carbon::now();
   }
}
