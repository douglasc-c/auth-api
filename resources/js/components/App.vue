<template>
    <div id="app">
        <header class="box-border border-2 p-3 bg-sky-800">
            <h1 class="font-bold text-4xl ml-2 text-white">Auth API</h1>
            <div class="flex justify-between items-center">
                <nav class="flex flex-row mt-3 space-x-2">
                    <div>
                        <router-link class="p-2 text-white rounded-lg" to="/companies"
                            :class="{ 'bg-sky-700': $route.path === '/companies' }">Empresas</router-link>
                    </div>
                    <div>
                        <router-link class="p-2 text-white rounded-lg" to="/users"
                            :class="{ 'bg-sky-700': $route.path === '/users' }">Clientes</router-link>
                    </div>
                </nav>
                <div class="flex space-x-2">
                    <button @click="openCompanyModal" v-if="$route.path === '/companies'"
                        class="p-2 text-white rounded-lg">Nova
                        empresa</button>
                    <button @click="openUserModal" v-if="$route.path === '/users'" class="p-2 text-white rounded-lg">Novo
                        cliente</button>
                </div>
            </div>
        </header>

        <router-view></router-view>

        <new-user-modal ref="newUserModal"></new-user-modal>
        <new-company-modal ref="newCompanyModal"></new-company-modal>
    </div>
</template>



<script>
import NewCompanyModal from "./NewCompanyModal.vue";
import NewUserModal from "./NewUserModal.vue";

export default {
    name: 'App',
    components: {
        NewCompanyModal,
        NewUserModal,
    },
    methods: {
        openUserModal() {
            if (this.$route.path === '/users') {
                this.$refs.newUserModal.openModal();
            }
        },
        openCompanyModal() {
            if (this.$route.path === '/companies') {
                this.$refs.newCompanyModal.openModal();
            }
        },
    },
}
</script>
