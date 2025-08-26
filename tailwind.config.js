// tailwind.config.js
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
        'palette-1': "#DDCBB7",
        'palette-2': "#7B4B36",
        'palette-3': "#264025",
        'palette-4': "#82896E",
        'palette-5': "#AD6B4B"
      },
      keyframes: {
        typewriter: {
          '0%': { width: '0ch' },
          '40%': { width: '38ch' },  
          '60%': { width: '38ch' },   
          '100%': { width: '0ch' },  
        },
      },
      animation: {
        typewriter: 'typewriter 6s steps(38) infinite',
      },
    },
  },
  plugins: [require('tailwindcss-motion')],
}
