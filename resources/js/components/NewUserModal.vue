<template>
    <div>
        <div class="fixed inset-0 flex items-center justify-center z-50" v-if="showModal">
            <div class="modal p-4 bg-white rounded shadow-lg">
                <h2 class="text-xl font-semibold mb-4">Novo cliente</h2>
                <form @submit.prevent="submitForm">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-600">Nome:</label>
                        <input v-model="user.name" type="text" id="name" name="name" required
                            class="w-full p-2 border rounded">
                    </div>

                    <div class="mb-4">
                        <label for="type" class="block text-gray-600">Tipo:</label>
                        <select v-model="user.type" id="type" name="type" required class="w-full p-2 border rounded">
                            <option value="CPF">CPF</option>
                            <option value="CNPJ">CNPJ</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="document" class="block text-gray-600">Documento:</label>
                        <input v-mask="documentMask" v-model="user.document" type="text" id="document" name="document"
                            required class="w-full p-2 border rounded">
                    </div>

                    <div class="mb-4">
                        <label for="social_reason" class="block text-gray-600">Razão social:</label>
                        <input v-model="user.social_reason" type="text" id="social_reason" name="social_reason" required
                            class="w-full p-2 border rounded">
                    </div>

                    <div class="mb-4">
                        <label for="company" class="block text-gray-600">Empresa:</label>
                        <select v-model="user.company" id="company" name="company" required
                            class="w-full p-2 border rounded">
                            <option value="">Nenhum</option>
                            <option v-for="company in companies" :value="company.code">{{ company.name }}</option>
                        </select>
                    </div>

                    <div class="mt-4 flex justify-end">
                        <button @click="closeModal" class="bg-red-500 text-white px-4 py-2 rounded-lg">Cancelar</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 ml-4 rounded-lg">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            showModal: false,
            user: {
                name: "",
                type: "CPF",
                document: "",
                social_reason: "",
                company: "",
            },
            companies: [],
        };
    },
    mounted() {
        fetch('http://127.0.0.1/api/companies')
            .then(response => {
                if (response.status === 200) {
                    return response.json();
                } else {
                    throw new Error('Falha ao carregar a lista de empresas.');
                }
            })
            .then(data => {
                this.companies = data.companies;
            })
            .catch(error => {
                console.error('Erro ao carregar empresas:', error);
            });
    },
    methods: {
        openModal() {
            this.showModal = true;
        },
        closeModal() {
            this.showModal = false;
        },
        submitForm() {
            fetch('http://127.0.0.1/api/user', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(this.user),
            })
                .then(response => {
                    if (response.status === 200) {
                        return response.json();
                    } else {
                        throw new Error('Falha ao criar o usuário.');
                    }
                })
                .then(data => {
                    this.closeModal();
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Erro ao criar usuário:', error);
                });
        },
    },
    computed: {
        documentMask() {
            return this.user.type === 'CPF' ? '###.###.###-##' : '##.###.###/####-##';
        },
    },
};
</script>
