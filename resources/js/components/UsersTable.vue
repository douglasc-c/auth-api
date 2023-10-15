<template>
    <div class="flex justify-around">
        <table class="min-w-full">
            <thead>
                <tr>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Nome</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Código</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Tipo de Documento</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Document</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Razão Social</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Código da Empresa</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id" class="border-t border-gray-200">
                    <td class="px-6 py-4 whitespace-no-wrap">{{ user.name }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">{{ user.code }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">{{ user.type }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">{{ user.document }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">{{ user.social_reason }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">{{ user.company }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <router-link :to="'/user/' + user.id"
                            class="text-indigo-600 hover:text-indigo-900">Detalhes</router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            users: [],
        };
    },
    mounted() {
        fetch('http://127.0.0.1/api/users')
            .then(response => response.json())
            .then(data => {
                this.users = data.users;
            })
            .catch(error => {
                console.error('Erro ao buscar usuários:', error);
            });
    },
};
</script>
