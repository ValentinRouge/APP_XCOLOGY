module.exports = {
  content: ["./dist/html/*.html","./dist/*.php","./dist/js/*.js"],
  theme: {
    extend: {
      colors:{
        'XBlueLight': '#daeaf6',
        'XBlueMiddle': '#0b8abc',
        'XBlueStrong': '#124e96',
        'XPink': '#ff008e'
      }, 
      spacing: {
        '90vh': '90vh',
      }
    },
  },
  plugins: [],
}
