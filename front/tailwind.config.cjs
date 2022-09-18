/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        skyblue: '#22bbea',
        orange: '#ff9933',
      },
    },
  },
  plugins: [
  ],
}
