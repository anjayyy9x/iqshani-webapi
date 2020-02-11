<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
              
                <div class="card" style="margin-top: 50px;">
                    <div class="card-header" style="background: rgba(140, 140, 140, 0.90);color: #fff;">
                            <center>{{judul}}</center>
                    </div>
                    <div v-if="!loading" class="card-body">
                        <!-- {{konten}} -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <button class="btn btn-primary" @click="aksesApi" style="margin-bottom: 20px;">
                                Refresh Data
                                </button>
                            </div>
                            <div class="col-md-9">
                                <input class="form-control" type="search" v-model="search" placeholder="Masukan Kata Kunci" @change="jalankanPencarian">
                            </div>
                        </div>
                    </div>
                        <table v-if="!error" class="table table-bordered">
                            <thead>
                            <tr style="text-align: center;">
                                <td>Nama</td>
                                <td>Jenis Kelamin</td>
                                <td>Tanggal Dibuat</td>
                            </tr>
                            <tr v-for="item in data.data":key="item.id" style="text-align: center; color: #fff; background: rgba(140, 140, 140, 0.90);">
                                <td>
                                    {{item.nama}}
                                </td>
                                <td>
                                    {{item.jk}}
                                </td>
                                <td>
                                    {{item.created_at}}
                                </td>
                            </tr>
                            </thead>
                        </table>

                        <pagination :data="data" @pagination-change-page="aksesApi"></pagination>
                        <footer><a href="https://github.com/anjayyy9x/iqshani-webapi.git" class="">find me on</a></footer>

                        <div v-if="error">
                            {{error}}
                        </div>
                    </div>
                    <div v-if="loading" class="card-body">
                        <center><h1>Loanjing.....</h1>hahaha</center>
                    </div>

                    <notifications group="foo" position="bottom right"/>
                    <!-- <notifications classes="my-style"/> -->
                    <vue-progress-bar></vue-progress-bar>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                judul:'DATA SISWA',
                data:{},
                error:null,
                search:'',
                loading:false
            }
        },
        mounted() {
            // console.log('Component mounted.')
            this.aksesApi()
        },
        methods: {
            aksesApi(page = 1, search){
                this.loading=true
                this.$Progress.start()



                const params = {
                    page: page
                }
                if (search) {
                    params.search =search
                }
                axios.get('/testapi',{params})
                .then(response=>{
                    this.data=response.data
                    this.loading=false
                    this.$Progress.finish()
                    this.$notify({
                    type:'bg-success',
                    group:'foo',
                    title:'Notifications',
                    text:'HAI'
                });
                })
                .catch(error=>{
                    this.error=error
                    this.loading=false
                    this.$Progress.fail()
                    this.$notify({
                    type:'bg-danger',
                    group:'foo',
                    title:'Notifications',
                    text:error
                });
                })
            },
            jalankanPencarian(){
                this.aksesApi(1,this.search)
                this.$notify({
                    type:'bg-info',
                    group:'foo',
                    title:'Notifications',
                    text:'OKE'
                });
            }
        }
    }
</script>
