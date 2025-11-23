// /var/www/html/IAP_Gig_Connector/tailwind.config.js

const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                // Set Poppins as the default sans font
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Custom brand colors matching the design
                'gig-purple': '#5b46b6',
                'gig-purple-dark': '#4a3a96',
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};