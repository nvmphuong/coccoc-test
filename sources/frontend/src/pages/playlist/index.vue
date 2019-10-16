<template>
    <section>
        <!-- Page Heading -->
        <div class="row">
            <div class="col-4">
                <div id="playlist-info" class="card">
                    <img class="card-img-top" :src="playlist.image" alt="">
                    <h1 class="my-4">{{playlist.name}}
                    </h1>
                </div>
            </div>
            <div class="col">
                <ul id="medias-list">
                    <li v-for="media in playlist.medias">
                        <MediaItem :value="media"/>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /.row -->

    </section>
</template>

<script>
    import MediaItem from '@/components/media' // Secondary package based on el-pagination

    export default {
        name: 'PlaylistPage',
        components: {MediaItem},
        props: ['id'],
        data() {
            return {
                playlist: {}
            }
        },
        methods: {
            reload(){
                this.$api.get('playlist/' + this.id).then(rs => {
                    this.playlist = rs
                });
            }
        },
        mounted(){
            this.reload();
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

    #playlist-info {
        position: sticky;
        top: 10px
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
