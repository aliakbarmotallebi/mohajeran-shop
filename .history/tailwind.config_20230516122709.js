const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            flex: {
                3: 3
            },
            fontFamily: {
                'iran': ['IRANSansX'],
            },
            colors: {
                ...colors,
                theme: {
                    1: "#1C3FAA",
                    2: "#F1F5F8",
                    3: "#2E51BB",
                    4: "#3151BC",
                    5: "#DEE7EF",
                    6: "#D32929",
                    7: "#365A74",
                    8: "#D2DFEA",
                    9: "#91C714",
                    10: "#3160D8",
                    11: "#F78B00",
                    12: "#FBC500",
                    13: "#7F9EB9",
                    14: "#E6F3FF",
                    15: "#8DA9BE",
                    16: "#607F96",
                    17: "#FFEFD9",
                    18: "#D8F8BC",
                    19: "#2449AF",
                    20: "#395EC1",
                    21: "#C6D4FD",
                    22: "#E8EEFF",
                    23: "#1A389F",
                    24: "#142C91",
                    25: "#C7D2FF",
                    26: "#15329A",
                    27: "#203FAD",
                    28: "#BBC8FD",
                    29: "#284EB2",
                    30: "#98AFF5",
                    31: "#E2E8F0",
                    32: "#EDF2F7",
                    33: "#718096",
                    'light-gray': '#d9d9d9',
                    'light-red': '#ff4d4f',
                },
            },
            margin: {
                '4px': '0.25rem',
            }
        },
    },
    plugins: [],
}