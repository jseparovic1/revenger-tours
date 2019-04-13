<section>
    <div class="container ">
        <div class="flex flex-col items-center space-between">
            <h1 class="heading-title text-center">{{ config('settings.main_chose_us.title') }}</h1>
            <p class="heading-description">{{ config('settings.main_chose_us.description') }}</p>
            <div class="flex flex-col md:flex-row  self-stretch justify-around">
                <div class="p-4 mx-2 mb-4 flex flex-col justify-start items-center">
                    @include('svg.happy' , ['class' => 'h-10 w-auto text-grey-darkest mb-2'])
                    <h3 class="text-brand text-center font-bold text-xl">1200</h3>
                    <p class="text-grey-dark py-4">{{ config('settings.main_chose_us.customers') }}</p>
                </div>
                <div class=" p-4 mx-2 mb-4 flex flex-col justify-start items-center">
                    @include('svg.boat' , ['class' => 'h-10 w-auto text-grey-darkest mb-2'])
                    <h3 class="text-brand text-center font-bold text-xl">Amazing boat</h3>
                    <p class="text-grey-dark py-4">{{ config('settings.main_chose_us.boat') }}</p>
                </div>
                <div class=" p-4 mx-2 mb-4 flex flex-col justify-start items-center">
                    @include('svg.money' , ['class' => 'h-10 w-auto text-grey-darkest mb-2'])
                    <h3 class="text-brand text-center font-bold text-xl">Best prices</h3>
                    <p class="text-grey-dark py-4">{{ config('settings.main_chose_us.price') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
