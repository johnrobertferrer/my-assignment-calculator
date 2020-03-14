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
            customSettings: ['1'],
            font: {
                file: '',
                font_type: 2,
                font_safe: '',
                custom_font_name: '',
                old_custom_font: ''
            }
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
                that.steps = response.data.steps;
                that.oldCustomFonts = response.data.oldCustomFonts;
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
        },

        onFileChange(e){
            console.log(e.target.files[0]);
            this.font.file = e.target.files[0];
        },

        formSubmit() {
            let that = this;

            console.log(that.font);

            if (that.font.font_type == 2) {
                if(this.font.font_safe == "" || this.font.font_safe == null || this.font.font_safe == "null") {
                    that.message.errors.push("Please select default font.");
                    return false;
                }

                Axios.post('/custom-settings-natural-font-type', {
                    font_safe: that.font.font_safe,
                    font_type: that.font.font_type
                })
                .then(function (response) {
                    that.message.success.push(response.data.success);
                })
                .catch(function (error) {
                    that.message.errors.push(error);
                });
            } else if (that.font.font_type == 3) {
                if(this.font.old_custom_font == "") {
                    that.message.errors.push("Please select default font.");
                    return false;
                }

                Axios.post('/custom-settings-old-custom-font-type', {
                    old_custom_font: that.font.old_custom_font,
                    font_type: that.font.font_type
                })
                .then(function (response) {
                    that.message.success.push(response.data.success);
                })
                .catch(function (error) {
                    that.message.errors.push(error);
                });
            } else if (that.font.font_type == 1) {
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                console.log("custom font");

                if (this.font.file == "") {
                    that.message.errors.push("No selected custom font file. Please select first a valid custom font file.");
                }

                if(this.font.custom_font_name == "") {
                    that.message.errors.push("Custom font name is required.");
                    return false;
                }

                let formData = new FormData();

                formData.append('file', this.font.file);
                formData.append('name', this.font.custom_font_name);

                Axios.post('/formSubmit', formData, config)
                .then(function (response) {
                    that.message.success.push(response.data.success);
                    setTimeout(() => location.reload() , 1000);
                })
                .catch(function (error) {
                    if(error.request.response == '{"message":"The given data was invalid.","errors":{"name":["The name has already been taken."]}}') {
                        that.message.errors.push('Custom Font Name is already used. Please, choose another custom name.');
                    } else{
                        that.message.errors.push('Font file extension format must be (otf, ttf, eol, woff, woff2).');
                    }
                });
            }
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