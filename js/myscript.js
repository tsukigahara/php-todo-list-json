// basic url of API
const urlAPI = "http://localhost:8888/php-todo-list-json/backend-php/";

// vue app
const app = Vue.createApp({
    data() {
        return {
            // declare variables
            tasks: [],
            input: '',
        }
    },
    methods: {
        getAPI_data() {
            // get api data from url
            axios.get(urlAPI + "dataAPI.php")
                .then(response => {

                    // add api data to tasks[]
                    this.tasks = response.data.reminderData;
                    console.log(response.data.reminderData);
                }).catch(error => {
                    console.log(error);
                });
        },
        //add new task to tasks
        add() {
            this.tasks.push({ text: this.input, done: false });
            this.input = '';

        },
        //when clicked checkbox will remove checked task after 5s
        remove() {
            setTimeout(this.spliceFromArray, 5000);
            //non esiste una forma più compatta?
            //si poteva fare con v-if ?
        },
        spliceFromArray() {
            this.tasks.forEach((element, index) => {
                if (element.done === true) {
                    this.tasks.splice(index, 1);
                    console.log(index);
                }
            });
        },
    },
    beforeMount() {
        this.getAPI_data();
    },

})

app.mount('#app')