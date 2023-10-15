import UsersTable from '../components/UsersTable.vue'
import UserDetails from '../components/UserDetails.vue'

export default [
  {
    path: '/users',
    name: 'UsersTable',
    component: UsersTable
  },
  {
    path: '/user/:id',
    name: 'UserDetails',
    component: UserDetails,
  },
];
