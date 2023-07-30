import { createRouter, createWebHistory } from "vue-router";
import InvoiceIndex from "../components/invoices/index.vue";
import notFound from "../components/NotFound.vue";
import invoiceNew from '../components/invoices/new.vue';

const routes = [
    {
        path: "/",
        component: InvoiceIndex,
    },
    {
        path:'/invoice/new',
        component: invoiceNew,
    },
    {
        path: "/:pathMatch(.*)*",
        component: notFound,
    },
    // {
    //     path: "/:catchAll(.*)",
    //     name: "NotFound",
    //     component: notFound,
    // },

]

const router = createRouter({
    history: createWebHistory(),
    routes,
});


export default router;
