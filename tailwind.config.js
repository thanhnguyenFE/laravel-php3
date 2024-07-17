/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
  theme: {
    extend: {
        colors: {
            'danger': '#e30713',

        }
    },
  },
  plugins: [
      require('flowbite/plugin')
  ],
}

