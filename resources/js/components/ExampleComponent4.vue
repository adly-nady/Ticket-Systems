<template>
    <div class="container" style="margin-top: 10px;">
        <div class="end_div">
            <div class="div_imgs">
                <img :src="users.image" style="width: 100%;height: 100%;" alt="" srcset="">
            </div>
            <div class="div_names" style="color:white">
                <h5> {{ users.name }} </h5>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12" style="text-align:center">
                <h3
                    style="margin-top:50px;color:white;text-shadow: 2px 2px 5px white;font-size: 35px;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                    Welcome MR/
                    {{ users.name }} in Ticket
                    System</h3>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    props: ['user'],
    mounted() {
        console.log('Component mounted.')
        axios.post('./get_all_ticket').then((res) => {
            this.data_list = res.data;
        })
    },
    data() {
        return {
            users: this.user,
            data_list: {}
        }
    }
}
</script>
