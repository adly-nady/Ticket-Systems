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
                <div class="card" style="border:1px solid black;height:40pc;box-shadow: 1px 1px 20px 0.35px #6f009e;">
                    <div class="card-header"
                        style="background-image: linear-gradient(#6f009e 10%,#0e101f 80%);text-align: center;color: white;">
                        list all tickets</div>

                    <div class="card-body">
                        <table class="table table-dark table-stripe">
                            <thead style="text-align: center;color: white;">
                                <tr>
                                    <th style="text-align:center;"> Aassign </th>
                                    <th style="text-align:center;"> Add Reply </th>
                                    <th style="text-align:center;"> dispaly Ticket </th>
                                    <th style="text-align:center;"> Aassign </th>
                                    <th style="text-align:center;"> Owner Ticket </th>
                                    <th style="text-align:center;"> The category </th>
                                    <th style="text-align:center;"> The Case </th>
                                    <th style="text-align:center;"> Date </th>
                                    <th style="text-align:center;"> Image </th>
                                    <th style="text-align:center;"> Content </th>
                                    <th style="text-align:center;"> Subject </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="background-color: #0e101f;text-align: center;color: white;"
                                    v-for="item in data_list" :key="item">
                                    <td style="text-align:center;color:white"> <button class="btn_adly gre_adly"
                                            @click="show_Aassign(item)"
                                            style="background-image: linear-gradient(to right top,  rgb(10, 10, 25), #3ded97); width: 80px;color:white;">
                                            Aassign </button> </td>
                                    <td style="text-align:center;color:white"> <button class="btn_adly blu_adly"
                                            @click="show_Reply(item)"
                                            style="background-image: linear-gradient(to right top,  rgb(10, 10, 25), #41dfd0); width: 80px;color:white;">
                                            Reply </button>
                                    </td>
                                    <td style="text-align:center;color:white"> <button class="btn_adly prewhite_adly"
                                            @click="show_Display(item.id)"
                                            style="background-image: linear-gradient(to right top,  rgb(10, 10, 25), #7d2cf9); width: 80px;color:white;">
                                            Display </button> </td>
                                    <td style="text-align:center;color:white" v-if="item.re_id != null">{{
                                            item.name_assign
                                    }}
                                    </td>
                                    <td style="text-align:center;color:white" v-else> Not set yet </td>
                                    <td style="text-align:center;color:white">{{ item.name_user }}</td>
                                    <td style="text-align:center;color:white" v-if="item.type_of_category != null">
                                        {{ item.name_category }}
                                    </td>
                                    <td style="text-align:center;color:white" v-else> No Category </td>
                                    <td style="text-align:center;color:white" v-if="item.case_ticket != null">
                                        <span :class="'span_' + item.case_ticket" v-if="item.case_ticket == 'Open'">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-unlock" viewBox="0 0 16 16">
                                                <path
                                                    d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2zM3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H3z" />
                                            </svg>
                                        </span>
                                        <span :class="'span_' + item.case_ticket" v-if="item.case_ticket == 'Wait'">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                                                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                                                <path
                                                    d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                                            </svg>
                                        </span>
                                        <span :class="'span_' + item.case_ticket" v-if="item.case_ticket == 'Close'">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z" />
                                            </svg>
                                        </span>
                                    </td>
                                    <td style="text-align:center;color:white" v-else> No Case </td>
                                    <td style="text-align:center;color:white">{{ item.date }}</td>
                                    <td style="text-align:center;color:white" v-if="item.image != null"> <svg
                                            xmlns="http://www.w3.org/2000/svg" style="color:green" width="26"
                                            height="26" fill="currentColor" class="bi bi-check-square"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                            <path
                                                d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                                        </svg> </td>
                                    <td style="text-align:center;color:white" v-else><svg
                                            xmlns="http://www.w3.org/2000/svg" style="color:red" width="26" height="26"
                                            fill="currentColor" class="bi bi-dash-square" viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </td>
                                    <td class="text-truncate" style="text-align:center;color:white">{{ item.content }}
                                    </td>
                                    <td style="text-align:center;color:white">{{ item.subject }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="cover_temp">

            <div class="col-md-3 m-auto" v-if="case_of_display == 0">
                <div class="card"
                    style="border:1px solid black;height:40pc;box-shadow: 1px 1px 20px 0.35px #6f009e;margin-top: 12%;border-radius: 20px;">
                    <div class="card-header"
                        style="background-image: linear-gradient(#6f009e 10%,#0e101f 80%);text-align: center;color: white;border-top-left-radius: 19px;border-top-right-radius: 19px;">
                        list all Users

                        <button class="btn_adly red_adly" @click="exit()"
                            style="background-image: linear-gradient(to right top,  rgb(10, 10, 25), red); width: 50px;color:white;">
                            X
                        </button>

                    </div>

                    <div class="card-body">

                        <button class="btn_adly gre_adly" @click="Aassign()"
                            style="background-image: linear-gradient(to right top,  rgb(10, 10, 25), #3ded97); width: 115px;color:white;">
                            Aassign
                        </button>
                        <hr>

                        <div class="input-group mb-3" v-for="item in list_users" :key="item.id"
                            style="border:1px solid gray;border-radius: 15px;overflow: hidden;margin: 5px;">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="radio" v-model="ass_user" :value="item.id"
                                    aria-label="Checkbox for following text input">
                            </div>
                            <label style="width:100px;display: block;margin-left: 10px;"> {{ item.name }} </label>
                        </div>

                    </div>

                </div>
            </div>


            <div class="col-md-4 m-auto" v-if="case_of_display == 1">
                <div class="card"
                    style="border:1px solid black;height:25pc;box-shadow: 1px 1px 20px 0.35px #6f009e;margin-top: 12%;border-radius: 20px;">
                    <div class="card-header"
                        style="background-image: linear-gradient(#6f009e 10%,#0e101f 80%);text-align: center;color: white;border-top-left-radius: 19px;border-top-right-radius: 19px;">
                        Reply a ticket

                        <button class="btn_adly red_adly" @click="exit()"
                            style="background-image: linear-gradient(to right top,  rgb(10, 10, 25), red); width: 50px;color:white;">
                            X
                        </button>

                    </div>

                    <div class="card-body">
                        <table class="table table-dark table-bordered" style="text-align:center">
                            <thead>
                                <tr>
                                    <th colspan="3"> Reply to Ticket </th>
                                </tr>
                                <tr>
                                    <th>id</th>
                                    <th>Subject</th>
                                    <th>owner</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ reply_data.id }}</td>
                                    <td>{{ reply_data.subject }}</td>
                                    <td>{{ reply_data.name_user }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-floating">
                            <input type="text" v-model="reply_data.new_reply_content" class="form-control"
                                id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Enter New Category</label>
                        </div>
                        <br>
                        <button class="btn_adly gre_adly" @click="save_reply()"
                            style="background-image: linear-gradient(to right top,  rgb(10, 10, 25), #41dfd0); width: 165px;color:white;margin-left: 30%;">
                            Save New Category
                        </button>

                    </div>

                </div>
            </div>



            <div class="col-md-6 m-auto" v-if="case_of_display == 2">
                <div class="card"
                    style="border:1px solid black;height:44pc;box-shadow: 1px 1px 20px 0.35px #6f009e;margin-top: 4%;border-radius: 20px;">
                    <div class="card-header"
                        style="background-image: linear-gradient(#6f009e 10%,#0e101f 80%);text-align: center;color: white;border-top-left-radius: 19px;border-top-right-radius: 19px;">
                        Reply a ticket

                        <button class="btn_adly red_adly" @click="exit()"
                            style="background-image: linear-gradient(to right top,  rgb(10, 10, 25), red); width: 50px;color:white;">
                            X
                        </button>

                    </div>

                    <div class="card-body">

                        <div class="card mb-3 m-auto" style="max-width: 640px;">
                            <div class="row g-0">
                                <div class="col-md-4" v-if="ticket_data.image != null">
                                    <img :src="ticket_data.image" style="height:100%" class="img-fluid rounded-start"
                                        alt="...">
                                </div>
                                <div class="col-md-4" v-else>
                                    <img src="https://st3.depositphotos.com/23594922/31822/v/380/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg?forcejpeg=true"
                                        class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ ticket_data.subject }} </h5>
                                        <p class="card-text"> {{ ticket_data.content }} </p>
                                        <p class="card-text"><small class="text-muted"> {{ ticket_data.name_user }} - {{
                                                ticket_data.date
                                        }} </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 class="m-auto"
                            style="text-align:center;background-image:linear-gradient(rgb(111, 0, 158) 10%, rgb(14, 16, 31) 80%);width:300px;color: white;border-top-left-radius: 5px;border-top-right-radius: 5px;">
                            Reply On This Ticket
                        </h4>
                        <div class="row"
                            style="max-height: 23.5pc;overflow-Y: scroll;border: 1px solid #0e101f;border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;">

                            <div class="card" style="height:fit-content;margin-top: 10px;" v-for="item in reply_data"
                                :key="item.id">
                                <div class="card-body">
                                    <p>{{ item.content }}</p>

                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <img :src="item.image_user" alt="avatar" width="25" height="25" />
                                            <p class="small mb-0 ms-2">{{ item.name_user }} - {{ item.date }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>



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
import axios from 'axios'
import $ from "jquery";

export default {
    props: ['user'],
    mounted() {
        axios.post('./get_me').then((res) => { this.users = res.data; });
        axios.post('./get_all_ticket').then((res) => {
            this.data_list = res.data;
            axios.post('./get_all_user').then((res) => {
                this.list_users = res.data;
            })
        })
    },
    data() {
        return {
            users: {},
            case_of_display: 0,
            data_list: {},
            ticket_data: {},
            reply_data: {},
            list_users: {},
            ass_user: "",
        }
    },
    methods: {
        save_reply() {
            axios.post('./Do_save_reply', { ticket_id: this.reply_data.id, data: this.reply_data.new_reply_content }).then((res) => {
                if (res.data.done == "done") {
                    this.reply_data.new_reply_content = "";
                    $('.alert7').fadeIn().delay(2000).fadeOut();
                    $('.cover_temp').hide();
                } else {
                    $('.alert1').text(res.data).fadeIn().delay(2000).fadeOut();
                }
            })
        },
        Aassign() {
            axios.post('./Do_Aassign', { ticket_id: this.reply_data.id, user_id: this.ass_user }).then((ffs) => {
                axios.post('./get_all_ticket').then((res) => {
                    this.data_list = res.data;
                    $('.cover_temp').hide();
                    this.ass_user = "";
                });
            });
        },
        exit() {
            $('.cover_temp').hide();
        },
        show_Aassign(data) {
            $('.cover_temp').fadeIn();
            this.case_of_display = 0;
            this.reply_data = data;
        },
        show_Reply(data) {
            $('.cover_temp').fadeIn();
            this.case_of_display = 1;
            this.reply_data = data;
        },
        show_Display(id) {
            axios.post('./get_this_ticket', { id: id }).then((res) => {
                this.ticket_data = res.data;
                this.case_of_display = 2;
                $('.cover_temp').fadeIn();
                axios.post('./get_reply_this_ticket', { id: id }).then((res) => {
                    this.reply_data = res.data;
                });
            });
        }
    }
}
</script>
