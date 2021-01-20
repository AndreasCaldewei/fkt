<template>
    <div class="w-full md:w-2/3 mx-auto">
        <CompanyTable v-on:openModal="createModal = true" v-bind:companies="companies"></CompanyTable>

        <Modal v-if="createModal">
            <CompanyForm v-on:submit="onCompanySubmit($event)" v-on:close="createModal = false"></CompanyForm>
        </Modal>
    </div>
</template>
<script>
import CompanyTable from '../components/company-table'
import CompanyForm from '../components/company-form'

import Modal from "../components/modal";

const default_layout = "default";


export default {
    components: {Modal, CompanyTable, CompanyForm},
    data() {
        return {
            selectedCompany: null,
            employees: [],
            companies: [],
            createModal: false
        }
    },
    methods: {
        getCompanies: function () {
            fetch('/api/companies')
                .then(res => res.json())
                .then(json => {
                    console.log(json);
                    this.companies = json;
                })
        },
        createCompany(company) {
            return fetch('/api/companies', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(company)
            })
        },
        onCompanySubmit($event) {
            this.createCompany($event)
                .then(() => this.getCompanies())
            this.createModal = false;

        },
    },
    mounted() {
        this.getCompanies();
    },
    metaInfo: {
        title: 'Companies',

    }
};
</script>
