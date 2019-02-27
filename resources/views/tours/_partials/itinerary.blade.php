<h1>Itinerary</h1>
<ul class="itinerary-list list-reset max-w-sm">
    @foreach($itinerary as $itineraryItem)
        <li class="flex items-center my-3">
                <span class="tracking-wide font-semibold w-48">{{ $itineraryItem['hour'] }}</span>
                <span>{{ $itineraryItem['description'] }}</span>
        </li>
    @endforeach
</ul>
