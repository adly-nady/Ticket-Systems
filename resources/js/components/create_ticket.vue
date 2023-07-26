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
                        <span style="margin-left: 21%;"> Create New Ticket </span>
                        <button class="btn_adly pre_adly" @click="show_my_tickets()"
                            style="background-image: linear-gradient(to right top,  rgb(10, 10, 25), #24008b); width: 100px;color:white;">
                            My Tickets
                        </button>
                        <button class="btn_adly pre_adly" @click="show_create_category()"
                            style="background-image: linear-gradient(to right top,  rgb(10, 10, 25), #24008b); width: 150px;color:white;margin-right: 10px;">
                            Create Category
                        </button>
                    </div>

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
                            <div class="col col-8">
                                <div class="form-floating">
                                    <input type="text" v-model="data_form.subject" class="form-control"
                                        id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Subject</label>
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-floating">
                                    <select class="form-select" v-model="data_form.type_of_category" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <option value="" disabled>Open this select menu</option>
                                        <option v-for="item in category" :key="item" :value="item.id">{{ item.name }}
                                        </option>
                                    </select>
                                    <label for="floatingSelect">Select Category</label>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">

                            <div class="col col-8">
                                <div class="form-floating">
                                    <textarea class="form-control" v-model="data_form.content"
                                        placeholder="Leave a comment here" id="floatingTextarea2"
                                        style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Content</label>
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-floating">
                                    <select class="form-select" v-model="data_form.case_ticket" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <option value="" disabled>select case of ticket</option>
                                        <option value="Open">Open</option>
                                        <option value="Close">Close</option>
                                        <option value="Wait">Wait</option>
                                    </select>
                                    <label for="floatingSelect">Case Of Ticket</label>
                                </div>
                            </div>

                        </div>
                        <br><br>
                        <div class="row">
                            <button class="btn m-auto" @click="save()"
                                style="background-image: linear-gradient(to right, rgb(111, 0, 158) , rgb(14, 16, 31)); width: 150px;color:white;">
                                Save </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="cover_temp">

            <div class="col-md-3 m-auto" v-if="case_card == 0">
                <div class="card"
                    style="border:1px solid black;height:40pc;box-shadow: 1px 1px 20px 0.35px #6f009e;margin-top: 12%;border-radius: 20px;">
                    <div class="card-header"
                        style="background-image: linear-gradient(#6f009e 10%,#0e101f 80%);text-align: center;color: white;border-top-left-radius: 19px;border-top-right-radius: 19px;">
                        Create New Category
                        <button class="btn_adly red_adly" @click="exit()"
                            style="background-image: linear-gradient(to right top,  rgb(10, 10, 25), red); width: 50px;color:white;">
                            X
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="form-floating">
                            <input type="text" v-model="new_categorys" class="form-control" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Enter New Category</label>
                        </div>
                        <br>
                        <button class="btn_adly gre_adly" @click="new_category()"
                            style="background-image: linear-gradient(to right top,  rgb(10, 10, 25), #3ded97); width: 165px;color:white;margin-left: 25%;">
                            Save New Category
                        </button>

                        <hr>
                        <div class="container">
                            <div class="row g-3">

                                <div class="col-12" v-for="item in category" :key="item">
                                    <div class="p-3 bg-light"
                                        style="border:1px solid #6f009e;border-radius: 5px;box-shadow: 0px 0px 8px 0.3px #6f009e;">
                                        {{ item.name }}
                                        <span @click="delet_el(item.id)"
                                            style="float: right;width: fit-content;height: fit-content;color:red;cursor: pointer;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg> </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6 m-auto" v-if="case_card == 1">
                <div class="card"
                    style="border:1px solid black;height:40pc;box-shadow: 1px 1px 20px 0.35px #6f009e;margin-top: 10%;border-radius: 20px;">
                    <div class="card-header"
                        style="background-image: linear-gradient(#6f009e 10%,#0e101f 80%);text-align: center;color: white;border-top-left-radius: 19px;border-top-right-radius: 19px;">
                        Display My Tickets
                        <button class="btn_adly red_adly" @click="exit()"
                            style="background-image: linear-gradient(to right top,  rgb(10, 10, 25), red); width: 50px;color:white;">
                            X
                        </button>
                    </div>

                    <div class="card-body">

                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align:center;"> Delet </th>
                                    <th style="text-align:center;"> Reassign </th>
                                    <th style="text-align:center;"> The category </th>
                                    <th style="text-align:center;"> The Case </th>
                                    <th style="text-align:center;"> Date </th>
                                    <th style="text-align:center;"> Image </th>
                                    <th style="text-align:center;"> Content </th>
                                    <th style="text-align:center;"> Subject </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in dala_list_tickets" :key="item">
                                    <td>
                                        <button class="btn_adly" @click="delete_row(item.id)" style="color:red"> <svg
                                                xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg> </button>
                                    </td>
                                    <td style="text-align:center;" v-if="item.re_id != null">{{ item.re_id }}</td>
                                    <td style="text-align:center;" v-else> Not set yet </td>
                                    <td style="text-align:center;" v-if="item.type_of_category != null">
                                        {{ item.name_category }}
                                    </td>
                                    <td style="text-align:center;" v-else> No Category </td>
                                    <td style="text-align:center;" v-if="item.case_ticket != null">
                                        <span :class="'span_' + item.case_ticket"> {{ item.case_ticket }} </span>
                                    </td>
                                    <td style="text-align:center;" v-else> No Case </td>
                                    <td style="text-align:center;">{{ item.date }}</td>
                                    <td style="text-align:center;" v-if="item.image != null"> <svg
                                            xmlns="http://www.w3.org/2000/svg" style="color:green" width="26"
                                            height="26" fill="currentColor" class="bi bi-check-square"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                            <path
                                                d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                                        </svg> </td>
                                    <td style="text-align:center;" v-else><svg xmlns="http://www.w3.org/2000/svg"
                                            style="color:red" width="26" height="26" fill="currentColor"
                                            class="bi bi-dash-square" viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </td>
                                    <td style="text-align:center;">{{ item.content }}</td>
                                    <td style="text-align:center;">{{ item.subject }}</td>
                                </tr>
                            </tbody>
                        </table>
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
        "use strict";
        axios.post('./get_me').then((res) => { this.users = res.data; });
        axios.post('./get_all_category').then((res) => {
            this.category = res.data;
        })
    },
    data() {
        return {
            case_card: 0,
            users: {},
            category: [],
            new_categorys: "",
            dala_list_tickets: {},
            data_form: { file: "", type_of_category: "", case_ticket: "", department: "", img: "https://static.wixstatic.com/media/2cd43b_f534da01d6f94537904b619feae2d984~mv2.png/v1/fill/w_414,h_414,q_90/2cd43b_f534da01d6f94537904b619feae2d984~mv2.png" },
        }
    },
    methods: {
        delete_row(id) {
            axios.post('./delete_row', { id: id }).then((res) => {
                axios.post('./get_my_ticket').then((res) => {
                    this.dala_list_tickets = res.data;
                })
            });
        },
        new_category() {
            axios.post('./new_category', { name: this.new_categorys }).then((res) => {
                this.new_categorys = "";
                axios.post('./get_all_category').then((res) => {
                    this.category = res.data;
                })
            });
        },
        show_my_tickets() {
            $('.cover_temp').fadeIn();
            this.case_card = 1;
            axios.post('./get_my_ticket').then((res) => {
                this.dala_list_tickets = res.data;
            })
        },
        show_create_category() {
            $('.cover_temp').fadeIn();
            this.case_card = 0;
            axios.post('./get_all_category').then((res) => {
                this.category = res.data;
            })
        },
        exit() {
            $('.cover_temp').fadeOut();
        },
        delet_el(id) {
            axios.post('./delete_el_category', { id: id }).then((res) => {
                axios.post('./get_all_category').then((res) => {
                    this.category = res.data;
                })
            });
        },
        change_img() {
            $('.file').click();
        },
        refile(event) {
            this.data_form.file = event.target.files[0];
            this.data_form.img = URL.createObjectURL(event.target.files[0]);
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
        save() {
            let data = new FormData();
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            data.append('file', this.data_form.file);
            data.append('subject', this.data_form.subject);
            data.append('type_of_category', this.data_form.type_of_category);
            data.append('content', this.data_form.content);
            data.append('case_ticket', this.data_form.case_ticket);
            axios.post('/save_new_ticket', data, config).then((res) => {
                if (res.data.Done == "Done") {
                    $('.alert7').fadeIn(300).delay(2500).fadeOut();
                    this.data_form = { type_of_category: "", case_ticket: "", department: "", img: "https://static.wixstatic.com/media/2cd43b_f534da01d6f94537904b619feae2d984~mv2.png/v1/fill/w_414,h_414,q_90/2cd43b_f534da01d6f94537904b619feae2d984~mv2.png" };
                } else {
                    if (res.data.error_file)
                        $(".alert1").text(res.data.error_file).slideDown(500).delay(3000).slideUp(500);
                    if (res.data.error_subject)
                        $('.alert2').text(res.data.error_subject).slideDown(500).delay(3500).slideUp(500);
                    if (res.data.error_type_of_category)
                        $('.alert3').text(res.data.error_type_of_category).slideDown(500).delay(4000).slideUp(500);
                    if (res.data.error_content)
                        $('.alert4').text(res.data.error_content).slideDown(500).delay(4500).slideUp(500);
                    if (res.data.error_case_ticket)
                        $('.alert5').text(res.data.error_case_ticket).slideDown(500).delay(5000).slideUp(500);
                    if (res.data.other_error)
                        $('.alert6').text(res.data.other_error).slideDown(500).delay(5500).slideUp(500);

                }
            });
        }
    }
}
</script>
