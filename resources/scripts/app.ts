import "../css/app.css"

import { createApp, h, DefineComponent } from "vue"
import { createInertiaApp } from "@inertiajs/vue3"
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers"
import { trail } from "@/utils/router"
import routes from "@/scripts/routes/routes.json"
import LayoutMain from "@/views/layouts/main/main.vue"
import LayoutAuth from "@/views/layouts/auth/auth.vue"

const appName = window.document.getElementsByTagName("title")[0]?.innerText || "Laravel"

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: async (name: string) => {
        const page = await resolvePageComponent(
            `../views/pages/${name}.vue`,
            import.meta.glob<DefineComponent>("../views/pages/**/*.vue")
        )
        const layout = name.startsWith("auth/") ? LayoutAuth : LayoutMain
        page.default.layout = page.default.layout || layout
        return page
    },
    setup({ el, App, props, plugin }) {
        //eslint-disable-next-line
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(trail, { routes })

            .mount(el)
    },
    progress: {
        color: "#4B5563",
    },
})
