module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      extend: {

        noSpinners: {
          'input[type=number]': {

            appearance: 'none',
            '-moz-appearance': 'textfield',
            '&::-webkit-inner-spin-button': {
              appearance: 'none',
            },
            '&::-webkit-outer-spin-button': {
              appearance: 'none',
            }
          }
        }
      }
    },
    plugins: [
      require('flowbite/plugin'),

      function ({ addUtilities }) {
        addUtilities({
          '.no-spinners': {
            '-moz-appearance': 'textfield',
            '-webkit-appearance': 'none',
            '&::-webkit-inner-spin-button': {
              '-webkit-appearance': 'none',
              'margin': 0,
            },
            '&::-webkit-outer-spin-button': {
              '-webkit-appearance': 'none',
              'margin': 0,
            },
          },
        });
      }
    ],
  }
