<?php

/*
	Template Name: Full Page, No Sidebar
*/

get_header();  ?>

<div class="main">
  <div class="container">

  	<section id="home" class="home">
	    <?php // Start the loop ?>
	    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	      <h1><?php the_title(); ?></h1>
	      <?php the_content(); ?>
	      <video autoplay loop poster="<?php bloginfo('template_url'); ?>/images/ink.png" id="bgvid">
	      	<source src="<?php bloginfo('template_url'); ?>/images/ink_water_480.mp4" type="video/mp4">
	      </video>		
	</section>
	<section id="about" class="about">
		<div class="about-content">
			<?php the_field('about'); ?>
			<div class="tool-icons"> <?php dynamic_sidebar('tool-widget-area') ?> </div>
			<div class="design-icons"> <?php dynamic_sidebar('design-widget-area') ?> </div>
			<div class="portfolio-button">
				<a href="#portfolio">
					<?php the_field('view_portfolio'); ?>
				</a>
			</div>	
		</div>
		<div class="about-header">
			<h2>About</h2>
			<div class="aboutimg-holder">
				<img src="<?php bloginfo('template_directory'); ?>/images/about-img2.jpg" alt="about-background">
			</div>

		</div>
	</section>
	<section id="portfolio" class="portfolio">
		<div class="portfolio-header">
			<h2>Portfolio</h2>
		</div>
		<?php  
		$portfolioArgs = array(
		  'post_type' => 'portfolio',
		  'posts_per_page' => 3
		); 
		$portfolioQuery = new WP_Query( $portfolioArgs );

		if($portfolioQuery->have_posts()) {
		  while($portfolioQuery->have_posts()) {
		    $portfolioQuery->the_post();
		    ?>

		    <?php if( $portfolioQuery->current_post == 0 && !is_paged() ) { //echo  pre_r($wp_query); //check if first post in loop and not on a page and do stuff
		    	/*first post*/ ?> <div class="portfolio-item first-portfolio">
		    	<?php  
		    } else { ?> <div class="portfolio-item">
 <?php } ?> <!--//otherwise its not the first and do this stuff-->
	
		    <div class="portfolio-description">
			    <h3><?php the_title(); ?></h3>
			    <h4><?php the_field('short_desc'); ?></h4>
			    <p><?php the_content(); ?></p>
			    <p><?php the_field('client_name'); ?></p>
			    <div class="technologies">
			    <?php while( has_sub_field('technology') ): ?>
			    	<div class="technology">
			    		<p><?php the_sub_field('technologies') ?></p>
			    	</div>
			    <?php endwhile; ?>
			    </div>
			    <div class="static-live">
			    	<a href="<?php the_field('live_link'); ?>" target="_blank"> <?php the_field('static_live_button'); ?></a>
			    </div>
			</div>
			<div class="portfolio-images">
			<?php while( has_sub_field('images') ): ?>
				<div class="portfolio-image">
					<p><?php the_sub_field('caption') ?></p>
					<?php $image=get_sub_field('image'); ?>

					<img src="<?php echo $image['sizes']['full'] ?>" alt="Image of portfolio work">
					<a href="<?php the_field('live_link'); ?>" target="_blank">
						<div class="view-live">
							<div class="live-button">
								<p><?php the_field('view_live'); ?></p>
							</div>
						</div>
					</a>
				</div>

			<?php endwhile; ?>
			</div>	
		</div>	
		
		    <?php
		  }
		}
	 ?>
	
 	<?php endwhile; // end the loop?> 

    </section>
    <section id="contact" class="contact">
    	<div class="contact-content">
    		<h4>Let's Collaborate
    			<div class="line"></div>
    		</h4>
    		<p>E. jo@joannawicz.com</p>
    		<div class="social-icons"> <?php dynamic_sidebar('social-widget-area') ?> </div>
    	</div>
	    <div class="contact-form">
	    	<h2>Contact</h2>
	    	<?php echo do_shortcode('[contact-form-7 id="7" title="Contact JO"]'); ?>
	    </div>
    </section>
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>