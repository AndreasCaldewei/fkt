<template>
    <div>
        {{ message }}
        <button>Hello World</button>
        Data:
        {{employees}}
        {{companys}}

    </div>

</template>
<script>
const default_layout = "default";


export default {
    data() {
        return {
            message: 'HelloWOrld',
            employees: [],
            companys: []
        }
    },
    methods: {
        getEmployees: function () {
            fetch('/api/employees')
                .then(res => res.json())
                .then(json => {
                    console.log(json);
                    this.employees = json;
                })
        },
        getCompnanys: function () {
            fetch('/api/companys')
                .then(res => res.json())
                .then(json => {
                    console.log(json);
                    this.companys = json;
                })
        }
    },
    mounted() {
        this.getEmployees();
        this.getCompnanys();
    },
};
</script>
