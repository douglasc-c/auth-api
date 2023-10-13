<template>
    <div>
      <h1>Lista de Usuários</h1>
      <ul>
        <li v-for="user in users" :key="user.id">{{ user.name }}</li>
      </ul>
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
      // Faz a requisição para o servidor local em localhost:8000
      fetch('http://localhost:8000/users')
        .then(response => response.json())
        .then(data => {
          this.users = data;
        })
        .catch(error => {
          console.error('Erro ao buscar usuários:', error);
        });
    },
  };
  </script>
