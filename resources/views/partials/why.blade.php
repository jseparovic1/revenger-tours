<section>
    <div class="container">
        <div class="flex flex-col items-center space-between">
            <h1 class="heading-title text-center">Why chose us</h1>
            <p class="heading-description">
                Lorem ipsum dolor sit amet consectetur adipiscing elit Etiam at ipsum at ligula vestibulum sodales Sed luctus orci vel nibh aliquam laoreet Aenean accumsan
            </p>
            <div class="flex flex-col md:flex-row  self-stretch justify-center">
                <div class="p-4 mx-2 mb-4 flex flex-col justify-start items-center flex-1">
                    @include('svg.happy' , ['class' => 'h-10 w-auto text-grey-darkest mb-2'])
                    <h3 class="text-brand text-center font-bold text-xl">1200</h3>
                    <p class="text-grey-dark py-4">Happy Customers</p>
                </div>
                <div class=" p-4 mx-2 mb-4 flex flex-col justify-start items-center flex-1">
                    @include('svg.boat' , ['class' => 'h-10 w-auto text-grey-darkest mb-2'])
                    <h3 class="text-brand text-center font-bold text-xl">Amazing boat</h3>
                    <p class="text-grey-dark py-4">We do care</p>
                </div>
                <div class=" p-4 mx-2 mb-4 flex flex-col justify-start items-center flex-1">
                    @include('svg.money' , ['class' => 'h-10 w-auto text-grey-darkest mb-2'])
                    <h3 class="text-brand text-center font-bold text-xl">Best prices</h3>
                    <p class="text-grey-dark py-4">Save money</p>
                </div>
            </div>
        </div>
    </div>
</section>
