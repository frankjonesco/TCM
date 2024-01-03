/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors')

module.exports = {


	content: [

		"./resources/**/*.blade.php",
		"./resources/**/*.js",
		"./resources/**/*.vue",


	],


	theme: {

		extend: {

			colors: {

				
				// ACTION TYPE COLORS

				primary: colors.indigo,
				secondary: colors.stone,
				success: colors.green,
				danger: colors.red,
				warning: colors.yellow,
				info: colors.sky,
				action: colors.purple,
				dark: colors.black,
				light: colors.white,

    
			},


		},


	},
	

	plugins: [],

	  
	safelist: [


		// BACKGROUND POSITION

		'bg-center', 'bg-left', 'bg-right',


		// BACKGROUND COLORS

		'bg-red-700', 'bg-orange-700', 'bg-purple-700', 'bg-pink-700', 'bg-sky-700', 'bg-lime-700', 'bg-green-700', 'bg-blue-700', 'bg-teal-700', 'bg-cyan-700', 'bg-yellow-700', 'bg-amber-700', 'bg-rose-700', 'bg-violet-700',


	]
	  

}
