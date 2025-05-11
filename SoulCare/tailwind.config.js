module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        // Tema warna dari gambar
        'soulcare-purple': '#ABA5E2', // Ungu muda
        'soulcare-pink': '#FFADB4',   // Merah muda
        'soulcare-yellow': '#FFE3AF', // Kuning muda
        'soulcare-cream': '#FFF3B4',  // Kuning sangat muda (cream)
      },
      fontFamily: {
        'sans': ['Nunito', 'sans-serif'],
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/line-clamp'),
  ],
}