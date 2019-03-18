<template>
    <div class="form-control">
        <input name="itinerary" type="hidden" id="itinerary" :value="itineraryStringify"/>
        <label for="itinerary">Itinerary</label>
        <div v-for="singleItinerary in this.itinerary">
            <label for="hour">Hour</label>
            <input id="hour" type="text" name="hour" v-model="singleItinerary.hour" class="form-input">

            <label for="description">Description</label>
            <input id="description" type="text" name="description" v-model="singleItinerary.description" class="form-input">
            <div @click="removeItinerary(singleItinerary)">Remove</div>
        </div>
        <button class="btn" @click.prevent="addItinerary">Add</button>
    </div>
</template>

<script>
    export default {
        props: {
            initialData: {
                type: Array,
                default: function () {
                    return [
                        {
                            hour: '',
                            description: ''
                        }
                    ]
                }
            },
        },
        data: function () {
            return {
                itinerary: [],
            }
        },
        mounted: function () {
            this.itinerary = this.$props.initialData;
        },
        computed: {
            itineraryStringify: function () {
                return JSON.stringify(this.itinerary);
            }
        },
        methods: {
            addItinerary: function () {
                this.itinerary.push({
                    'hour': '',
                    'description': ''
                })
            },
            removeItinerary: function (toRemove) {
                this.itinerary = this.itinerary.filter(itinerary => {
                    return itinerary.description !== toRemove.description
                        && itinerary.hour !== toRemove.hour;
                })
            }
        }
    }
</script>
