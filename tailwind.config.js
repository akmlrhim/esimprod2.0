/** @type {import('tailwindcss').Config} */
// const defaultTheme = require('tailwindcss/defaultTheme');
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './node_modules/flowbite/**/*.js',
    // './node_modules/preline/dist/*.js',
  ],
  theme: {
    extend: {
      fontFamily: {
        gotham: ['Gotham', 'sans-serif'],
        aptos: ['Aptos', 'sans-serif'],
      },
    },
  },
  plugins: [require('flowbite/plugin')],
};
