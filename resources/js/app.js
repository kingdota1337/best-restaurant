import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import { aliases, mdi } from 'vuetify/iconsets/mdi'

// Global components
import TextField from '@/components/TextField.vue'
import PrimaryButton from '@/components/PrimaryButton.vue'
import Autocomplete from '@/components/Autocomplete.vue'

const vuetify = createVuetify({
    icons: {
        defaultSet: 'mdi',
        aliases,
        sets: {
            mdi,
        }
    },
    components,
    directives
})

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

const globalComponents = { TextField, PrimaryButton, Autocomplete }

const app = createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(vuetify)
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mixin({ components: globalComponents }) // register global components
            .mount(el);
    },

    progress: {
        color: '#4B5563',
    },
});