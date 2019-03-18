<template>
    <div class="mb-8">
        <input name="itinerary" type="hidden" id="itinerary" :value="itineraryStringify"/>
        <div class="label">
            <label for="itinerary">Itinerary</label>
        </div>
        <div v-for="singleItinerary in this.itinerary">
            <div class="flex flex-row items-center">
                <div class="form-group w-1/5 mr-5">
                    <input class="form-input w-full"
                           id="hour"
                           type="text"
                           name="hour"
                           v-model="singleItinerary.hour"
                           placeholder="Hour"
                    >
                </div>
                <div class="flex w-3/5 items-center">
                    <input
                        class="form-input w-full"
                        id="description"
                        type="text"
                        name="description"
                        v-model="singleItinerary.description"
                        placeholder="Description"
                    >
                </div>
                <div
                    @click="removeItinerary(singleItinerary)"
                    title="Remove intiernary"
                    class="ml-2 text-brand font-bolder hover:text-brand-darkest cursor-pointer">
                    X
                </div>
            </div>
        </div>
        <div class="mx-2 mt-4">
            <a class="btn btn-outline" @click.prevent="addItinerary">+ Add itinerary</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            initialData: {
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
            this.itinerary = typeof this.$props.initialData === 'string' ? JSON.parse(this.$props.initialData) : null;
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
