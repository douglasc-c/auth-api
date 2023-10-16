<template>
    <div class="py-8 px-4">
        <h1 class="text-2xl font-semibold mb-4">Detalhes da Empresa</h1>
        <div v-if="company" class="bg-white p-4 rounded shadow">
            <div class="mb-2 flex space-x-2">
                <p class="font-bold self-center">Nome:</p>
                <p @click="editField('name')" v-if="!editing.name">{{ company.name }}</p>
                <div class="flex space-x-2">
                    <input v-model="company.name" type="text" id="name" v-if="editing.name"
                        class="block w-full rounded-lg border-2 p-2 mt-1">
                    <button @click="saveField('name')" v-if="editing.name"
                        class="bg-blue-500 text-white font-semibold rounded-lg p-2">Salvar</button>
                    <button @click="cancelEdit('name')" v-if="editing.name"
                        class="bg-red-500 text-white font-semibold rounded-lg p-2">Cancelar</button>
                </div>
            </div>

            <div class="mb-2 flex space-x-2">
                <p class="font-bold self-center">Sigla:</p>
                <p @click="editField('tag')" v-if="!editing.tag">{{ company.tag }}</p>
                <div class="flex space-x-2">
                    <input v-model="company.tag" type="text" id="tag" v-if="editing.tag"
                        class="block w-full rounded-lg border-2 p-2 mt-1">
                    <button @click="saveField('tag')" v-if="editing.tag"
                        class="bg-blue-500 text-white font-semibold rounded-lg p-2">Salvar</button>
                    <button @click="cancelEdit('tag')" v-if="editing.tag"
                        class="bg-red-500 text-white font-semibold rounded-lg p-2">Cancelar</button>
                </div>
            </div>

            <div class="mb-2 flex space-x-2">
                <p class="font-bold self-center">Código:</p>
                <p v-if="!editing.code">{{ company.code }}</p>
            </div>

            <div class="mb-2 flex space-x-2">
                <p class="font-bold self-center">Razão social:</p>
                <p @click="editField('social_reason')" v-if="!editing.social_reason">{{ company.social_reason }}</p>
                <div class="flex space-x-2">
                    <input v-model="company.social_reason" type="text" id="social_reason" v-if="editing.social_reason"
                        class="block w-full rounded-lg border-2 p-2 mt-1">
                    <button @click="saveField('social_reason')" v-if="editing.social_reason"
                        class="bg-blue-500 text-white font-semibold rounded-lg p-2">Salvar</button>
                    <button @click="cancelEdit('social_reason')" v-if="editing.social_reason"
                        class="bg-red-500 text-white font-semibold rounded-lg p-2">Cancelar</button>
                </div>
            </div>
        </div>
        <div v-else class="text-red-500 mt-4">Empresa não encontrado</div>
    </div>
</template>


<script>
export default {
    data() {
        return {
            company: {
                name: "Nome do Usuário",
                code: "Tipo de Usuário",
                tag: "Sigla",
                social_reason: "Razão Social do Usuário",
            },
            editing: {
                name: false,
                code: false,
                tag: false,
                social_reason: false,
            },
            availableCompanies: [],
        };
    },
    methods: {
        editField(fieldName) {
            this.editing[fieldName] = true;
        },
        cancelEdit(fieldName) {
            this.editing[fieldName] = false;
        },
        saveField(fieldName) {
            this.editing[fieldName] = false;

            const companyId = this.$route.params.id;
            const updatedData = { [fieldName]: this.company[fieldName] };

            fetch('http://127.0.0.1/api/company/' + companyId, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(updatedData),
            })
                .then(response => {
                    if (response.status === 200) {
                        return response.json();
                    } else {
                        throw new Error('Falha ao atualizar a empresa.');
                    }
                })
                .then(data => {
                })
                .catch(error => {
                    console.error('Erro ao atualizar a empresa:', error);
                });
        },
    },
    mounted() {
        const companyId = this.$route.params.id;

        if (!companyId) {
            this.company = null;
            return;
        }

        fetch('http://127.0.0.1/api/company/' + companyId)
            .then(response => {
                if (response.status === 200) {
                    return response.json();
                } else {
                    throw new Error('Empresa não encontrada.');
                }
            })
            .then(data => {
                this.company = data.company;
            })
            .catch(error => {
                console.error('Erro ao buscar empresa:', error);
                this.company = null;
            });
    },
};
</script>
