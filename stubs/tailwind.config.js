const defaultTheme = require('tailwindcss/defaultTheme');
const plugin = require("tailwindcss/plugin");
const colors = require('tailwindcss/colors');

module.exports = {
    mode: "jit",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./support/**/*.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php"
    ],
    theme: {
        extend: {
            spacing: {
                68: "17rem",
            },

            colors: {
                body: "#EBFBFF",

                primary: {
                    1000: "#001233",
                    900: "#001738",
                    800: "#002145",
                    700: "#00325A",
                    600: "#024A76",
                    500: "#056998",
                    400: "#0D8CBB",
                    300: "#1FADD8",
                    200: "#45CAED",
                    150: "#67D8F3",
                    100: "#8AE4F9",
                    50: "#BAF0FC",
                    0: "#EBFBFF"
                },

                grey: {
                    1000: "#2F3133",
                    900: "#343638",
                    800: "#404345",
                    700: "#53575A",
                    600: "#6E7376",
                    500: "#8E9598",
                    400: "#AEB7BB",
                    300: "#CBD5D8",
                    200: "#E1EAED",
                    150: "#EAF1F3",
                    100: "#F3F8F9",
                    50: "#F9FCFC",
                    0: "#FFFFFF"
                }
            },
            spacing: {
                68: "17rem",
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            maxWidth: {
                xs: "calc(100% - 64px)",
                xxl: "calc(100% - 272px)",
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        plugin(function ({ addBase, config }) {
            addBase({
                html: {
                    scrollBehavior: "smooth",
                    overflowX: "hidden",
                },
                body: {
                    color: config("theme.colors.black"),
                    backgroundColor: config("theme.colors.body"),
                    fontSize: "14px",
                    overflowX: "hidden",
                },
                "[x-cloak]": {
                    display: "none !important;",
                },
            });
        }),
    ],
};
