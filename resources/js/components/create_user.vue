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
                        Create User </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col col-8 m-auto">
                                <div class="form-floating" style="cursor: pointer;" @click="change_img(file)">
                                    <img class="img1" :src="data_form.img"
                                        style="width:150px;border:1px solid #6f009e;position: relative;left: 40%;top: 10%;padding:5px;box-shadow: 0px 0px 8px 0.3px #6f009e;border-radius: 10px;"
                                        alt="" srcset="">
                                </div>
                                <input type="file" class="file" @change="refile($event)" style="display: none;">
                            </div>

                        </div>
                        <br>
                        <div class="row">

                            <div class="col col-4">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" v-model="data_form.name"
                                        style="border: 1px solid #6f009e;" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Full Name</label>
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" v-model="data_form.email"
                                        style="border: 1px solid #6f009e;" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" v-model="data_form.phone"
                                        style="border: 1px solid #6f009e;" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">mobile phone</label>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">

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
                            <div class="col col-4">
                                <div class="form-floating">
                                    <select class="form-select" v-model="data_form.Layout"
                                        style="border: 1px solid #6f009e;" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <option value="" disabled>Select The Layout</option>
                                        <option value="User">User</option>
                                        <option value="Assistant">Assistant</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                    <label for="floatingSelect">Layout</label>
                                </div>
                            </div>

                        </div>
                        <br><br>
                        <div class="row">
                            <button v-if="can_move == 0" disabled class="btn m-auto"
                                style="background-image: linear-gradient(to right, rgb(111, 0, 158) , rgb(14, 16, 31)); width: 150px;color:white;">
                                Save </button>
                            <button v-else class="btn m-auto" @click="save()"
                                style="background-image: linear-gradient(to right, rgb(111, 0, 158) , rgb(14, 16, 31)); width: 150px;color:white;">
                                Save </button>
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
            data_form: { department: "", img: "https://fatimachurchperampally.in/wp-content/uploads/2021/06/men.png" },
            can_move: 0,
            dos: 0
        }
    },
    methods: {
        check_pass() {
            if (this.data_form.password1 == this.data_form.password2)
                this.can_move = 1;
            else
                this.can_move = 0;
        },
        refile(event) {
            this.dos = 1;
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
            if (this.dos == 1) { data.append('file', this.data_form.file); }

            data.append('name', this.data_form.name);
            data.append('email', this.data_form.email);
            data.append('phone', this.data_form.phone);
            data.append('password', this.data_form.password1);
            data.append('Layout', this.data_form.Layout);
            axios.post('/save_new_person', data).then((res) => {
                if (res.data.done == "done") {
                    $('.alert7').fadeIn().delay(2000).fadeOut();
                    this.dos = 0;
                    this.data_form = { department: "", img: "https://fatimachurchperampally.in/wp-content/uploads/2021/06/men.png" };
                } else {
                    if (res.data.error_name)
                        $('.alert2').text(res.data.error_name).fadeIn().delay(2500).fadeOut();
                    if (res.data.error_email)
                        $('.alert3').text(res.data.error_email).fadeIn().delay(3000).fadeOut();
                    if (res.data.error_phone)
                        $('.alert4').text(res.data.error_phone).fadeIn().delay(3500).fadeOut();
                    if (res.data.error_password)
                        $('.alert5').text(res.data.error_password).fadeIn().delay(4000).fadeOut();
                    if (res.data.other_error)
                        $('.alert6').text(res.data.other_error).fadeIn().delay(4000).fadeOut();
                }
            });
        }
    }
}
</script>
