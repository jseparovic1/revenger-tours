<template>
    <div>
        <div v-if="showSuccess" class="text-center">
            <h2 class="text-success text-xl font-bold leading-loose">
                Your request has been sent successfully!
            </h2>
            <p>We will contact you shortly :)</p>
        </div>
        <form
            v-if="!showSuccess"
            class="mb-4 md:flex md:flex-wrap md:justify-between form-labeled leading-none"
            :action="this.action"
            method="post"
            @submit.prevent="handleFormSubmit"
            @keyup="form.errors.clear($event.target.name)"
        >
            <div class="w-full mb-4 focus:outline-none mb-8 form-control">
                <label for="trip_date">DATE</label>
                <datepicker
                    :placeholder="'Chose trip date'"
                    :input-class="['form-input', 'w-full']"
                    :wrapper-class="['form-control']"
                    v-model="form.dateInput"
                    @selected="changeInput"
                >
                </datepicker>
                <p v-text="form.errors.get('dateInput')" class="text-sm text-danger p-0 -mt-8"></p>
                <input
                    class="hidden"
                    type="text"
                    id="trip_date"
                    name="trip_date"
                    v-model="form.dateInput"
                >
            </div>
            <div class="form-control w-full">
                <label for="tour">TOUR</label>
                <div class="border flex">
                    <select v-model="form.tour" id="tour" class="form-input m-0 p-0 flex" @change="setTourPrice">
                        <option value="" disabled selected>Please select tour</option>
                        <option v-for="tour in this.tours" :value="tour.id">{{ tour.title }}</option>
                    </select>
                </div>
                <p v-if="form.errors.has('tour')" v-text="form.errors.get('tour')" class="text-sm text-danger p-0 m-0"></p>
            </div>
            <div class="form-control w-full mb-10">
                <label for="people" :class="{'has-content' : form.people}">PEOPLE</label>
                <input class="form-input md:mr-2"
                       v-model="form.people"
                       type="number"
                       name="people"
                       id="people"
                       placeholder="Number of people for trip"
                       :max="maxNumber"
                >
                <p v-text="form.errors.get('people')" class="text-sm text-danger p-0 m-0"></p>
            </div>
            <div class="form-control w-full">
                <label for="name" :class="{'has-content' : form.name}">NAME</label>
                <input class="form-input md:mr-2"
                       v-model="form.name"
                       type="text"
                       name="name"
                       id="name"
                       placeholder="Your name"
                />
                <p v-if="form.errors.has('name')" v-text="form.errors.get('name')"
                   class="text-sm text-danger p-0 m-0"></p>
            </div>
            <div class="form-control w-full">
                <label for="email" :class="{'has-content' : form.email}">EMAIL</label>
                <input class="form-input md:mr-2"
                       v-model="form.email"
                       type="email"
                       name="email"
                       id="email"
                       placeholder="Your email"
                />
                <p v-if="form.errors.has('email')" v-text="form.errors.get('email')"
                   class="text-sm text-danger p-0 m-0"></p>
            </div>
            <div class="form-control w-full">
                <label for="comment">COMMENT</label>
                <textarea class="form-input md:mr-2"
                          v-model="form.comment"
                          name="comment"
                          id="comment"
                ></textarea>
                <p v-if="form.errors.has('comment')" v-text="form.errors.get('comment')"
                   class="text-sm text-danger p-0 m-0"></p>
            </div>
            <div v-if="form.people > 0" class="w-full p-4 mb-4 bg-grey text-white">
                <div class="flex items-center mb-4">
                    <span class="w-24">TOTAL</span>
                    <h4 class="tracking-wide" v-html="`€${price}`"></h4>
                </div>
                <div class="flex items-center font-bold">
                    <span class="w-24">DEPOSIT</span>
                    <h4 class="tracking-wide" v-html="`€${deposit}`"></h4>
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
            tours: Array,
            tour: Object,
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
                    tour: '',
                }),
                priceNow: 0,
                showSuccess: false,
                initialDate: null,
                maxNumber: 8,
            }
        },
        mounted: function () {
            this.form.people = this.$props.peopleNumber;
            this.form.dateInput = typeof this.$props.tripDate === 'string' ? new Date(this.$props.tripDate) : '';
            this.form.tour =
                this.$props.tour instanceof Object
                    ? this.$props.tour.id
                    : ''

            this.priceNow = this.tours[0].price_now;

            if (this.form.tour !== '') {
                this.priceNow = this.tours
                    .filter(tour => tour.id === this.form.tour)
                    .map(t => t.price_now);
            }
        },
        computed: {
            price: function () {
                return this.form.people * this.priceNow;
            },
            deposit: function () {
                return (this.price * 10 / 100).toFixed(0);
            },
        },
        methods: {
            changeInput: function (value) {
                this.dateInput = value.toISOString();
                this.form.errors.clear('dateInput');
            },
            handleFormSubmit: function () {
                this.form.submit(this.method, '/tour/request')
                    .then(data => this.showSuccess = true)
                    .catch(errors => {
                        console.log(errors);
                            //really dirty hack to rerender errors
                            this.form.name = this.form.name + ' ';
                            this.form.name = this.form.name.trim();
                        }
                    );
            },
            setTourPrice: function () {
                this.priceNow = this.tours
                    .filter(tour => tour.id === this.form.tour)
                    .map(t => t.price_now);
            }
        }
    }
</script>
