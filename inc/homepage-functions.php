<?php


if( ! function_exists( 'homepage_quate_func' ) ) {
	function homepage_quate_func(){

		$content =	apply_filters( 'the_content',get_post_meta(get_the_ID(),'special_quate',true));
		if($content):
			?>
			<section id="special-quate-section" class="">
				<div class= "special-quate-wrap">
					<div class= "special-quate-icon"></div>
					<div class= "special-quate-inner">
						<?php echo $content; ?>
					</div>
				</div>
			</section>
			
			<?php
		endif;

	}
}

	
if ( ! function_exists( 'homepage_contactus_func' ) ) {
	function homepage_contactus_func() {


		$title =  get_post_meta(get_the_ID(),'contact_section_title',true);
		$shortcode =  get_post_meta(get_the_ID(),'form_shortcode',true);
		$content =	apply_filters( 'the_content',get_post_meta(get_the_ID(),'contact_content',true));
	

		?>
		 <section id="contact-us-section" class="">
		 		<?php if($title): ?>
						<div class="title-wrap bg-secondary"><h2 class="text-white"><?php	echo $title; ?></h2></div>
				<?php endif; ?>
			 <div class="container contact-us-container" >

				<div class="row"><!-- .row end -->
				<div class="col-lg-5"  >
						<?php if($content): ?>
							<div class="content-wrap"><?php	echo $content; ?></div>
						<?php endif; ?>
					</div>
						
					<div class="col-lg-7" >

						<div class="contact-us-wrap border-form" >
							
							<?php if($shortcode): ?>
								<?php	echo do_shortcode($shortcode); ?>
							<?php endif; ?>
							
						</div>
					</div><!-- col-md-7 end -->
					

				</div><!-- .row end -->
			
			</div><!-- Container end -->
		</section>
		<?php
		



    }
}

if ( ! function_exists( 'homepage_jobs_func' ) ) {
	function homepage_jobs_func() {


		?>
		 <section id="latest-pos-sections" class="">
			<div class="section-title-wrap"><h2 id="test-title " class="section-title"><h2 id="latest-pos" class=""><?php echo __('משרות חמות','hinit'); ?></h2></div>
				<div class="container">
				
				<div class ="row">
					<?php get_latest_jobs_func(5, 'col-md-12'); ?>
			
		
				</div> <!--row -->
			</div><!--container -->
		</section>
		<?php
		



    }
}


if ( ! function_exists( 'homepage_banner_text_func' ) ) {
	function homepage_banner_text_func(){
		//$title =  apply_filters( 'the_content',get_post_meta(get_the_ID(),'banner_title',true));
		
	
		$subtitle = get_post_meta(get_the_ID(),'banner_title',true);

		if ($subtitle){
			$title =  get_the_title().'<br/><span class="entery-sub-title">'.$subtitle.'</span>';
		}else{
			$title =  get_the_title();
		}


		?>	
			<div class="hebo_text_wrap " >
			
				<?php if ( $title ): ?>
					<h1 id="heno-title entery-title" ><?php echo $title; ?></h1>
				<?php endif; ?>
				
			</div>
		<?php
	}
}


if ( ! function_exists( 'content_video_func' ) ) {
	function content_video_func(){
		//$title =  apply_filters( 'the_content',get_post_meta(get_the_ID(),'banner_title',true));
		$video = get_post_meta(get_the_ID(),'video_in_page',true);
		
		
		if($video):
		?>	
				
			<div class="content-video-wrap" >
				<?php echo $video; ?>
			</div>
				
				
			</div>
		<?php
		
		endif;
	}
}


if ( ! function_exists( 'content_deco_func' ) ) {
	function content_deco_func(){
		//$title =  apply_filters( 'the_content',get_post_meta(get_the_ID(),'banner_title',true));
		$img = get_post_meta(get_the_ID(),'content_deco_img',true);
		$size= "large";
		
		if($img):
		?>	
			<div class="content-deco-img" style="background-image:url('<?php echo wp_get_attachment_image_src( $img , $size)[0]; ?>')" >
				
				
				
			</div>
		<?php
		
		endif;
	}
}



if ( ! function_exists( 'homepage_services_func' ) ) {
	function homepage_services_func(){

		$section_title =  get_post_meta(get_the_ID(),'services_section_title',true);
		$services = get_post_meta(get_the_ID(),'hp_process',true);

		$size = 'medium'; //'homepage-links-size'; // (thumbnail, medium, large, full or custom size)

		if($services){
			?>
			<section id="main-services">
				<div class="container">
				<?php if($section_title): ?> <h2><?php echo $section_title; ?> </h2><?php endif; ?>
				
					<ul class="services-list">
					
						

						<?php
							for( $i = 0; $i < $services; $i++ ) {

								$title= get_post_meta(get_the_ID(),'hp_process_'.$i.'_service_title',true);
							
								$image = (int) get_post_meta( get_the_ID(),'hp_process_'.$i.'_service_image',true);
								$desc = get_post_meta(get_the_ID(),'hp_process_'.$i.'_service_text',true);
								$link = get_post_meta(get_the_ID(),'hp_process_'.$i.'_service_link',true);

							
									
						?>	
					
							<li class="service-item">
								
								<div class="image-wrap">
									<?php if($link): ?><a href="<?php echo $link; ?>" aria-hidden="true"  tabindex="-1" ><?php endif; ?>
									<?php if ($image): ?>
										
											<img src="<?php echo wp_get_attachment_image_src($image,$size)[0]; ?>" alt="" >
										
									<?php endif;	?>
									<?php if($link): ?></a><?php endif; ?>
								</div>
								<div class="service-content">
									<?php if($link): ?>
										<h3><a href="<?php echo $link; ?>" ><?php if ($title) echo $title; ?></a></h3>
									<?php else: ?>
										<h3><?php if ($title) echo $title; ?></h3>
									<?php endif; ?>
									<div><?php if ($desc) echo $desc; ?></div>
								</div>
								
								

							</li>
						
						<?php
					}
					?>
						
				</ul>
				</div>
			</section>

			<?php





		}
	}
}



