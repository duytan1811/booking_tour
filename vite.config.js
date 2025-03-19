import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app_client.css",
                "resources/js/app_client.js",
                "resources/css/app_admin.css",
                "resources/js/app_admin.js",
            ],
            refresh: true,
        }),
    ],
});
