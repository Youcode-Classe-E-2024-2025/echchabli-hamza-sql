/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './index.php', 
    './header.php',              // Include root HTML file
    './js/script.js',  // Include all HTML files in 'pages' directory and subdirectories
    ],
  theme: {
    extend: {},
  },
  plugins: [],
}

