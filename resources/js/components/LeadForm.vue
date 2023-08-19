<template>
<div class="container w-50 bg-light my-5 p-4">
    <div>
        <h1 class="text-center">CryptoWorld Newsletter</h1>
    </div>
    <div>
        <form action="">
            <div class="form-group mt-2">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" placeholder="Enter first name" v-model="form.first_name" required>
                <span class="text-danger">{{ errors.first_name }}</span>
            </div>
            <div class="form-group mt-2">

                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" placeholder="Enter last name" v-model="form.last_name" required>
                <span class="text-danger">{{ errors.last_name }}</span>
            </div>
            <div class="form-group mt-2">

                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="enter email" v-model="form.email" required>
                <span class="text-danger">{{ errors.email }}</span>
            </div>
            <div class="form-group mt-2">

                <label class="form-label">Mobile Number</label>
                <div class="row">
                    <div class="col-2">
                        <select name="" id="" v-model="form.country_code" required class="form-select">
                            <option value="+91">+91</option>
                            <option value="+92">+92</option>
                            <option value="+93">+93</option>
                            <option value="+94">+94</option>
                        </select>

                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" name="email" placeholder="enter mobile" v-model="form.mobile" required pattern="[0-9]{10}">

                    </div>

                </div>
                <span class="text-danger">{{ errors.mobile }}</span>
            </div>
            <div class="form-group mt-2">

                <label class="form-label">Message</label>
                <textarea name="message" id="" cols="30" rows="5 " placeholder="enter message ..." class="form-control" v-model="form.message"></textarea>
                <span class="text-danger">{{ errors.message }}</span>
            </div>
            <div class="form-group mt-2">

                <button class="btn btn-primary" @click.prevent="submitForm">Submit</button>

            </div>
        </form>
    </div>
    <LoaderFile :isLoading="isLoading"></LoaderFile>
</div>
</template>

<script>
import LoaderFile from './LoaderFile.vue';
export default {
    components: {
        LoaderFile
    },
    data() {
        return {
            isLoading: false,
            form: {
                first_name: '',
                last_name: '',
                email: '',
                mobile: '',
                country_code: '',
                message: '',
            },
            errors: {}

        }
    },
    methods: {
        submitForm() {
            this.errors = {};

            if (!this.form.first_name) {
                this.errors.first_name = 'First name is required';
            }
            if (!this.form.last_name) {
                this.errors.last_name = 'Last name is required';
            }
            if (!this.form.email) {
                this.errors.email = 'Email is required';
            }
            if (!this.form.mobile) {
                this.errors.mobile = 'Mobile is required';
            } else if (!/^[0-9]{10}$/.test(this.form.mobile)) {
                this.errors.mobile = 'Mobile number must be 10 digits';
            }
            if (!this.form.message) {
                this.errors.message = 'Message is required';
            }
            if (Object.keys(this.errors).length > 0) {
                return;
            }
            this.isLoading = true;
            axios.post('/lead-form', this.form)
                .then(response => {
                    this.isLoading = false;
                    alert(response.data.message);
                    this.clearForm();
                })
                .catch(error => {
                    this.isLoading = false;
                    
                    alert(error.message);
                });
        },
        clearForm() {

            this.form.first_name = '';
            this.form.last_name = '';
            this.form.email = '';
            this.form.mobile = '';
            this.form.message = '';
        },
    }

}
</script>

<style>

</style>
