<div class="form-control">
    @include('components.form.text', ['name' => 'title'])
</div>
<div class="form-control">
    @include('components.form.text', ['name' => 'type', 'placeholder' => 'Tour type "normal" or "private""'])
</div>
<div class="form-control">
    @include('components.form.text', ['name' => 'price'])
</div>
<div class="form-control">
    @include('components.form.wysiwyg', ['name' => 'details'])
</div>
<div class="form-control">
    @include('components.form.text', ['name' => 'hero_short_description'])
</div>
<div class="form-control">
    @include('components.form.textarea', ['name' => 'hero_description'])
</div>
<div class="form-control">
    @include('components.form.textarea', ['name' => 'short_description'])
</div>
<div class="form-control">
    @include('components.form.text', ['name' => 'departure_time'])
</div>
<div class="form-control">
    @include('components.form.text', ['name' => 'included'])
</div>
<div class="form-control">
    @include('components.form.text', ['name' => 'excluded'])
</div>
<div class="form-control flex-row justify-start w-48">
    @include('components.form.checkbox', ['name' => 'recommended'])
    @include('components.form.checkbox', ['name' => 'featured'])
</div>
