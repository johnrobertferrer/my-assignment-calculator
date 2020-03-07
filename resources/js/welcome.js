import VCalendar from 'v-calendar'
import Moment from 'moment'
import html2canvas from 'html2canvas'
import jsPDF from 'jspdf'
import modal from './components/Modal.vue'

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
        setTimeout(() => this.loadingStatus = true, 2500);
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
            }
        }
    },

    created() {
        window.addEventListener('resize', this.handleResize);
        this.handleResize();
    },

    methods: {
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
                var position = 0;

                doc.addImage(imgData, 'jpeg', 0, position, imgWidth, pageHeight);

                // doc.save( 'my-assignment-calculator-' + Moment().unix() + '.pdf');
                // doc.output('dataurlnewwindow');
                window.open(doc.output('bloburl'))
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
        }
    },

    computed: {
        showFooter() {
            if(this.footer.visible) {
                return true;
            }
            return this.window.width > 991;
        }
    }
});