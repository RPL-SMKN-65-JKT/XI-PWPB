/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                primary: "#2B2B2B",
                secondary: "#FFEC39",
            },
        },
    },
    plugins: [require("tw-elements/dist/plugin.cjs")],
};
