<section style='background-image: url({{$background}}); background-size: cover;'>
    <div class="w-full h-64 flex items-center justify-center md:justify-start my-16 md:my-32 max-w-3xl mx-auto">
        <div class="heading-content heading-content--white max-w-sm w-sm">
            <h1>{{ $title }}</h1>
            <p>{{ $description }}</p>
            <button class="btn btn-outline-primary hover:border-brand-light self-stretch">
                {{ $callToAction }}
            </button>
        </div>
    </div>
</section>
