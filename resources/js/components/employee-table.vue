<template>
    <div>

        <div class="bg-white shadow-md rounded my-6">
            <table class="text-left w-full border-collapse">
                <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                <tr>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                        Firstname
                    </th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                        Lastname
                    </th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                        Email
                    </th>

                    <th class=" flex justify-end py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                        <button v-on:click="onCreate" class="py-2 px-4 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                            Create
                        </button>
                    </th>
                </tr>
                </thead>
                <tbody>

                <tr v-for="employer in employees" class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light">{{ employer.firstname }}</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{ employer.lastname }}</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{ employer.email }}</td>
                    <td class="py-4 px-6 border-b border-grey-light"></td>

                </tr>

                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    props: ['employees'],
    methods: {
        onCreate() {
            this.$emit('openModal')
        }
    }

}
</script>
