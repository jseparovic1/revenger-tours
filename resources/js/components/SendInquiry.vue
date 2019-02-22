<template>
    <div>
        <form class="mb-4 md:flex md:flex-wrap md:justify-between form-labeled" :action="this.action" method="get">
            <div class="w-full mb-4 focus:outline-none">
                <datepicker
                    required
                    :placeholder="'DATE'"
                    :input-class="['form-input', 'w-full']"
                    @selected="changeInput"
                >
                </datepicker>
                <input
                    class="hidden"
                    type="text"
                    id="trip_date"
                    name="trip_date"
                    v-model="dateInput"
                    required
                >
            </div>
            <div class="form-control w-full">
                <input class="form-input md:mr-2"
                       v-model="people"
                       type="number"
                       name="people"
                       id="people"
                       min="1"
                       :max="this.maxNumber"
                       required
                >
                <label for="people" class="md:ml-2" :class="{'has-content' : this.people}">NUMBER OF PEOPLE</label>
            </div>
            <button
                class="w-full bg-brand hover:bg-brand-dark text-white uppercase text-lg mx-auto p-4 rounded font-bold tracking-tight"
                type="submit">SEND INQUIRY
            </button>
        </form>
    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';

    export default {
        components: {
            Datepicker,
        },
        props: {
            action: String,
        },
        data: function () {
            return {
                dateInput: null,
                people: null,
                maxNumber: 8,
            }
        },
        methods: {
            changeInput: function (value) {
                this.dateInput = value.toISOString();
            },
        }
    }
</script>
