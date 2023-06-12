/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./public/**/*.{php,js}','./app/**/*.php'],
  theme: {
    extend: {
      colors: {
          'navy': '#201b2d',
          'pink': '#ed9cc2',
          'periwinkle': '#a0a5d6',
          'turquoise': '#5eb3bc',
          'lt-blue': '#7098d4',
      },
      fontFamily: {
          'fira': ['Fira Code', 'serif']
      }
  },
  },
  plugins: [],
}

