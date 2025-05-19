import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import scrollanimation from "./Directives/scrollanimation"; // Added import for scrollanimation directive
import { MotionPlugin } from '@vueuse/motion';
import { initSmoothScroll } from "./smooth-scroll";

// PrimeVue
import PrimeVue from 'primevue/config';
import '@primevue/themes/aura';

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(MotionPlugin)
            .use(PrimeVue, { ripple: true })
            .directive("animate", scrollanimation); // Added scrollanimation directive to the Vue app

        app.mount(el);

        // Initialiser le défilement en douceur après le montage de l'application
        initSmoothScroll();

        return app;
    },
    progress: {
        color: "#4B5563",
    },
});
