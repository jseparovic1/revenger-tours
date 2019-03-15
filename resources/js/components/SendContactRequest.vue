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
            method="post"
            @submit.prevent="handleFormSubmit"
            @keyup="form.errors.clear($event.target.name)"
        >
            <div class="form-control w-full">
                <label for="name" :class="{'has-content' : form.name}">NAME</label>
                <input class="form-input md:mr-2"
                       v-model="form.name"
                       type="text"
                       name="name"
                       id="name"
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
                />
                <p v-if="form.errors.has('email')" v-text="form.errors.get('email')"
                   class="text-sm text-danger p-0 m-0"></p>
            </div>
            <div class="form-control w-full">
                <label for="email" :class="{'has-content' : form.subject}">SUBJECT</label>
                <input class="form-input md:mr-2"
                       v-model="form.subject"
                       type="text"
                       name="subject"
                       id="subject"
                       placeholder="Message subject (Private tour, transfer, question...)"
                />
                <p v-if="form.errors.has('subject')" v-text="form.errors.get('subject')"
                   class="text-sm text-danger p-0 m-0"></p>
            </div>
            <div class="form-control w-full">
                <label for="message">MESSAGE</label>
                <textarea class="form-input md:mr-2"
                          v-model="form.message"
                          name="message"
                          id="message"
                ></textarea>
                <p v-if="form.errors.has('message')" v-text="form.errors.get('message')" class="text-sm text-danger p-0 m-0"></p>
            </div>
            <button
                class="w-full bg-brand hover:bg-brand-dark text-white uppercase text-lg mx-auto p-4 rounded font-bold tracking-tight"
                type="submit">SEND
            </button>
        </form>
    </div>
</template>

<script>
    import Form from "../core/Form";

    export default {
        props: {
            action: String,
            privateTour: String,
        },
        data: function () {
            return {
                form: new Form({
                    email: '',
                    name: '',
                    message: '',
                    subject: '',
                }),
                showSuccess: false,
            }
        },
        mounted: function () {
            this.form.subject = this.$props.privateTour;
        },
        methods: {
            handleFormSubmit: function () {
                this.form.submit('post', this.action)
                    .then(data => this.showSuccess = true)
                    .catch(errors => {
                            console.log(errors);
                            //really dirty hack to rerender errors
                            this.form.name = this.form.name + ' ';
                            this.form.name = this.form.name.trim();
                        }
                    );
            },
        }
    }
</script>
