<template>
    <a  @click="checkDownload"> {{value.name}}</a>
</template>

<script>

    export default {
        name: 'MediaItem',
        props: ['value'],
        methods: {
            checkDownload(media){
                this.$loading(true)
                this.$api.get('download/' + this.value.id).then(url => {
                    var filename = url.substring(url.lastIndexOf("/") + 1).split("?")[0];
                    var xhr = new XMLHttpRequest();
                    xhr.responseType = 'blob';
                    xhr.onload = ()=>{
                        var a = document.createElement('a');
                        a.href = window.URL.createObjectURL(xhr.response);
                        a.download = filename;
                        a.style.display = 'none';
                        document.body.appendChild(a);
                        a.click();
                        document.body.removeChild(a)
                        this.$loading(false)
                    };
                    xhr.open('GET', url);
                    xhr.send();
//                    document.body.removeChild(element)
                }).catch(error => {
                    console.log(error);
                });
            }
        }
    }
</script>
<style scoped>

    a {
        cursor: pointer;
        text-decoration: none;
        color: #0689ba;
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        transition: all 0.2s linear;
    }

    a:hover {
        color: #2daaed !important;
    }

</style>
