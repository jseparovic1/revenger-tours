<h1>Price</h1>
<table class="table text-center">
    <thead class="border-transparent border-0">
    <tr>
        <th scope="col">May, June & September</th>
        <th scope="col">July and August</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        @foreach($prices as $price)
                <td class="text-brand-darkest font-bold">{{ $price['low'] }}</td>
                <td class="text-brand-darkest font-bold ">{{ $price['high'] }}</td>
        @endforeach
    </tr>
    </tbody>
</table>
