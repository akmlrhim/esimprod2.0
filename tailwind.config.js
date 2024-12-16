/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Avenir", "system-ui", "sans-serif"],
            },
            colors: {
                tvri_base_color: "#1E3164",
            },
            backgroundImage: {
                gedung_tvri: "url('../public//img/assets/gedung_tvri.jpg')",
            },
        },
    },

    plugins: [require("flowbite/plugin")],
};
