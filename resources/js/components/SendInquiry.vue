<template>
    <div>
        <form class="mb-4 md:flex md:flex-wrap md:justify-between form-labeled" :action="this.action" method="get">
            <div class="w-full mb-4 focus:outline-none form-control">
                <label for="trip_date" class="md:ml-2" :class="{'has-content' : this.people}">DATE</label>
                <datepicker
                    class="mb-0"
                    required
                    :placeholder="'Chose trip date'"
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
                <label for="people" class="md:ml-2" :class="{'has-content' : this.people}">PEOPLE</label>
                <input class="form-input md:mr-2"
                       v-model="people"
                       type="number"
                       name="people"
                       id="people"
                       min="1"
                       :max="this.maxNumber"
                       required
                       placeholder="Number of people"
                >
            </div>
            <input class="hidden"
                   type="text"
                   name="tour"
                   hidden
                   :value="this.tour"
            >
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
            tour: String,
        },
        data: function () {
            return {
                dateInput: null,
                people: null,
                maxNumber: 10,
            }
        },
        methods: {
            changeInput: function (value) {
                this.dateInput = value.toISOString();
            },
        }
    }
</script>
