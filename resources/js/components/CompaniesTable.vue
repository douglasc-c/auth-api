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
                        Sigla</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Razão Social</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="company in companies" :key="company.id" class="border-t border-gray-200">
                    <td class="px-6 py-4 whitespace-no-wrap">{{ company.name }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">{{ company.code }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">{{ company.tag }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">{{ company.social_reason }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <router-link :to="'/company/' + company.id"
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
            companies: [] // Dados das empresas obtidos do backend
        };
    },
    mounted() {
        fetch('http://127.0.0.1/api/companies')
            .then(response => response.json())
            .then(data => {
                this.companies = data.companies;
            })
            .catch(error => {
                console.error('Erro ao buscar usuários:', error);
            });
    },
};
</script>
