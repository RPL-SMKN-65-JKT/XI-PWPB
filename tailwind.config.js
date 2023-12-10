/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                poppins: ["Poppins"],
            },
            colors: {
                "blue-primary": "#2B4DA2",
                "blue-secondary": "#e5f8ff",
                "cream-primary": "#FAD6BE",
                "cream-secondary": "#FFF0E6",
                dark: "#212529",
                "blue-dark": "#2F3E59",
                "orange-primary": "#F1883C",
                "transparent-hover": "rgba(0,0,0,0.075)",
                overlay: "rgba(0,0,0,0.1)",
            },
            boxShadow: {
                book: "6px 6px 4px 0px rgba(0, 0, 0, 0.25);",
            },
            dropShadow: {
                navbar: "0px 2px 30px rgba(0, 0, 0, 0.25)",
            },
        },
    },
    plugins: [require("tw-elements/dist/plugin.cjs")],
    darkMode: "class",
};
