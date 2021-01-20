<template>
    <div class="flex flex-col">



        <label class="text-gray-600 font-light">Firstname</label>
        <input v-model="firstname" type='text'  autocomplete="off" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" />

        <label class="text-gray-600 font-light">Lastname</label>
        <input v-model="lastname" type='text' autocomplete="off" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" />

        <label class="text-gray-600 font-light">Email</label>
        <input v-model="email" type='text' autocomplete="off" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" />


        <div class="flex justify-end">
            <button v-on:click="close" type="button"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                Cancel
            </button>
            <button v-on:click="submit" type="button" v-bind:disabled="!validForm"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm disabled:bg-gray-200">
                Create
            </button>

        </div>


    </div>

</template>


<script>
export default {
    data() {
        return {
            firstname: '',
            lastname: '',
            email: '',
            company_id: null
        }
    },
    computed: {
        firstnameValid() {
            return this.firstname;
        },
        lastnameValid() {
            return this.lastname;
        },
        emailValid() {
            return this.email.match(/\S+@\S+\.\S+/)
        },
        validForm() {
            return this.firstnameValid && this.emailValid && this.lastnameValid;
        }
    },
    mounted() {
        this.company_id = this.$route.params.id;
    },
    methods: {

        close() {
            this.$emit('close')
        },
        submit() {
            this.$emit('submit', {
                company_id: this.company_id,
                email: this.email,
                firstname: this.firstname,
                lastname: this.lastname
            })
        }
    }
}
</script>
