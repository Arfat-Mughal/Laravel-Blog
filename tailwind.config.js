module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./app/**/*.php",
    "./storage/framework/views/*.php",
    "./config/*.php",
  ],
  theme: {
    extend: {
      // Add your custom animations
      animation: {
        'fadeInUp': 'fadeInUp 0.6s ease-out',
        'fadeInDown': 'fadeInDown 0.6s ease-out',
        'fadeInLeft': 'fadeInLeft 0.6s ease-out',
        'fadeInRight': 'fadeInRight 0.6s ease-out',
        'scaleIn': 'scaleIn 0.4s ease-out',
        'slideInUp': 'slideInUp 0.5s ease-out',
        'float': 'float 6s ease-in-out infinite',
        'glow': 'glow 2s ease-in-out infinite alternate',
        'gradient': 'gradient 15s ease infinite',
        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
      },
      // Add backdrop blur utilities
      backdropBlur: {
        xs: '2px',
        sm: '4px',
        md: '8px',
        lg: '12px',
        xl: '16px',
      },
      // Add custom box shadows
      boxShadow: {
        'light': '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
        'medium': '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
        'heavy': '0 25px 50px -12px rgba(0, 0, 0, 0.25)',
      },
      // Extend other utilities as needed
      aspectRatio: {
        '16/9': '16 / 9',
        '4/3': '4 / 3',
        '1/1': '1 / 1',
      },
    },
  },
  plugins: [],
  // Add if you want to support dark mode
  darkMode: 'class',
}