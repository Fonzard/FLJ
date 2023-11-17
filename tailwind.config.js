/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
    "./assets/react/controllers/*.jsx",
  ],
  theme: {
    color: {
      'gray' : '#D7C8C8',
      'graySoft' :'#b39b9b',
      'blue': '#A5A3BF',
    }
  },
  plugins: [],
}