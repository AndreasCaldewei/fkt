<template>
    <div>

        <div class="w-full md:w-2/3 mx-auto">

            <EmployeeTable v-on:openModal="createModal = true" v-bind:employees="employees"></EmployeeTable>
        </div>


        <Modal v-if="createModal">

            <template>
                <EmployeeForm v-on:submit="onEmployeeSubmit" v-on:created="onEmployeeCreate" v-on:close="closeModal"></EmployeeForm>
            </template>


        </Modal>


    </div>
</template>


<script>
import Modal from "../components/modal";
import EmployeeForm from "../components/employee-form";
import EmployeeTable from "../components/employee-table";

export default {
    components: {EmployeeTable, EmployeeForm, Modal},
    data: function () {
        return {
            id: null,
            params: {},
            employees: [],
            createModal: false
        }
    },
    methods: {
        getEmployees: function (company_id) {
            console.log(company_id)
            fetch(`/api/employees?company_id=${company_id}`)
                .then(res => res.json())
                .then(json => {
                    this.employees = json;
                })
        },
        createEmployee(employee) {
            return fetch('/api/employees', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(employee)
            })
        },
        onEmployeeCreate() {
            this.getEmployees(this.id)
            this.createModal = false;
        },
        closeModal() {
            this.createModal = false;
        },
        onEmployeeSubmit($event) {
            this.createEmployee($event)
                .then( () => this.getEmployees(this.id))
            this.createModal = false;
        }
    },
    created() {
        this.id = this.$route.params.id;
        console.log(this.id)
        this.getEmployees(this.id)
    },
    metaInfo: {
        title: 'Employees',

    }
}
</script>
