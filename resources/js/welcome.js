import VCalendar from 'v-calendar'
import Moment from 'moment'

window.Vue = require('vue');

Vue.use(VCalendar);
Vue.use(Moment);

window.Moment = Moment;

let app = new Vue({
    el: '#app',

    mounted() {
        this.preloader();
    },

    data() {
        return {
            assignment: {
                one: {
                    start: new Date(new Date().setHours(0,0,0,0)),
                    end: new Date(new Date().setHours(0,0,0,0))
                },
                two: {
                    start: new Date(new Date().setHours(0,0,0,0)),
                    end: new Date(new Date().setHours(0,0,0,0))
                },
                three: {
                    start: new Date(new Date().setHours(0,0,0,0)),
                    end: new Date(new Date().setHours(0,0,0,0))
                },
                four: {
                    start: new Date(new Date().setHours(0,0,0,0)),
                    end: new Date(new Date().setHours(0,0,0,0))
                }
            },

            loadingStatus: false
        }
    },

    methods: {
        preloader() {
            setTimeout(() => this.loadingStatus = true, 2500); 
        },

        getTotalDays(number) {
            let start = Moment(this.assignment[number].start);
            let end = Moment(this.assignment[number].end);

            return Math.abs(end.diff(start, 'days'));
        },

        getCompletionDateByStep(rate, number) {
            let computedDays = Math.floor(this.getTotalDays(number) * rate);
            let completionDate = Moment(this.assignment[number].start).add(computedDays, 'days');

            console.log('completionDate', completionDate);

            return completionDate === null ? '' : Moment(completionDate).format('MM/DD/YYYY');
        }
    },

    computed: {
        isLoading() {
            return this.loadingStatus;
        }
    }
});