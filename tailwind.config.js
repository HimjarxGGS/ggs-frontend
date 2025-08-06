/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'palette-1' : "#DDCBB7",
        'palette-2' : '#7B4B36',
        'palette-3' : '#264025',
        'palette-4' : '#82896E',
        'palette-5' : '#AD6B4B'
      },
    },
  },
  plugins: [],
}

