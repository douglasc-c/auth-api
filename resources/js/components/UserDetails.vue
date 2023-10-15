<template>
    <div class="py-8 px-4">
        <h1 class="text-2xl font-semibold mb-4">Detalhes do Cliente</h1>
        <div v-if="user" class="bg-white p-4 rounded shadow">
            <div class="mb-2 flex space-x-2">
                <p class="font-bold self-center">Nome:</p>
                <p @click="editField('name')" v-if="!editing.name">{{ user.name }}</p>
                <div class="flex space-x-2">
                    <input v-model="user.name" type="text" id="name" v-if="editing.name"
                        class="block w-full rounded-lg border-2 p-2 mt-1">
                    <button @click="saveField('name')" v-if="editing.name"
                        class="bg-blue-500 text-white font-semibold rounded-lg p-2">Salvar</button>
                    <button @click="cancelEdit('name')" v-if="editing.name"
                        class="bg-red-500 text-white font-semibold rounded-lg p-2">Cancelar</button>
                </div>
            </div>

            <div class="mb-2 flex space-x-2">
                <p class="font-bold self-center">Código:</p>
                <p v-if="!editing.code">{{ user.code }}</p>
            </div>

            <div class="mb-2 flex space-x-2">
                <p class="font-bold self-center">Tipo de document:</p>
                <p @click="editField('type')" v-if="!editing.type">{{ user.type }}</p>
                <div class="flex space-x-2">
                    <select v-model="user.type" id="type" v-if="editing.type"
                        class="block w-full rounded-lg border-2 p-2 mt-1">
                        <option value="CPF">CPF</option>
                        <option value="CNPJ">CNPJ</option>
                    </select>
                    <button @click="saveField('type')" v-if="editing.type"
                        class="bg-blue-500 text-white font-semibold rounded-lg p-2">Salvar</button>
                    <button @click="cancelEdit('type')" v-if="editing.type"
                        class="bg-red-500 text-white font-semibold rounded-lg p-2">Cancelar</button>
                </div>
            </div>


            <div class="mb-2 flex space-x-2">
                <p class="font-bold self-center">Documento:</p>
                <p @click="editField('document')" v-if="!editing.document">{{ user.document }}</p>
                <div class="flex space-x-2">
                    <input v-model="user.document" type="text" id="document" v-if="editing.document"
                        class="block w-full rounded-lg border-2 p-2 mt-1">
                    <button @click="saveField('document')" v-if="editing.document"
                        class="bg-blue-500 text-white font-semibold rounded-lg p-2">Salvar</button>
                    <button @click="cancelEdit('document')" v-if="editing.document"
                        class="bg-red-500 text-white font-semibold rounded-lg p-2">Cancelar</button>
                </div>
            </div>

            <div class="mb-2 flex space-x-2">
                <p class="font-bold self-center">Razão social:</p>
                <p @click="editField('social_reason')" v-if="!editing.social_reason">{{ user.social_reason }}</p>
                <div class="flex space-x-2">
                    <input v-model="user.social_reason" type="text" id="social_reason" v-if="editing.social_reason"
                        class="block w-full rounded-lg border-2 p-2 mt-1">
                    <button @click="saveField('social_reason')" v-if="editing.social_reason"
                        class="bg-blue-500 text-white font-semibold rounded-lg p-2">Salvar</button>
                    <button @click="cancelEdit('social_reason')" v-if="editing.social_reason"
                        class="bg-red-500 text-white font-semibold rounded-lg p-2">Cancelar</button>
                </div>
            </div>

            <div class="mb-2 flex space-x-2">
                <p class="font-bold self-center">Código da empresa:</p>
                <p @click="editField('company')" v-if="!editing.company">{{ user.company || 'Nenhum' }}</p>
                <div class="flex space-x-2">
                    <select v-model="user.company" v-if="editing.company" class="block w-full rounded-lg border-2 p-2 mt-1">
                        <option value="">Nenhum</option>
                        <option v-for="company in availableCompanies" :value="company.code">{{ company.name }}</option>
                    </select>
                    <button @click="saveField('company')" v-if="editing.company"
                        class="bg-blue-500 text-white font-semibold rounded-lg p-2">Salvar</button>
                    <button @click="cancelEdit('company')" v-if="editing.company"
                        class="bg-red-500 text-white font-semibold rounded-lg p-2">Cancelar</button>
                </div>
            </div>
        </div>
        <div v-else class="text-red-500 mt-4">Usuário não encontrado</div>
    </div>
</template>


<script>
export default {
    data() {
        return {
            user: {
                name: "Nome do Usuário",
                type: "Tipo de Usuário",
                document: "Documento do Usuário",
                social_reason: "Razão Social do Usuário",
                company: "Empresa do Usuário",
            },
            editing: {
                name: false,
                type: false,
                document: false,
                social_reason: false,
                company: false,
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

            const userId = this.$route.params.id;
            const updatedData = { [fieldName]: this.user[fieldName] };

            fetch('http://127.0.0.1/api/user/' + userId, {
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
                        throw new Error('Falha ao atualizar o usuário.');
                    }
                })
                .then(data => {
                    console.log(data)
                })
                .catch(error => {
                    console.error('Erro ao atualizar usuário:', error);
                });
        },
    },
    mounted() {
        const userId = this.$route.params.id;

        if (!userId) {
            this.user = null;
            return;
        }
        fetch('http://127.0.0.1/api/companies')
            .then(response => {
                if (response.status === 200) {
                    return response.json();
                } else {
                    throw new Error('Falha ao carregar a lista de empresas.');
                }
            })
            .then(data => {
                this.availableCompanies = data.companies;
            })
            .catch(error => {
                console.error('Erro ao carregar empresas:', error);
            });

        fetch('http://127.0.0.1/api/user/' + userId)
            .then(response => {
                if (response.status === 200) {
                    return response.json();
                } else {
                    throw new Error('Usuário não encontrado.');
                }
            })
            .then(data => {
                this.user = data.user;
            })
            .catch(error => {
                console.error('Erro ao buscar usuário:', error);
                this.user = null;
            });
    },
};
</script>
