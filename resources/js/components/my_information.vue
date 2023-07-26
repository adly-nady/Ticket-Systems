<template>
    <div class="container" style="margin-top: 50px;">
        <div class="end_div">
            <div class="div_imgs">
                <img :src="users.image" style="width: 100%;height: 100%;" alt="" srcset="">
            </div>
            <div class="div_names" style="color:white">
                <h5> {{ users.name }} </h5>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border:1px solid black;height:40pc;box-shadow: 1px 1px 10px 0.4px #6f009e;">
                    <div class="card-header"
                        style="background-image: linear-gradient(#6f009e 10%,#0e101f 80%);text-align: center;color: white;">
                        My Information</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col col-8 m-auto">
                                <div class="form-floating" style="cursor: pointer;" @click="change_img(file)">
                                    <img class="img1" :src="data_form.image"
                                        style="width:150px;border:1px solid #6f009e;position: relative;left: 40%;top: 10%;padding:5px;box-shadow: 0px 0px 8px 0.3px #6f009e;border-radius: 10px;"
                                        alt="" srcset="">
                                </div>
                                <input type="file" class="file" @change="refile($event)" disabled
                                    style="display: none;">
                            </div>

                        </div>
                        <br>
                        <div class="row">

                            <div class="col col-4">

                                <div class="input-group mb-3">
                                    <input type="text" v-model="users.name" v-if="mode_of_programe != 2" disabled
                                        style="border: 1px solid #6f009e;" class="form-control"
                                        placeholder="Recipient's username" aria-label="Recipient's username"
                                        aria-describedby="basic-addon2">

                                    <input type="text" v-model="users.name" v-else style="border: 1px solid #6f009e;"
                                        class="form-control" placeholder="Recipient's username"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">

                                    <span class="input-group-text" id="basic-addon2"
                                        style="padding:5px;border: 1px solid #6f009e;" v-if="mode_of_programe == 2">
                                        <button class="btn btn-primary pre_adly" @click="save_new_name()">
                                            save
                                        </button> </span>
                                    <span class="input-group-text" id="basic-addon2"
                                        style="padding:5px;border: 1px solid #6f009e;" v-else>Full
                                        Name </span>
                                </div>
                            </div>
                            <div class="col col-4">

                                <div class="input-group mb-3">
                                    <input type="text" v-model="data_form.email" disabled
                                        style="border: 1px solid #6f009e;" class="form-control"
                                        placeholder="Recipient's username" aria-label="Recipient's username"
                                        aria-describedby="basic-addon2">
                                    <span class="input-group-text" id="basic-addon2"
                                        style="padding:5px;border: 1px solid #6f009e;"> email </span>
                                </div>

                            </div>
                            <div class="col col-4">

                                <div class="input-group mb-3">
                                    <input type="text" v-model="users.phone" v-if="mode_of_programe != 3" disabled
                                        style="border: 1px solid #6f009e;" class="form-control"
                                        placeholder="Recipient's username" aria-label="Recipient's username"
                                        aria-describedby="basic-addon2">
                                    <input type="text" v-model="users.phone" v-else style="border: 1px solid #6f009e;"
                                        class="form-control" placeholder="Recipient's username"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">

                                    <span class="input-group-text" id="basic-addon2"
                                        style="padding:5px;border: 1px solid #6f009e;" v-if="mode_of_programe == 3">
                                        <button class="btn btn-primary pre_adly" @click="save_new_phone()">
                                            save
                                        </button> </span>
                                    <span class="input-group-text" id="basic-addon2"
                                        style="padding:5px;border: 1px solid #6f009e;" v-else>
                                        phone number </span>
                                </div>

                            </div>

                        </div>
                        <br>

                        <div class="row">

                            <div class="row" v-if="mode_of_programe == 1">
                                <div class="col col-4">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" v-model="data_form.old_password"
                                            style="border: 1px solid #6f009e;" id="floatingInput"
                                            placeholder="name@example.com">
                                        <label for="floatingInput">Old password</label>
                                    </div>
                                </div>
                                <div class="col col-4">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" v-model="data_form.password1"
                                            style="border: 1px solid #6f009e;" @input="check_pass()" id="floatingInput"
                                            placeholder="name@example.com">
                                        <label for="floatingInput">Enter password</label>
                                    </div>
                                </div>
                                <div class="col col-4">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" v-model="data_form.password2"
                                            style="border: 1px solid #6f009e;" @input="check_pass()" id="floatingInput"
                                            placeholder="name@example.com">
                                        <label for="floatingInput">password confirmation</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col col-5 m-auto">
                                <div class="form-floating">
                                    <select class="form-select" disabled v-model="data_form.status"
                                        style="border: 1px solid #6f009e;" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <option value="" disabled>Select The Layout</option>
                                        <option value="User">User</option>
                                        <option value="Assistant">Assistant</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                    <label for="floatingSelect">Works with selects</label>
                                </div>
                            </div>

                        </div>
                        <br><br>

                        <div class="div_master1" style="margin-left:25%" v-if="mode_of_programe == 1">
                            <div class="div1" style="width:195px;"></div>
                            <div class="div2" style="width:195px;"></div>
                            <button class="btn_adly btn_ssol" v-if="can_move != 1" disabled
                                @click="mode_of_programe = 0" style="width:200px;color:red"> save
                                new password </button><!-- mode_of_programe = 0 -->
                            <button class="btn_adly btn_ssol" v-else @click="save_new_password()" style="width:200px;">
                                save new password </button>
                        </div>

                        <div class="div_master1" v-if="mode_of_programe != 1">
                            <div class="div1" style="width:145px;"></div>
                            <div class="div2" style="width:145px;"></div>
                            <button class="btn_adly btn_ssol" @click="mode_of_programe = 1" style="width:150px;"> Change
                                Password </button>
                        </div>
                        <div class="div_master1" v-if="mode_of_programe != 1">
                            <div class="div1"></div>
                            <div class="div2"></div>
                            <button class="btn_adly btn_ssol" @click="mode_of_programe = 2"> Change name </button>
                        </div>
                        <div class="div_master1" v-if="mode_of_programe != 1">
                            <div class="div1"></div>
                            <div class="div2"></div>
                            <button class="btn_adly btn_ssol" @click="mode_of_programe = 3"> change phone </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="covers_error">
            <div class="alert alert-danger alert1" id="alert1" style="width: 300px" role="alert">
            </div>
            <div class="alert alert-danger alert2" style="width: 300px" role="alert">
            </div>
            <div class="alert alert-danger alert3" style="width: 300px" role="alert">
            </div>
            <div class="alert alert-danger alert4" style="width: 300px" role="alert">
            </div>
            <div class="alert alert-danger alert5" style="width: 300px" role="alert">
            </div>
            <div class="alert alert-danger alert6" style="width: 300px" role="alert">
            </div>
            <div class="alert alert-success alert7" style="width: 300px" role="alert">
                <span style="font-size:20px">✅</span><span> success </span>
            </div>
        </div>

    </div>
