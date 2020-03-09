import VCalendar from 'v-calendar'
import Moment from 'moment'
import html2canvas from 'html2canvas'
import jsPDF from 'jspdf'
import modal from './components/Modal.vue'
import Axios from 'axios'

window.Vue = require('vue');

Vue.use(VCalendar);
Vue.use(Moment);

window.Moment = Moment;

let app = new Vue({
    el: '#app',

    components: {
        modal
    },

    mounted() {
        this.load();
        setTimeout(() => this.loadingStatus = true, 1900);
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

            navbar: {
                visible: true
            },

            footer: {
                visible: false
            },

            loadingStatus: false,

            window: {
                width: 0,
                height: 0
            },

            progressbar: {
                visible: false
            },

            modal: {
                customerInfo: false
            },

            success: {
                message: []
            },

            errors: {
                message: []
            },

            steps: [],

            reference: {
                stepIds: []
            }

            // customSettings: [
            //     {
            //         name: 'steps'
            //     }
            // ]
        }
    },

    created() {
        window.addEventListener('resize', this.handleResize);
        this.handleResize();
    },

    methods: {
        load() {
            let that = this;
            that.loadingStatus = false;

            Axios.get(`/fetch-customer-settings`)
            .then(response => {
                that.steps = response.data.steps;
                that.reference = response.data.reference;
                // that.loadingStatus = true;
            })
            .catch(e => {
                that.errors.message.push(e);
                that.loadingStatus = true;
            })
        },

        getStepHeaderClassName(stepId, type) {
            let className = '';

            switch (type) {
                case 'pure':
                    className = "step-" + stepId + "-pure w-15-p text-white p-0-important";
                    break;
                case 'light':
                    className = "step-" + stepId + "-light p-2 with-border-bottom with-border-left";
                    break;
                case 'right-pure':
                    className = "step-" + stepId + "-pure text-white w-35";
                    break;
                case 'right-light':
                    className = "step-" + stepId + "-light with-border-left w-65";
                    break;
            }

            return className;
        },

        getStepData(stepId, rowId, type) {
            let step = this.steps.find(step => step.step_id == stepId && step.row_id == rowId);

            return step[type];
        },

        handleResize() {
            this.window.width = window.innerWidth;
            this.window.height = window.innerHeight;
        },

        getTotalDays(number) {
            let start = Moment(this.assignment[number].start);
            let end = Moment(this.assignment[number].end);

            return Math.abs(end.diff(start, 'days'));
        },

        getCompletionDateByStep(rate, number) {
            let computedDays = Math.floor(this.getTotalDays(number) * rate);
            let completionDate = Moment(this.assignment[number].start).add(computedDays, 'days');

            return completionDate === null ? '' : Moment(completionDate).format('MM/DD/YYYY');
        },

        download() {
            let that = this;
            that.progressbar.visible = true;
            window.innerWidth = 1600;
            window.innerHeight = 2200;
            html2canvas(document.getElementById('app'), {
                width: 1600,
                height: 2200
            }).then(function(canvas) {
                var imgData = canvas.toDataURL('image/jpeg');
                var imgWidth = 210; 
                var pageHeight = 295;  
                var doc = new jsPDF('p', 'mm');
                var position = 2;

                doc.addImage(imgData, 'jpeg', 0, position, imgWidth, pageHeight);

                doc.save( 'my-assignment-calculator-' + Moment().unix() + '.pdf');
                // doc.output('dataurlnewwindow');
                // window.open(doc.output('bloburl'))
                that.progressbar.visible = false;
            });
        },

        showModal() {
            this.modal.customerInfo = true;
            this.footer.visible = true;
        },

        closeModal() {
            this.footer.visible = false;
            this.modal.customerInfo = false;
        },

        showSuccessResult(result) {
            this.download();
            this.success.message.push(result);
        }
    },

    watch: {
        'success.message': function(messages) {
            if(messages.length > 0) {
                setTimeout(() => this.success.message = [], 5000);
            }
        },
        'errors.message': function(messages) {
            if(messages.length > 0) {
                setTimeout(() => this.errors.message = [], 5000);
            }
        }
    },

    computed: {
        showFooter() {
            if(this.footer.visible) {
                return true;
            }
            return this.window.width > 991;
        },

        groupBySteps() {
            return groupBy(this.steps, step => step.step_id);
        }
    }
});