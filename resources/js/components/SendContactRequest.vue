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
                <label for="tour">DATE</label>
                <datepicker
                    :placeholder="'SELECT DATE'"
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
                <input class="form-input md:mr-2 relative"
                       type="text"
                       name="tour"
                       id="tour"
                       placeholder="Select tour"
                       :value="this.selectedTour !== null ? this.selectedTour.title : ''"
                       @click="showSelect = !showSelect"
                >
                <p v-if="form.errors.has('tour')" v-text="form.errors.get('tour')" class="text-sm text-danger p-0 m-0"></p>
                <input class="hidden"
                       type="number"
                       name="tourId"
                       id="tourId"
                       placeholder="Select tour"
                       v-model="this.form.tour"
                >
                <div v-if="showSelect" id="tourList" @click="handleTourSelect" class="absolute pin-t pin-x mt-8">
                    <div
                        class="w-full bg-brand-dark py-2 px-5 border-b-2 border-white text-white text-xl hover:bg-brand-light cursor-pointer"
                         v-for="tour in this.tours" :value="tour.id" @click="showSelect = !showSelect">{{ tour.title }}
                    </div>
                </div>
            </div>
            <div class="form-control w-full mb-10">
                <label for="people" :class="{'has-content' : this.form.people}">PEOPLE</label>
                <input class="form-input md:mr-2"
                       v-model="form.people"
                       type="number"
                       name="people"
                       id="people"
                       placeholder="Number of people for trip"
                       :max="this.maxNumber"
                >
                <p v-text="form.errors.get('people')" class="text-sm text-danger p-0 m-0"></p>
            </div>
            <div class="form-control w-full">
                <label for="name" :class="{'has-content' : this.form.name}">NAME</label>
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
                <label for="email" :class="{'has-content' : this.form.email}">EMAIL</label>
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
            tours: Array,
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
                showSuccess: false,
                initialDate: null,
                maxNumber: 8,
                showSelect: false,
                selectedTour: null
            }
        },
        mounted: function () {
            this.form.people = this.$props.peopleNumber;
            this.form.dateInput = this.tripDate instanceof Date ? new Date(this.tripDate) : '';
        },
        computed: {
            price: function () {
                return this.form.people * 100;
            },
            deposit: function () {
                return this.price * 10 / 100;
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
            handleTourSelect: function (event) {
                this.selectedTour = this.tours.find(t => t.id = event.target.getAttribute('value'));
                this.form.tour = this.selectedTour.id;
            }
        }
    }
</script>
