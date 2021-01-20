import {ref} from 'vue';

export default function (url) {

    const state = ref({
        response: [],
        error: ''
    })

    fetch(url)
        .then(res => res.json)
        .then(json => state.response = json)
        .catch(err => state.error = err)

    return state;

}