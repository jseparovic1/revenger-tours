<template>
    <div>
        <input id="trix" type="hidden" :name="name" :value="oldValue ? oldValue : inputValue">
        <trix-editor class="tour-content bg-white" ref="trix" input="trix" :placeholder="placeholder"></trix-editor>
    </div>
</template>

<script>
    import trix from 'trix';

    export default {
        props: ['name', 'oldValue', 'placeholder'],
        data: function() {
            return {
                'inputValue': ''
            }
        },
        mounted: function () {
            this.$refs.trix.addEventListener('trix-change', event => {
                this.inputValue = event.target.value;
            })
        },
    }
</script>
