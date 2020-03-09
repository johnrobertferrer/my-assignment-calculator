import Moment from 'moment'
import Axios from 'axios';

window.Vue = require('vue');

Vue.use(Moment);

window.Moment = Moment;

let app = new Vue({
    el: '#app',

    data() {
        return {
            loadingStatus: true,
            message: {
                success: [],
                errors: []
            },
            steps: [],
            customSettings: ['1']
        }
    },

    mounted() {
        this.load();
    },

    methods: {
        save() {
            this.update();
        },

        update() {
            let that = this;
            that.loadingStatus = false;

            Axios.post(`/update-admin-settings`, {
                'steps': that.steps,
                'customSettings': that.customSettings
            })
            .then(response => {
                that.message.success.push(response.data);
                that.loadingStatus = true;
                that.load();
            })
            .catch(e => {
                that.message.errors.push(e);
                that.loadingStatus = true;
            })
        },

        load() {
            let that = this;
            that.loadingStatus = false;

            Axios.get(`/fetch-admin-settings`)
            .then(response => {
                that.steps = response.data;
                that.loadingStatus = true;
            })
            .catch(e => {
                that.message.errors.push(e);
                that.loadingStatus = true;
            })
        },

        showLineBreak(step) {
            return step.step_id != 1 && step.row_id == 1;
        },

        setPlaceholderText(step, type) {
            return "Enter " + type + " for Step #" + step.step_id + " and Row #" + step.row_id;
        }
    },

    watch: {
        'message.success': function(messages) {
            if(messages.length > 0) {
                setTimeout(() => this.message.success = [], 5000);
            }
        },
        'message.errors': function(messages) {
            if(messages.length > 0) {
                setTimeout(() => this.message.errors = [], 5000);
            }
        }
    },
});