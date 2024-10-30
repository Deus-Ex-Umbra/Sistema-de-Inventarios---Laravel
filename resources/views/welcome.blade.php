<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            * {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

body {
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	background: #25335b;
}

@keyframes animate {
	0% {
		filter: hue-rotate(0deg);
	}
	100% {
		filter: hue-rotate(360deg);
	}
}

.container {
	position: relative;
	top: -80px;
	transform: skewY(-20deg);
	animation: animate 5s linear infinite;
	.cube {
		position: relative;
		z-index: 2;
		&:nth-child(2) {
			z-index: 1;
			translate: -60px -60px;
		}
		&:nth-child(3) {
			z-index: 3;
			translate: 60px 60px;
		}
		div {
			position: absolute;
			display: flex;
			flex-direction: column;
			gap: 30px;
			translate: calc(-70px * var(--x)) calc(-60px * var(--y));
			span {
				position: relative;
				display: inline-block;
				width: 50px;
				height: 50px;
				background: #dcdcdc;
				z-index: calc(1 * var(--i));
				transition: 1.5s;
				&:hover {
					transition: 0s;
					background: #ef4149;
					filter: drop-shadow(0 0 30px #ef4149);
					&:before, 
					&:after {
						transition: 0s;
						background: #ef4149;
					}
				}
				&:before {
					content: "";
					position: absolute;
					left: -40px;
					width: 40px;
					height: 100%;
					background: #fff;
					transform-origin: right;
					transform: skewY(45deg);
					transition: 1.5s;
				}
				&:after {
					content: "";
					position: absolute;
					top: -40px;
					left: 0px;
					width: 100%;
					height: 40px;
					background: #f2f2f2;
					transform-origin: bottom;
					transform: skewX(45deg);
					transition: 1.5s;
				}
			}
		}
	}
}

/* From Uiverse.io by alexruix */ 
.card {
 width: 500px;
 height: 580px;
 background: #f5f5f5;
 padding: 2rem 1.5rem;
 transition: box-shadow .3s ease, transform .2s ease;
}

.card-info {
 display: flex;
 flex-direction: column;
 justify-content: center;
 align-items: center;
 transition: transform .2s ease, opacity .2s ease;
}

/*Image*/
.card-avatar {
 --size: 60px;
 background: linear-gradient(to top, #f1e1c1 0%, #fcbc97 100%);
 width: var(--size);
 height: var(--size);
 border-radius: 50%;
 transition: transform .2s ease;
 margin-bottom: 1rem;
}


/*Card footer*/
.card-social {
 transform: translateY(200%);
 display: flex;
 flex-direction: column;
 justify-content: space-around;
 width: 100%;
 opacity: 0;
 transition: transform .2s ease, opacity .2s ease;
 margin-top: 150px;
 text-align: center;
 list-style-type: none;
}

.card-social__item {
 list-style: none;
}

.card-social__item svg {
 display: block;
 height: 18px;
 width: 18px;
 fill: #515F65;
 cursor: pointer;
 transition: fill 0.2s ease ,transform 0.2s ease;
}

/*Text*/
.card-title {
 color: #333;
 font-size: 1.8em;
 font-weight: 600;
 line-height: 3rem;
 margin-top: 200px;
}

.card-subtitle {
 color: #859ba8;
 font-size: 0.8em;
}

/*Hover*/
.card:hover {
 box-shadow: 0 8px 50px #23232333;
}

.card:hover .card-info {
 transform: translateY(-5%);
}

.card:hover .card-social {
 transform: translateY(100%);
 opacity: 1;
}

.card-social__item svg:hover {
 fill: #232323;
 transform: scale(1.1);
}

.card-avatar:hover {
 transform: scale(1.1);
}

.btn-inventario{
    padding: 12px;
    width: 150px;
    background-color: boolval;
    border-radius: 15px;
}
        </style>

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            
        @endif
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        
    </body>
</html>


        <div class="card">
        <div class="card-info">
        <div class="container">
	<div class="cube">
		<div style="--x:-1; --y:0;">
			<span style="--i:3;"></span>
			<span style="--i:2;"></span>
			<span style="--i:1;"></span>
		</div>
		<div style="--x:0; --y:0;">
			<span style="--i:3;"></span>
			<span style="--i:2;"></span>
			<span style="--i:1;"></span>
		</div>
		<div style="--x:1; --y:0;">
			<span style="--i:3;"></span>
			<span style="--i:2;"></span>
			<span style="--i:1;"></span>
		</div>
	</div>
	<div class="cube">
		<div style="--x:-1; --y:0;">
			<span style="--i:3;"></span>
			<span style="--i:2;"></span>
			<span style="--i:1;"></span>
		</div>
		<div style="--x:0; --y:0;">
			<span style="--i:3;"></span>
			<span style="--i:2;"></span>
			<span style="--i:1;"></span>
		</div>
		<div style="--x:1; --y:0;">
			<span style="--i:3;"></span>
			<span style="--i:2;"></span>
			<span style="--i:1;"></span>
		</div>
	</div>
	<div class="cube">
		<div style="--x:-1; --y:0;">
			<span style="--i:3;"></span>
			<span style="--i:2;"></span>
			<span style="--i:1;"></span>
		</div>
		<div style="--x:0; --y:0;">
			<span style="--i:3;"></span>
			<span style="--i:2;"></span>
			<span style="--i:1;"></span>
		</div>
		<div style="--x:1; --y:0;">
			<span style="--i:3;"></span>
			<span style="--i:2;"></span>
			<span style="--i:1;"></span>
		</div>
	</div>
</div>  <div class="card-title">Bienvenidos a nuestro Inventario</div>
        </div>
        <ul class="card-social">
        <li class="card-social__item">
        <a href="{{ route('inventario.index') }}" class="text-sm text-[#FF2D20] hover:text-[#FF2D20]/70 dark:text-white dark:hover:text-white/70">
        <button class="btn-inventario">
            Ver el Inventarios
        </button>
        </a>
    </li>
  </ul>
</div>

