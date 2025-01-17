import "./bootstrap";
import "../css/app.css";
import "../css/font.css";
import "md-editor-v3/lib/preview.css";
import "md-editor-v3/lib/style.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import { Ziggy } from './ziggy';
import { Head } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";
import Vue3Toastify, { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";
import PrimeVue from "primevue/config";
import "primeicons/primeicons.css";
const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(router)
            .use(Head)
            .use(PrimeVue)
            .use(Vue3Toastify, { autoClose: 2000, position: "bottom-right" })
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
