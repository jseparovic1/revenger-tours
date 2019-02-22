<template>
    <div>
        <form
            class="mb-4 md:flex md:flex-wrap md:justify-between form-labeled"
            :action="this.action"
            method="post"
            @submit.prevent="handleFormSubmit"
            @keyup="form.errors.clear($event.target.name)"
        >
            <div class="w-full mb-4 focus:outline-none">
                <datepicker
                    :placeholder="'DATE'"
                    :input-class="['form-input', 'w-full']"
                    :wrapper-class="['form-control']"
                    v-model="form.dateInput"
                    @selected="changeInput"
                >
                </datepicker>
                <input
                    class="hidden"
                    type="text"
                    id="trip_date"
                    name="trip_date"
                    v-model="form.dateInput"
                >
            </div>
            <div class="form-control w-full">
                <input class="form-input md:mr-2"
                       :class="{'border border-danger': form.errors.get('people')}"
                       v-model="form.people"
                       type="number"
                       name="people"
                       id="people"
                       :max="this.maxNumber"
                >
                <label for="people" class="md:ml-2" :class="{'has-content' : this.form.people}">NUMBER OF PEOPLE</label>
                <p v-text="form.errors.get('people')" class="text-sm text-danger p-0 m-0"></p>
            </div>
            <div class="form-control w-full">
                <input class="form-input md:mr-2"
                       v-model="form.name"
                       type="text"
                       name="name"
                       id="name"
                />
                <label for="name" class="md:ml-2" :class="{'has-content' : this.form.name}">NAME</label>
                <p v-if="form.errors.has('name')" v-text="form.errors.get('name')" class="text-sm text-danger p-0 m-0"></p>
            </div>
            <div class="form-control w-full">
                <input class="form-input md:mr-2"
                       v-model="form.email"
                       type="email"
                       name="email"
                       id="email"
                />
                <label for="email" class="md:ml-2" :class="{'has-content' : this.form.email}">EMAIL</label>
                <p v-if="form.errors.has('email')" v-text="form.errors.get('email')" class="text-sm text-danger p-0 m-0"></p>
            </div>
            <div class="form-control w-full">
                <textarea class="form-input md:mr-2"
                          v-model="form.comment"
                          name="comment"
                          id="comment"
                ></textarea>
                <label for="comment" class="md:ml-2" :class="{'has-content' : this.form.comment}">COMMENT</label>
                <p v-if="form.errors.has('comment')" v-text="form.errors.get('comment')" class="text-sm text-danger p-0 m-0"></p>
            </div>
            <div v-if="this.form.people > 0" class="w-full p-4 mb-4 bg-grey text-white">
                <div class="flex items-center">
                    <span class="w-24">DEPOSIT</span>
                    <h4 class="text-xl tracking-wide">€{{ this.deposit}}</h4>
                </div>
                <div class="flex items-center">
                    <span class="w-24">TOTAL</span>
                    <h4 class="text-xl tracking-wide">€{{ this.price}}</h4>
                </div>
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
    import Form from "../core/Form";

    export default {
        components: {
            Datepicker,
        },
        props: {
            action: String,
            tripDate: String,
            peopleNumber: {
                type: Number,
                required: false,
                default: null,
            },
            method: String,
        },
        data: function () {
            return {
                form: new Form({
                    dateInput: '',
                    comment: '',
                    name: '',
                    email: '',
                    people: '',
                }),
                initialDate: null,
                maxNumber: 8,
            }
        },
        mounted: function () {
            this.form.people = this.$props.peopleNumber;
            this.form.dateInput = new Date(this.tripDate);
        },
        computed: {
            price: function () {
                return this.form.people * 100;
            },
            deposit: function () {
                return this.price * 10/100;
            },
        },
        methods: {
            changeInput: function (value) {
                this.dateInput = value.toISOString();
            },
            handleFormSubmit: function () {
                this.form.submit(this.method, '/tour/request')
                    .then(data => {
                        console.log(data);
                    })
                    .catch(errors => {
                        //really dirty hack
                        this.form.name = this.form.name + ' ';
                    }
                );
            }
        }
    }
</script>
