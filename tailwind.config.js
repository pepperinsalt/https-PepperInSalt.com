import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans:  ['Plus Jakarta Sans', ...defaultTheme.fontFamily.sans],
                serif: ['Playfair Display', ...defaultTheme.fontFamily.serif],
                mono:  ['JetBrains Mono', ...defaultTheme.fontFamily.mono],
            },
            colors: {
                ink:    '#0D0A07',
                cream:  '#FAF7F0',
                pepper: {
                    DEFAULT: '#D63535',
                    light:   '#FF5252',
                    dark:    '#A01F1F',
                },
                saffron: '#FF8C00',
                lime:    '#A8D520',
                violet:  '#7B4FD4',
                sky:     '#38BDF8',
                coral:   '#FF6B6B',
                gold:    '#FFD166',
            },
            backgroundImage: {
                'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
            },
            animation: {
                'marquee':     'marquee 30s linear infinite',
                'marquee2':    'marquee2 30s linear infinite',
                'float':       'float 6s ease-in-out infinite',
                'pulse-slow':  'pulse 4s cubic-bezier(0.4,0,0.6,1) infinite',
                'spin-slow':   'spin 20s linear infinite',
            },
            keyframes: {
                marquee:  { '0%': { transform: 'translateX(0%)' }, '100%': { transform: 'translateX(-100%)' } },
                marquee2: { '0%': { transform: 'translateX(100%)' }, '100%': { transform: 'translateX(0%)' } },
                float:    { '0%,100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-16px)' } },
            },
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
};
