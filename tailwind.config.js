import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    darkMode: "class",

    theme: {
        extend: {
            borderRadius: {
                custom: "15px",
            },
            colors: {
                primary: "#E2E8F0",
                secondary: "#001220",
                light: "#D9D9D9",
                "background-light": "#F8F7F4",
                "background-dark": "#121212",
                "text-light": "#1C1C1C",
                "text-dark": "#F8F7F4",
                "card-light": "#FFFFFF",
                "card-dark": "#1E1E1E",
                "border-light": "#E5E7EB",
                "border-dark": "#374151",
                blue: {
                    dark: "#1c338c",
                    medium: "#6888ac",
                    light: "#8384c4",
                },
                green: {
                    stratege: "#0D9F6F", // Couleur verte principale de Stratège Média
                    light: "#C1F0DB",    // Couleur de fond vert clair
                    medium: "#3CB489",    // Vert moyen pour les accents
                    dark: "#0A7853",      // Vert foncé pour le texte important
                }
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
            },
          
        },
    },

    plugins: [forms],
};
