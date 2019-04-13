@if($action === 'edit')
    @foreach($imageFields as $image)
        <div class="form-control">
            @include('components.form.imageUpload', [
                 'name' => $image,
                 'images' => $resource->getMedia("cover"),
                 'label' => \Illuminate\Support\Str::ucfirst($image),
                 'edit' => 1,
                 'resource' => $resource,
                 'collectionName' => $image,
                 'resourceId' => $resource->id
            ])
        </div>
    @endforeach
@else
    @foreach($imageFields as $image)
        <div class="form-control">
            @include('components.form.imageUpload', [
                'name' => $image,
                'label' => \Illuminate\Support\Str::ucfirst($image)]
            )
        </div>
    @endforeach
@endif
<div class="form-control">
    @include('components.form.text', ['name' => 'title'])
</div>
<div class="form-control">
    @include('components.form.text', ['name' => 'description'])
</div>
<div class="form-control">
    @include('components.form.wysiwyg', ['name' => 'content'])
</div>
<div class="form-control">
    @include('components.form.text', ['name' => 'slug'])
</div>
