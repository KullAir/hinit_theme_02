<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class("job_item col-md-12"); ?> id="post-<?php the_ID(); ?>">
	<div class="job_wrap" >

	<?php

		$jobcats = get_the_terms( $post->ID, 'positions_categories' );
		$color= "none";
		$image = 0;
		$size = 'thumbnail';
		$jobregion_name ='';

		if ($jobcats) {
		
			$cat = $jobcats[0];
			//foreach($jobcats as $cat) {
				

			$cateID = $cat->term_id;
			$color=  get_metadata( 'term' ,$cateID, 'cat_color' , true );

			$image_id = get_metadata( 'term' ,$cateID, 'cat_icon' , true );

			$image = wp_get_attachment_image_src( $image_id , $size)[0];

			// } 
		}

		$job_num = get_post_meta( $post->ID, 'position_number', true );

		$jobregion = get_the_terms( $post->ID, 'positions_regions' );
		
		if ($jobregion) {

			$jobregion_name = $jobregion[0]->name;

		}

	?>


	<div class="icon-wrap" <?php if( $color !='none'): ?>style="background:<?php echo $color ?>" <?php endif; ?> >
		<?php if($image): ?>
            <img src="<?php echo $image; ?>"  width="46px" height="46px" alt="$cat->name" >
        <?php endif; ?>
		<div>
			<?php 
                /*
				$url = esc_url(get_the_permalink()).'/#job-item-'.$i   ;
                echo social_div_parser($url, $title);
				*/
				echo social_div_parser(esc_url(get_the_permalink()), get_the_title());
                            
            ?>
		
		</div>

	</div>

	<div class="job-inner" >
		<header class="entry-header job-name">
		
			<?php
			the_title(
				sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark"><span>%s</span>', esc_url( get_permalink() ) , __('משרה', 'hinit').' '.$job_num.': '  ),'</a></h2>'
			);
			?>

		</header><!-- .entry-header -->

		<div class="entry-content job-body">

			<?php 
			
				the_excerpt();
				
			
			?>

			<?php
			/*
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'hinit' ),
					'after'  => '</div>',
				)

				<i class="fa fa-briefcase" aria-hidden="true"></i>
			);*/
			?>

		</div><!-- .entry-content -->
		<div class="entry-buttons job-buttons">
			<?php  if ($jobregion_name != ''): ?>
			<div class="region-wrap ">
				<div class="region btn"><span class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span><?php echo $jobregion_name ?></div>
			</div>
			<?php endif; ?>
			<button type="button" class="btn btn-primary btn-cv" data-toggle="modal" data-target="#SendCVModal" data-jobnum="<?php echo $job_num; ?>">
				<span class="icon"><i class="fa fa-hand-o-left" aria-hidden="true"></span></i><?php echo __('להגשת מעומדות','toppcik'); ?>
			</button>
		</div>

		
	</div><!-- .job_wrap-->

</article><!-- #post-## -->
