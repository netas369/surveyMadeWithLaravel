/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/views/dashboard/index.blade.php",
      "./resources/views/dashboard/reviews.blade.php",
      "./resources/views/dashboard/show.blade.php"
  ],

    theme: {
    extend: {},
  },
  plugins: [],
}
// tailwind.config.js
module.exports = {
    theme: {
        // ...
    },
    plugins: [
        require('@tailwindcss/forms'),
        // ...
    ],
}

