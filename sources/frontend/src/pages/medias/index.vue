<template>
    <section>
        <form v-on:submit.prevent="reload" class="form-inline justify-content-center">
            <input class="form-control mr-sm-2" v-model="search" type="search" placeholder="Search"
                   aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <div class="row">

            <div class="col">
                <ul id="medias-list">
                    <li v-for="media in medias">
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
        name: 'MediaPage',
        components: {MediaItem},
        props: ['id'],
        data() {
            return {
                medias: [],
                search: ''
            }
        },
        methods: {
            reload(){
                this.$api.get('medias?search=' + this.search).then(rs => {
                    this.medias = rs.data
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
