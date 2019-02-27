<div class="details">
    <div class="flex items-center px-4 py-6 border-b">
        <div class="w-1/2"><span class="text-lg font-bold">Departure & Return Location</span></div>
        <div class="w-1/2"><span>{{ $departureLocation }}</span></div>
    </div>
    <div class="flex items-center px-4 py-6 border-b">
        <div class="w-1/2"><span class="text-lg font-bold">Departure Time</span></div>
        <div class="w-1/2"><span>{{ $departureTime }}</span></div>
    </div>
    <div class="flex items-center px-4 py-6">
        <div class="w-1/2 self-start"><span class="text-lg font-bold">Included And Not</span></div>
        <div class="w-1/2">
            <ul class="included-list list-reset">
                @foreach($included as $includedItem)
                    <li class="included">{{ $includedItem }}</li>
                @endforeach
                @foreach($excluded as $excludedItem)
                    <li class="excluded">{{ $excludedItem }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
