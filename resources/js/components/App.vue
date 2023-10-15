<template>
    <div id="app">
        <header class="box-border border-2 p-3 bg-sky-800">
            <h1 class="font-bold text-4xl ml-2 text-white">Auth API</h1>
            <nav class="flex flex-row mt-3">
                <div>
                    <router-link class="p-2 text-white rounded-lg" to="/companies"
                        :class="{ 'bg-sky-700': $route.path === '/companies' }">Empresas</router-link>
                </div>
                <div>
                    <router-link class="p-2 text-white rounded-lg" to="/users"
                        :class="{ 'bg-sky-700': $route.path === '/users' }">Clientes</router-link>
                </div>
            </nav>
        </header>

        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: 'App'
}
</script>
