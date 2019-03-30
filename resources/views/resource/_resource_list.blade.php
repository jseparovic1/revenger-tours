<main class="bg-white flex-1 p-3 overflow-hidden">
    <div class="flex flex-col">
        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
            <div class="rounded overflow-hidden bg-white mx-2 w-full">
                <div class="px-6 py-6 flex justify-between">
                    <div class="text-xl">Manage {{ $base->title() }}</div>
                    <a href="{{ route("{$base->name()}.create") }}" class="py-2 px-4 border rounded-full text-black hover:border-brand">+ CREATE</a>
                </div>
                <div class="table-responsive">
                    <table class="table text-black">
                        <thead class="bg-brand-darkest text-white text-normal">
                        <tr>
                            @foreach($tableHeaders as $header)
                                <th>{{ $header }}</th>
                            @endforeach
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($resources as $resource)
                                <tr class="border-none">
                                    @foreach($fields as $field)
                                        {!! $base->renderField($resource, $field, 'index') !!}
                                    @endforeach

                                    <td class="flex">
                                        <a class="py-2 px-4 border rounded-full text-black hover:text-grey" href="{{ route("{$base->name()}.show", [$base->name() => $resource->id]) }}">SHOW</a>
                                        <a class="py-2 px-4 border rounded-full text-black hover:text-grey" href="{{ route("{$base->name()}.edit", [$base->name() => $resource->id]) }}">EDIT</a>
                                        <form action="{{ route("{$base->name()}.destroy", [$base->name() => $resource->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="py-2 px-4 bg-brand-darker rounded-full text-white hover:text-grey">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