</template>

<script>
import $ from "jquery";
export default {
    props: ['user'],
    mounted() {
        console.log('Component mounted.');
        axios.post('./get_me').then((res) => { this.users = res.data; });
    },
    data() {
        return {
            users: {},
            data_form: this.user,
            can_move: 0,
            mode_of_programe: 0,
            new_data: "",
        }
    },
    methods: {
        save_new_password() {
            axios.post('./save_new_password', { old_password: this.users.old_password, new_password: this.users.password1 }).then((res) => {
                if (res.data.done == "done") {
                    $('.alert7').fadeIn().delay(2000).fadeOut();
                    this.mode_of_programe = 0;
                    axios.post('./get_me').then((res) => { this.users = res.data; });
                } else {
                    $('.alert1').text(res.data.error1).fadeIn().delay(2000).fadeOut();
                    $('.alert1').text(res.data.error2).fadeIn().delay(2500).fadeOut();
                }
            });
        },
        save_new_name() {
            axios.post('./save_new_name', { data: this.users.name }).then((res) => {
                if (res.data.done == "done") {
                    $('.alert7').fadeIn().delay(2000).fadeOut();
                    this.mode_of_programe = 0;
                    axios.post('./get_me').then((res) => { this.users = res.data; });
                } else {
                    $('.alert1').text(res.data.error).fadeIn().delay(2000).fadeOut();
                }
            });
        },
        save_new_phone() {
            axios.post('./save_new_phone', { data: this.users.phone }).then((res) => {
                if (res.data.done == "done") {
                    $('.alert7').fadeIn().delay(2000).fadeOut();
                    axios.post('./get_me').then((res) => { this.users = res.data; });
                    this.mode_of_programe = 0;
                } else {
                    $('.alert1').text(res.data.error).fadeIn().delay(2000).fadeOut();
                }
            });
        },
        check_pass() {
            if (this.data_form.password1 == this.data_form.password2 && this.data_form.old_password != null)
                this.can_move = 1;
            else
                this.can_move = 0;
        },
        refile(event) {
            this.data_form.img = URL.createObjectURL(event.target.files[0]);
            this.data_form.file = event.target.files[0];
            $('.img1').css({
                'width': '150px',
                'border': '1px solid #6f009e',
                'position': 'relative',
                'left': '40%',
                'top': '10%',
                'padding': '3px',
                'border-radius': '10px'
            });
        },
        change_img() {
            $('.file').click();
        },
        save() {
            let data = new FormData();
            data.append('file', this.data_form.file);
            data.append('name', this.data_form.name);
            data.append('email', this.data_form.email);
            data.append('phone', this.data_form.phone);
            data.append('old_password', this.data_form.old_password);
            data.append('password', this.data_form.password1);
            data.append('department', this.data_form.department);
            axios.post('/update_new_person', data).then((res) => {
                if (res.data.done == "done")
                    alert("Done");
                else
                    alert("error");
            });
        }
    }
}
</script>
<!--


                        <div class="row">
                            <div class="col col-4">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" v-model="data_form.old_password"
                                        style="border: 1px solid #6f009e;" @input="check_pass()" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Old password</label>
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" v-model="data_form.password1"
                                        style="border: 1px solid #6f009e;" @input="check_pass()" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Enter password</label>
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" v-model="data_form.password2"
                                        style="border: 1px solid #6f009e;" @input="check_pass()" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">password confirmation</label>
                                </div>
                            </div>
                        </div>

 -->
