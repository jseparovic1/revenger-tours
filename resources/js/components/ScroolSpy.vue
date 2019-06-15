<template>
    <div class="sticky pin-t tabs w-full flex text-center font-semibold justify-between lg:justify-start mb-4 bg-white">
        <spy-item v-for="(heading, key) in this.headings"
                  :title="heading.textContent"
                  :href="heading.id"
                  :key="key"
                  :active="heading === current">
        </spy-item>
    </div>
</template>

<script>
    import SpyItem from "./SpyItem";
    export default {
        components: {
            SpyItem
        },
        data: function() {
            return {
                headings: [],
                current: {},
                elementSelector: '.tour-content h1'
            }
        },
        mounted: function () {
            this.headings = document.querySelectorAll(this.elementSelector);
            this.addHeadingIdOnFly();

            this.findActiveHeading();
            window.addEventListener('scroll', _.throttle(this.findActiveHeading, 1));
        },
        methods: {
            findActiveHeading: function() {
                let absoluteHeadings = [];
                this.headings.forEach(h => {
                    absoluteHeadings.push(
                        Math.abs(h.getBoundingClientRect().top),
                    );
                });

                let current = Math.min(...absoluteHeadings);
                this.headings.forEach((heading) => {
                    if(heading.getBoundingClientRect().top === current){
                        this.current = heading;
                    }
                });
            },
            addHeadingIdOnFly: function() {
                this.headings = Array.from(this.headings).map(heading => {
                   heading.id = _.toLower(_.trim(heading.textContent));

                   return heading;
                });
            }
        }
    }
</script>
