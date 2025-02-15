/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}"],
  theme: {
    extend: {
      keyframes: {
        slideDown: {
          '0%': { transform: 'translatey(-100%)' },
          '100%': { transform: 'translatey(0%)' },
        },
        slide: {
          '0%': { transform: 'translateX(0)' },
          '33%': { transform: 'translateX(-100%)' },
          '66%': { transform: 'translateX(-200%)' },
          '100%': { transform: 'translateX(0)' },
        },
      },
      animation: {
        slideDown: 'slideDown 0.5s ease-in-out',
        slideAuto: 'slide 9s infinite',
      }
    },
  },
  plugins: [],
}

