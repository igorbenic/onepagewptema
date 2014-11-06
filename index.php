<?php get_header(); ?>

<div class="jumbotron">
	<div class="container">
		<h1 class="slider_title"><?php echo get_option('lakoonepage_welcomeTitle'); ?></h1>
		<p class="animated bounceInLeft slider_text"><?php echo get_option('lakoonepage_welcomeText'); ?></p>
	</div>
</div>

<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		//
		// Post Content here
		//
?>
<div id="about" class="section">
	<div class="container">
		<h2 class="section-title"><?php the_title(); ?></h2>
		<div class="row">
			<div class="col-sm-6">
			<?php the_content(); ?>
			</div>
			<div class="col-sm-6">
				
				<ul class="list-unstyled">
					<li>
						<strong class="raleway">CSS3</strong>
				<div class="progress">
				  <div class="progress-bar bar-green" role="progressbar" aria-valuenow="<?php the_field( "css_skill" ); ?>" aria-valuemin="0" aria-valuemax="100" >
				    <span class="sr-only"><?php the_field( "css_skill" ); ?> Complete</span>
				  </div>
				</div>
					</li>

					<li>
						<strong class="raleway">HTML5</strong>
				<div class="progress">
				  <div class="progress-bar bar-orange" role="progressbar" aria-valuenow="<?php the_field( "html5_skill" ); ?>" aria-valuemin="0" aria-valuemax="100" >
				    <span class="sr-only"><?php the_field( "html5_skill" ); ?> Complete</span>
				  </div>
				</div>
					</li>

					<li>
						<strong class="raleway">PHP</strong>
				<div class="progress">
				  <div class="progress-bar bar-black" role="progressbar" aria-valuenow="<?php the_field( "php_skill" ); ?>" aria-valuemin="0" aria-valuemax="100" >
				    <span class="sr-only"><?php the_field( "php_skill" ); ?> Complete</span>
				  </div>
				</div>
					</li>
				</ul>
				
			</div>
		</div>
	</div>
</div>
<?php 	} // end while
} // end if
?>

<?php 
	$portfolio_args = array(
		'post_type' => 'attachment',
		'posts_per_page' => 100,
		'tax_query' => array(
		array(
			'taxonomy' => 'mediacategory',
			'field'    => 'slug',
			'terms'    => 'portfolio',
		),
	));

	$portfolio_media = get_posts($portfolio_args);
	if($portfolio_media){ ?>
<div id="portfolio" class="section">
	<div class="container">
		<h2 class="section-title">Portfolio</h2>
		<div class="row">
			<div id="portfolio-carousel" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <?php 

			  $totalCount = count($portfolio_media); 
			   $itemRows = ceil($totalCount / 4);

			  ?>
			  <ol class="carousel-indicators">
			  <?php for($i = 0; $i < $itemRows; $i++){
			  	    $activeControl = "";
			  	    if($i == 0){
			  	    	$activeControl = "class='active'";
			  	    }
			  		echo '<li data-target="#portfolio-carousel" data-slide-to="'.$i.'" '.$activeControl.'></li>';
			  	}
			  ?>
			    
			    
			   
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner">
		<?php
		$item_count = 0;
		foreach ($portfolio_media as $portfolio) {
			if($item_count == 0 || $item_count % 4 == 0){
				$activeClass = "";
				if($item_count == 0){
					$activeClass = "active";
				}
				echo '<div class="item '.$activeClass.' row">';
			}

			?>
				<div class="col-xs-6 col-md-3 portfolio-projekt">
				    <a data-title="<?php echo $portfolio->post_title; ?>" href="<?php echo wp_get_attachment_image_src( $portfolio->ID, 'image_md' )[0];?>" class="thumbnail" data-toggle="lightbox">
				      <img src="<?php echo wp_get_attachment_image_src( $portfolio->ID, 'image_xs' )[0]; ?>" width="300" height="135" alt="Projekt Planine">
				      <span class="portfolio-projekt_title"><?php echo $portfolio->post_title; ?></span>
				    </a>
				  </div>

			<?php
	    	

	    	if(($item_count - 3) % 4 == 0){
				echo '</div>';
			}

	    	$item_count++;
	    }
        ?>
			 </div>

			  
			</div>
			</div>
		</div>
	</div>
</div>
<?php
	}
  
?>

<?php 
	$testimonials_args = array(
		'post_type' => 'testimonials',
		'posts_per_page' => 2,
		'meta_key' => 'show_on_front',
		'meta_value' => true
	);

	$testimonials = get_posts($testimonials_args);
	if($testimonials){ ?> 

	
<div id="testimonials" class="section">
	<div class="container">
		<div class="row">
		<?php foreach ($testimonials as $testimonial) { ?>
			<div class="col-sm-6 col-xs-12">
				<div class="media">
				 
	<?php echo get_the_post_thumbnail(  $testimonial->ID, array(50,50),array(
														
														'class'	=> "media-object pull-left",
	
										) );
										?>
				
				  <div class="media-body">
				   <p><em>
				    <?php echo $testimonial->post_content; ?>
				    </em>
				     </p>
				    <small><strong><?php the_field('name', $testimonial->ID); ?>, <?php the_field('position', $testimonial->ID); ?></strong></small>
				  </div>
				</div>
			</div>

			<?php } ?>
			
		</div>
	</div>
</div>
<?php } ?>



<div id="contact" class="section">
	<div class="container">
	<h2 class="section-title">Contact</h2>
		<div class="row">
			<div class="col-sm-7">
				<?php dynamic_sidebar( 'contact-left' ); ?>
			</div>
			<div class="col-sm-5">
			    <?php dynamic_sidebar( 'contact-right' ); ?>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>
