import VCalendar from 'v-calendar'
import Moment from 'moment'
import html2canvas from 'html2canvas'
import jsPDF from 'jspdf'

window.Vue = require('vue');

Vue.use(VCalendar);
Vue.use(Moment);

window.Moment = Moment;

let app = new Vue({
    el: '#app',

    mounted() {
        // this.preloader();
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

            loadingStatus: false,

            window: {
                width: 0,
                height: 0
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

            html2canvas(document.getElementById('app')).then(function(canvas) {
                var imgData = canvas.toDataURL('image/png');
                var imgWidth = 205; 
                var pageHeight = 295;  
                var imgHeight = canvas.height * imgWidth / canvas.width;
                var heightLeft = imgHeight;
                var doc = new jsPDF('p', 'mm');
                var position = that.window.width >= 992 ? 1 : 0;

                doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;

                while (heightLeft >= 0) {
                position = heightLeft - imgHeight;
                doc.addPage();
                doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;
                }
                doc.save( 'file.pdf');
            });
        }
    }
});