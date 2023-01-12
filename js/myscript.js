// const tasks = [
//     { text: 'Fare i compiti', done: false }, 
//     { text: 'Fare la spesa', done: true }, 
//     { text: 'Fare il bucato', done: false }
// ];

const app = Vue.createApp({
    data() {
        return {
            tasks: [
                { text: 'Fare i compiti', done: false },
                { text: 'Fare la spesa', done: false },
                { text: 'Fare il bucato', done: false }
            ],
            input: '',
        }
    },
    methods: {
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
        }

    },
})

app.mount('#app')