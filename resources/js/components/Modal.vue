<script>
  export default {
    name: 'modal',
    data() {
      return {
        firstname: '',
        lastname: '',
        email: '',
        errors: []
      }
    },
    methods: {
      close() {
        this.$emit('close');
      },
      resetData() {
        this.firstname = '';
        this.lastname = '';
        this.email = '';
      },
      validate() {
        this.errors = [];

        let validator = true;

        if(this.firstname == '') {
          this.errors.push('First name is required.');
          validator = false;
        }

        if(this.lastname == '') {
          this.errors.push('Last name is required.');
          validator = false;
        }

        if(this.email == '') {
          this.errors.push('Email is required.');
          validator = false;
        }

        let regex = /\S+@\S+\.\S+/;

        if(!regex.test(this.email)) {
          this.errors.push('Email is invalid. Please provide valid email address.');
          validator = false;
        }

        return validator;
      },
      submitForm() {
        if(!this.validate()) {
          return false;
        }

        axios.post(`/store-customer-info`, {
          firstname: this.firstname,
          lastname: this.lastname,
          email: this.email
        })
        .then(response => {
          this.resetData();
          this.close();

          let data = "First name: " + response.data.firstname + ", Last name: " + response.data.lastname + ", Email: " + response.data.email;
          this.$emit('submitted', data);
        })
        .catch(e => {
          let that = this;
          Object.entries(e.response.data.errors).forEach(entry => {
            that.errors.push(entry[1][0]);
          });
        })
      }
    },
    watch: {
      'errors': function(errors) {
        if(errors.length > 0) {
          setTimeout(() => this.errors = [], 3000);
        }
      }
    }
  };
</script>
<template>
  <transition name="modal-fade">
    <div class="modal-backdrop">
      <div class="modal"
        role="dialog"
        aria-labelledby="modalTitle"
        aria-describedby="modalDescription"
      >
        <section
          class="modal-body"
          id="modalDescription"
        >
          <slot name="body">
            <form id="contact-form" role="form" ref="form" onsubmit="event.preventDefault();">
              <div class="controls">
                  <div class="row">
                      <div class="col-12">
                        <div v-for="error in errors" class="alert alert-danger" role="alert">
                          {{ error }}
                        </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="form_name">First name *</label>
                              <input v-model="firstname" id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                              <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="form_lastname">Last name *</label>
                              <input v-model="lastname" id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                              <div class="help-block with-errors"></div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="form_email">Email *</label>
                              <input v-model="email" id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                              <div class="help-block with-errors"></div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-12 col-12 mt-2">
                          <input type="submit" class="btn btn-success btn-block btn-send" @click="submitForm" value="Export as PDF">
                      </div>
                      <div class="col-lg-12 col-12 mt-2">
                          <input type="submit" class="btn btn-danger btn-block" value="Close" @click="close">
                      </div>
                  </div>
              </div>
            </form>
          </slot>
        </section>
      </div>
    </div>
  </transition>
</template>
<style>
  .modal-backdrop {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .modal {
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
    width: auto;
    height: auto;
    left: auto;
    top: auto;
  }

  .modal-header,
  .modal-footer {
    padding: 15px;
    display: flex;
  }

  .modal-header {
    border-bottom: 1px solid #eeeeee;
    color: #4AAE9B;
    justify-content: space-between;
  }

  .modal-footer {
    border-top: 1px solid #eeeeee;
    justify-content: flex-end;
  }

  .modal-body {
    position: relative;
    padding: 20px 10px;
  }

  .btn-close {
    border: none;
    font-size: 20px;
    padding: 20px;
    cursor: pointer;
    font-weight: bold;
    color: #4AAE9B;
    background: transparent;
  }

  .btn-green {
    color: white;
    background: #4AAE9B;
    border: 1px solid #4AAE9B;
    border-radius: 2px;
  }

  .row {
    margin: 0;
  }
</style>