<template>
    <a
        @click.prevent="scrollTo"
        class="tab flex-1 py-4 hover:bg-brand hover:text-white link-reset text-black"
        :class="{'active': this.active}"
        :href="`#${href}`"
    >
        {{ title }}
    </a>
</template>

<script>
    export default {
        props: ['title', 'active', 'href'],
        methods: {
            scrollTo() {
                let element = document.getElementById(this.href);
                window.scrollBy({
                    top: element.getBoundingClientRect().top - 55, // could be negative value
                    left: 0,
                    behavior: 'smooth'
                });
            }
        }
    }
</script>
