<template>
    <div id="app">
        <div class="container">
                <ul class="nav justify-content-center">
                    <li class="nav-item active">
                        <router-link class="nav-link"  to="/">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" route-link to="/admin">Admin</router-link>
                    </li>
                </ul>

            <router-view/>
        </div>
    </div>
</template>

<script>
    import HomePage from './pages/home'

    export default {
        name: `app`,
        components: {
            HomePage
        }
    }
</script>

<style>
    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
    }

    .navbar {
        margin-bottom: 20px;
    }

</style>
