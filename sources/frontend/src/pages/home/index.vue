<template>
    <section>
        <div v-if="allPlaylist.length">
            <!-- Page Heading -->
            <h2 class="my-4">All Playlist
            </h2>

            <div class="row">
                <router-link :to="{ name: 'playlist' , params: {id: playlist.id }}" v-for="playlist in allPlaylist"
                             class="col-lg-2 col-sm-3 col-sm-4 mb-2">
                    <div class="card h-100">
                        <a href=""><img class="card-img-top" :src="playlist.image" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">{{playlist.name}}</a>
                            </h4>
                        </div>
                    </div>
                </router-link>

            </div>
        </div>
        <div v-else>
            No playlist found.
        </div>

        <!-- /.row -->

    </section>

</template>

<script>
    import MediaItem from '@/components/media' // Secondary package based on el-pagination

    export default {
        name: 'HomePage',
        components: {MediaItem},

        data() {
            return {
                allPlaylist: []
                , allMedia: []
            }
        },
        methods: {
            loadPlaylist(page = 1){
                this.$loading(true)

                this.$api.get('playlist?page=' + page).then(rs => {
                    this.allPlaylist = rs.data
                }).finally( () =>{
                    this.$loading(false)
                })
            }
        },
        mounted(){
            this.loadPlaylist()
        }
    }
</script>
<style scoped>
    h4 {
        font-size: 14px;
    }

    h1 {
        text-align: left;
        color: #0689ba;
    }

    a {
        text-decoration: none;
        color: #0689ba;
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        transition: all 0.2s linear;
    }

    a:hover {
        color: #2daaed !important;
    }

    .card {
        border: 0;
    }

    .card-body {
        padding: 5px 0;
        text-align: left;
    }

    #medias-list {
        list-style: none;
        text-align: left;
        line-height: 32px;
    }

    #medias-list li {
        border-bottom: 1px solid #eee;
        font-size: 0.9rem;
    }
</style>
