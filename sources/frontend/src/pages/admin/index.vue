<template>
    <section>

        <!-- Page Heading -->
        <h1 class="my-4">Submit Playlist or Video , Audio page to crawl content.
        </h1>

        <div>
            <form v-on:submit.prevent="crawlUrl">
                <div class="form-group">
                    <input required="true" v-model="url" type="url" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </div>

            </form>

        </div>
        <!-- /.row -->

    </section>

</template>

<script>

    export default {
        name: 'AdminPage',
        data() {
            return {
                url: ''
            }
        },
        methods: {
            crawlUrl(){
                this.$loading(true)
                this.$api.post('crawl', {url: this.url}).then(rs => {
                    alert(rs);
                    this.$loading(false)
                    this.url = '';
                }).catch(message => {
                    alert(message);
                });
            }
        },
        mounted(){

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
</style>
