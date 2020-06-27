<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php $title = (get_field('title-seo')) ? get_field('title-seo') : get_bloginfo('title'); ?>
	<title><?php echo $title ?></title>

	<?php $description = (get_field('description-seo')) ? get_field('description-seo') : get_bloginfo('description') ?>
	<meta name="description" content="<?php echo $description ?>">

	<meta name="theme-color" content="#065143">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">


	<meta property="og:url" content="<?php the_permalink() ?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php the_title() ?>">
	<meta property="og:image" content="<?php asset('img/og.png') ?>">
	<meta property="og:description" content="<?php echo $description ?>">
	<meta property="og:site_name" content="<?php echo $title ?>">
	<meta property="og:locale" content="<?php echo get_locale() ?>">
	<!-- OG -->


	<!-- wp -->
	<?php wp_head(); ?>
	<!-- wp -->


</head>

<body <?php body_class(); ?> >
	<noscript>
		<p>Do pelnego funkcjonowania witryny potrzebny jest JavaScript.</p>
		<p>This page needs JavaScript activated to work properly.</p>
		<style>
			noscript {
				position: fixed;
				z-index: 123;
				background: #f00;
				text-align: center;
				width: 100%;
				display: block;
				padding: 20px 20px;
				width: 250px;
				bottom: 0;
				right: 0
			}
		</style>
	</noscript>

	<header class="header">
		<nav class="header__nav">
			<?php wp_nav_menu(['theme_location' => 'header', 'container' => false]); ?>
		</nav>

		
		<button class="menuButton">
			<span class="menuButton__container">
				<span class="menuButton__mid"></span>
			</span>
		</button>
	</header>

	<main class="main ">
