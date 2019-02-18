<template>
    <div>
        <form class="mb-4 md:flex md:flex-wrap md:justify-between form-labeled" :action="this.action" method="get">
            <div class="md:w-full mb-4 focus:outline-none">
                <datepicker :required="true" :placeholder="'DATE'" :input-class="['form-input', 'w-full']" @selected="changeInput"></datepicker>
                <input class="hidden" type="text" id="trip_date" name="trip_date" v-model="dateInput">
            </div>
            <div class="form-control md:w-1/2">
                <input class="form-input md:mr-2" type="number" name="adults" id="adults">
                <label for="adults">Adults</label>
            </div>
            <div class="form-control md:w-1/2">
                <input class="form-input md:ml-2" type="number" name="kids" id="kids">
                <label class="md:ml-2" for="kids">Kids</label>
            </div>
            <button
                class="block bg-brand hover:bg-brand-dark text-white uppercase text-lg mx-auto p-4 rounded font-bold tracking-tight"
                type="submit">SEND INQUIRY
            </button>
        </form>
    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';

    export default {
        props: ['action'],
        data: function() {
            return {
                dateInput: ''
            }
        },
        components: {
            Datepicker,
        },
        methods: {
            changeInput: function (value) {
                this.dateInput = value.toISOString();
            }
        }
    }
</script>
