<template>
    <div class="flex flex-col">

        <label class="text-gray-600 font-light">Company Name</label>
        <input v-model="company_name" type='text'  autocomplete="off" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" />




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
            company_name: '',
        }
    },
    computed: {
        companyNameValid() {
            return this.company_name;
        },
        validForm() {
            return this.companyNameValid;
        }
    },
    methods: {
        close() {
            this.$emit('close')
        },
        submit() {
            this.$emit('submit', {company_name: this.company_name} )
        }
    }
}
</script>
