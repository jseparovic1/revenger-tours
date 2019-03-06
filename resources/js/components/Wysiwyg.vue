<template>
    <div>
        <input id="trix" type="hidden" :name="name" :value="value">
        <trix-editor ref="trix" input="trix" :placeholder="placeholder"></trix-editor>
    </div>
</template>

<script>
    import trix from 'trix';

    export default {
        props: ['name', 'value', 'placeholder'],
        mounted: function () {
            this.$refs.trix.addEventListener('trix-change', event => {
                this.value = event.target.value;
            })
        },
    }
</script>
