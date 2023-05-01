import { defineConfig } from "vite"
import laravel from "laravel-vite-plugin"
import vue from "@vitejs/plugin-vue"
import inertiaLayout from "momentum-layout"
import eslintPlugin from "vite-plugin-eslint"
import path from "path"
import { watch } from "vite-plugin-watch"
import VueMacros from 'unplugin-vue-macros/vite'

export default defineConfig({
    resolve: {
        alias: {
            "@/utils": path.resolve("./resources/scripts/utils"),
            "@": path.resolve("./resources"),
        },
    },
    plugins: [
        laravel({
            input: "resources/scripts/app.ts",
            refresh: true,
        }),
        VueMacros({
            plugins: {
                vue: vue({
                    template: {
                        transformAssetUrls: {
                            base: null,
                            includeAbsolute: false,
                        },
                    },
                })
            },
        }),
        inertiaLayout(),
        eslintPlugin(),
        watch({
            pattern: "routes/*.php",
            command: "php artisan trail:generate",
        })
    ],
})
