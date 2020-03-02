<h1>Itinerary</h1>
<ul class="list-reset max-w-sm">
    @foreach($itinerary as $itineraryItem)
        <li class="flex my-2">
            <span class="text-grey-darkest">{{ $loop->iteration }}.</span><span class="ml-2">{{ $itineraryItem['itinerary'] }}</span>
        </li>
    @endforeach
</ul>
