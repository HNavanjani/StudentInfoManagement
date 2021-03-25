import Home from './components/Home.vue';
import AllStudents from './components/AllStudents.vue';
import AddStudent from './components/AddStudent.vue';
import AddMarks from './components/AddMarks.vue';
import ViewWinners from './components/ViewWinners.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'viewmarks',
        path: '/viewmarks',
        component: AllStudents
    },
    {
        name: 'add',
        path: '/add',
        component: AddStudent
    },
    {
        name: 'addmarks',
        path: '/addmarks',
        component: AddMarks
    },
    {
        name: 'winners',
        path: '/winners',
        component: ViewWinners
    }
];