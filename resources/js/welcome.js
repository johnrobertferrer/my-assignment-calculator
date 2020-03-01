import VCalendar from 'v-calendar'
import Moment from 'moment'

window.Vue = require('vue');

Vue.use(VCalendar);
Vue.use(Moment);

window.Moment = Moment;

let app = new Vue({
    el: '#app',

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
            }
        }
    },

    methods: {
        getTotalDays(number) {
            let start = Moment(this.assignment[number].start);
            let end = Moment(this.assignment[number].end);

            return end.diff(start, 'days');
        }
    },

    computed: {
    }
});