if ( ! function_exists( 'recent_posts_action_func' ) ) {
    function recent_posts_action_func( $cats = NULL ) {

	
		
		$title =  __( 'מאמרים אחרונים' ,'hinit');

		//$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		//if ( ! $number ) {
			$number = 3;
		//}
		//$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		/**
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args     An array of arguments used to retrieve the recent posts.
		 * @param array $instance Array of settings for the current widget.
		 */
        if ( ! isset( $args['before_title'] ) ) {
            $args['before_title'] = '<h2 class="">';
            $args['after_title'] = '</h2>';
		}   

		if ( empty( $cats) ){

			

			$r = new WP_Query( array(
				'posts_per_page'      => $number,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true,
				
			));
	
		}else{

			$r = new WP_Query( array(
				'posts_per_page'      => $number,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true,
				'category_name' => $cats,
			));
	
		}

	
		if ( ! $r->have_posts() ) {
			return;
		}
		?>

		<section id="recent-updates" >
				
			<div class="container container-recent">
				<?php
					if ( $title ) {
						echo $args['before_title'] . $title . $args['after_title'];
					}
				?>
					
					<div class="row row-recent">
						<?php foreach ( $r->posts as $recent_post ) : ?>
							<?php
							$post_title = get_the_title( $recent_post->ID );
							$title      = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)' );
							?>
							<div class="col-md-6 col-xl-4 news-item-wrap">
								<div class="news-item">
									<a href="<?php the_permalink( $recent_post->ID); ?>" class="img-link" aria-hidden="true" tabindex="-1" >
										<?php if ( has_post_thumbnail($recent_post->ID) ) { ?>
											<?php echo get_the_post_thumbnail( $recent_post->ID, 'homepage-thumb'); ?>
											
										<?php }else { ?>
											<img src="<?php  echo get_stylesheet_directory_uri(). '/img/placeholder.gif'; ?>"  alt="<?php echo $title; ?>" />
										<?php } ?>
									</a>

									<div class="news-item-content">		
										<h3 class=""><a href="<?php the_permalink( $recent_post->ID ); ?>"><?php echo $title ; ?></a></h3>
										
										<?php

										if (has_excerpt($recent_post->ID))
											$excerpt = $recent_post->post_excerpt;
										else{
											$excerpt =strip_tags( $recent_post->post_content);
										// strip_tags(apply_filters('the_content', $post->post_content));//strip_tags( $post->post_content); //(string) substr($post->post_content , 0, strpos($post->post_content," ",190));
										if(strlen($excerpt)>200)
											$excerpt = substr($excerpt , 0, strpos($excerpt," ",180));
										}
										echo '<p class="update-excerpt">'. $excerpt .'</p>';

										?>
										
									</div>
									<div class="news-item-readmore">	
										<a href="<?php the_permalink( $recent_post->ID); ?>" class="readmore"><?php echo __('המשיכו לקרוא','arameng'); ?><span aria-hidden="true"> >> </span></a>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php
					$link =  get_post_meta( get_the_ID(), 'blog_link', true ) ;
		
		
					if( $link ):
						
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<div class="section-link-wrap"><a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>" class="button"><?php echo $link_title; ?></a></div>
						<?php
					endif;	

					
		
					?>
				</section>
        <?php
    }
  
}



add_action("homepage_hebo_actions",'homepage_banner_text_func',20);

add_action("homepage_content_deco_actions","content_video_func",10) ;

/*
add_action("homepage_actions",'homepage_soltions_func',10);
add_action("homepage_actions",'homepage_the_services_func',20);
add_action("homepage_actions","homepage_database_section_func",30);

add_action("homepage_actions","homepage_testimonials_func",20);
add_action("homepage_actions","recent_posts_action_func",30);*/

//add_action("homepage_pre_content_actions","search_position_section_func",10);
//add_action("homepage_pre_content_actions","positions_categories_list_func",20);

add_action("homepage_actions","homepage_services_func",30);

add_action("homepage_actions","homepage_quate_func",40);

//add_action("homepage_actions","clients_logo_gallery_func",60);

add_action("homepage_actions","homepage_contactus_func",50);

add_action("homepage_actions","page_testimonials_func",60 );

add_action("homepage_actions","recent_posts_action_func",70);

add_action("homepage_actions","page_footer_slogen",80);

add_action("homepage_actions","whatsapp_floating_button",90);





