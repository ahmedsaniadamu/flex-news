module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
    './resources/views/**/*.{blade.php,js}', 
    './node_modules/tw-elements/dist/js/**/*.js'
  ],
  theme: {
    extend: {
       fontSize : {
          xs : '13px',
          nl : '15px'
       },
       spacing : {
           '28%' : '28%',
           '30%' : '30%',
           '48%' : '48%',
           '50%' : '50%',
           '70%' : '70%',
           '100%' : '100%',
       }      
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
    require('tw-elements/dist/plugin')
  ]
}
