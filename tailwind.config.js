/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.php", "./**/*.php"],
  safelist: ["w-3/5"],
  theme: {
    extend: {
      fontFamily: {
        urbanist: ["Urbanist", "sans-serif"],
      },
      colors: {
        theme_bg_light_yellow: "#FFFDF6",
        theme_gray: "#EEF0F0",
        theme_orange: "#F57141",
        theme_dim_gray: "#5D5F5F",
        theme_green: "#225E56",
        theme_light_green: "#BFFBF3",
        theme_border_gray: "#DFDFDF",
      },
    },
    screens: {
      "3xl": { max: "1700px" },
      "2xl": { max: "1550px" },
      xl: { max: "1279px" },
      "2lg": { max: "1150px" },

      lg: { max: "1023px" },

      md: { max: "767px" },

      sm: { max: "639px" },
      xs: { max: "450px" },
    },
  },
  plugins: [],
};
