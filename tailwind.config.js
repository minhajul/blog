/** @type {import('tailwindcss').Config} */

import forms from "@tailwindcss/forms";
import aspectRatio from "@tailwindcss/aspect-ratio";

export default {
    darkMode: 'class',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            keyframes: {
                'move-bg': {
                    to: {
                        backgroundPosition: '400% 0',
                    },
                },
            },
            animation: {
                'move-bg': 'move-bg 8s infinite linear',
            },
        },
    },
    plugins: [
        forms,
        aspectRatio
    ],
};
