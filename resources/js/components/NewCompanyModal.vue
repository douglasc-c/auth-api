<template>
    <div>
        <div class="fixed inset-0 flex items-center justify-center z-50" v-if="showModal">
            <div class="modal p-4 bg-white rounded shadow-lg">
                <h2 class="text-xl font-semibold mb-4">Nova empresa</h2>
                <form @submit.prevent="submitForm">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-600">Nome:</label>
                        <input v-model="company.name" type="text" id="name" name="name" required
                            class="w-full p-2 border rounded">
                    </div>

                    <div class="mb-4">
                        <label for="tag" class="block text-gray-600">Sigla:</label>
                        <input v-model="company.tag" type="text" id="tag" name="tag" required
                            class="w-full p-2 border rounded">
                    </div>

                    <div class="mb-4">
                        <label for="social_reason" class="block text-gray-600">Razão social:</label>
                        <input v-model="company.social_reason" type="text" id="social_reason" name="social_reason" required
                            class="w-full p-2 border rounded">
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
            company: {
                name: "",
                tag: "",
                social_reason: "",
            },
        };
    },
    methods: {
        openModal() {
            this.showModal = true;
        },
        closeModal() {
            this.showModal = false;
        },
        submitForm() {
            fetch('http://127.0.0.1/api/company', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(this.company),
            })
                .then(response => {
                    if (response.status === 200) {
                        return response.json();
                    } else {
                        throw new Error('Falha ao criar a empresa.');
                    }
                })
                .then(data => {
                    this.closeModal();
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Erro ao criar a empresa:', error);
                });
        },
    },
};
</script>
