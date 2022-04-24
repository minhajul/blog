module.exports = {
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
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio')
    ],
};
