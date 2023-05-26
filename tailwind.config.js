/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
      extend: {
        colors: {
            laravel: "#2980B9",
            search_bg:'#e8541d',
        },
        fontFamily:{
          body:['Lato']
        }
    },
  },
  plugins: [],
}

