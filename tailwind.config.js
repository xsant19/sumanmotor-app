/** @type {import('tailwindcss').Config} */
const withMT = require("@material-tailwind/html/utils/withMT");

module.exports =
    withMT( {
        content: [
            "./resources/**/*.blade.php",
            "./resources/**/*.js",
            "./resources/**/*.vue",
        ],
        theme: {
            extend: {
                boxShadow: {
                sm: "0 2px 4px 0 rgb(0 0 0 / 0.05)",
                // rest of the box shadow values
                },
                            colors: {
                    blueGray: {
                        50: "##cfd8dc",
                        100: "#f1f5f9",
                        200: "#eeeeee",
                        300: "#e0e0e0",
                        400: "#94a3b8",
                        500: "#cfd8dc",
                        600: "#475569",
                        700: "#334155",
                        800: "#78909c",
                        900: "#607d8b",
                    },
                },
            },
        },
        plugins: [],
    }
)
