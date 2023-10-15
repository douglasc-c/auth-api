import CompaniesTable from '../components/CompaniesTable.vue'
import CompanyDetails from '../components/CompanyDetails.vue'

export default [
  {
    path: '/companies',
    name: 'CompaniesTable',
    component: CompaniesTable
  },
  {
    path: '/company/:id',
    name: 'CompanyDetails',
    component: CompanyDetails,
  },
];
