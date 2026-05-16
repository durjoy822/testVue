import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { ZiggyVue } from '../../vendor/tightenco/ziggy'
import '@fortawesome/fontawesome-free/css/all.min.css'

createInertiaApp({
    resolve: name =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/Admin/**/*.vue')
        ),

    setup({ el, App, props, plugin }) {
        createApp({
            render: () => h(App, props),
        })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el)
    },
})