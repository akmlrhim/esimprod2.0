/** @type {import('tailwindcss').Config} */
// const defaultTheme = require('tailwindcss/defaultTheme');
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                gotham: ["Gotham", "sans-serif"],
                aptos: ["Aptos", "sans-serif"],
            },
            colors: {
                tvri_base_color: "#1e3164",
            },
        },
    },

    plugins: [require("flowbite/plugin")],
};
