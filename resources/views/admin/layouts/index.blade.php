<main class="bg-white flex-1 p-3 overflow-hidden">
    <div class="flex flex-col">
        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
            <div class="rounded overflow-hidden bg-white mx-2 w-full">
                <div class="px-6 py-6 flex justify-between">
                    <div class="text-xl">{{ $title ?? "Manage {$resourceName}"}}</div>
                    <a href="{{ route('admin.posts.create') }}"
                       class="py-2 px-4 border rounded-full text-black hover:border-brand">
                        {{ \Illuminate\Support\Str::upper("+ Create $resourceName") }}
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table text-black">
                        <thead class="bg-brand-darkest text-white text-normal">
                        <tr>
                            @foreach($headers as $header)
                                <th>{{ $header }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                            {{ $slot }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
