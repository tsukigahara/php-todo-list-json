// basic url of API
const urlAPI = "http://localhost:8888/php-todo-list-json/backend-php/";

// vue app
const app = Vue.createApp({
    data() {
        return {
            // declare variables
            reminderList: [],
            input: '',
        }
    },
    methods: {
        getAPI_data() {
            // get reminderDataAPI data from url
            axios.get(urlAPI + "reminderDataAPI.php")
                .then(response => {

                    // add reminderDataAPI data to reminderList[]
                    this.reminderList = response.data;
                    console.log(response.data);
                }).catch(error => {
                    console.log(error);
                });
        },
        //add new task to reminderList
        addRemind() {

            // set parameters to be send to API with axios.get (example: http://example.php?input=new_remind_text)
            const params = {
                params: {
                    'input': this.input,
                }
            };

            // request addRemind API with parameters (example: http://example.php?input=new_remind_text)
            axios.get(urlAPI + "addRemindAPI.php", params)
                .then(() => {

                    // re-request reminderDataAPI data (with new remind)
                    this.getAPI_data();
                }
                ).catch(error => {
                    console.log(error);
                });

            // reset input value
            this.input = "";
        },
        ////////////////////////////////////TEST///////////////////////////////////////////////
        // removeRemind(index) {
        //     // index indicates which task is checked by checkbox

        //     // set parameters to be send to API with axios.get
        //     const params = {
        //         params: {
        //             'index': index,
        //         }
        //     };
        //     // request removeRemind API with parameters 
        //     axios.get(urlAPI + "removeRemindAPI.php", params)
        //         .then(() => {
        //             // re-request reminderDataAPI data (with removed remind)
        //             this.getAPI_data();
        //         }
        //         ).catch(error => {
        //             console.log(error);
        //         });
        // },
    },
    beforeMount() {
        this.getAPI_data();
    },

})

app.mount('#app')