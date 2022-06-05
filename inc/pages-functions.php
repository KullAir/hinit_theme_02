<?php


if ( ! function_exists( 'services_page_process_func' ) ) {
	function services_page_process_func(){

		$process = get_post_meta(get_the_ID(),'process',true);
		if($process){
			?>
			<section id="main-process">
				<div class= "container">
					<div class= "row">

			<?php
					for( $i = 0; $i < $process; $i++ ) {

						$title= get_post_meta(get_the_ID(),'process_'.$i.'_ptitle',true);
						$desc = get_post_meta(get_the_ID(),'process_'.$i.'_ptext',true);
                        $image = (int) get_post_meta( get_the_ID(),'process_'.$i.'_pimage',true);
						//$desc = short_segment($desc,360);


						
						?>	
						<div class = "col-lg-4 process-col">
                            <div class= "process-wrap">

                                <?php if ($image): ?>
                                    <div class="image-wrap">
                                        <img src="<?php echo wp_get_attachment_image_src($image,$size)[0]; ?>" alt="" aria-hidden="true" >
                                    </div>
                                <?php endif;	?>
                                <h3><?php if ($title) echo $title; ?></h3>
                                <div class="desc"><?php if ($desc) echo $desc; ?></div>
                                

                            </div>
                        </div>
					<?php	}	?>
					</div>
				</div>

		
			</section>

			<?php

        }


	}
}

//footer_slogen

if ( ! function_exists( 'page_footer_slogen' ) ) {
    function page_footer_slogen( ) {

        $slogen  = get_post_meta( get_the_ID(), 'footer_slogen', true );
     
        if($slogen):
        ?>
        <section id="footer_slogen">
            <div class="footer_slogen_wrap">
               
                <div class="h2" class="the-slogen"><?php echo $slogen; ?></div>
            </div>
        </section>
        <?php
        endif;
    }


}

if ( ! function_exists( 'spcieal_contact_button' ) ) {
	function spcieal_contact_button( $first_text = '', $second_text = ''  )  {
        if (empty($first_text)){
            $first_text =  __("אני כאן בשבילכם לכל שאלה","hinit");
        }

        if (empty($second_text)){
            $second_text = __("לקביעת פגישה ללא עלות - צרו קשר","hinit");
        }

    ?>
    <div class="spcieal-contact-button-wrap" id="spcieal-contact-button">

        <button type="button" class="spcieal-contact-button" data-toggle="modal" data-target="#SendCVModal">
            <div class="first"><?php echo  $first_text; ?></div>
            <div class="secound"><?php echo   $second_text; ?></div>
        </button>
    </div>
    <?php
    }
}

if ( ! function_exists( 'services_first_spcieal_contact_button' ) ) {
	function services_first_spcieal_contact_button()  {

        $top = get_post_meta(get_the_ID(),'first_top_text',true);
        $bottom= get_post_meta(get_the_ID(),'first_bottom_text',true);

        spcieal_contact_button( $top,$bottom );


    }
}

if ( ! function_exists( 'services_second_spcieal_contact_button' ) ) {
	function services_second_spcieal_contact_button( )  {

        $top = get_post_meta(get_the_ID(),'second_top_text',true);
        $bottom= get_post_meta(get_the_ID(),'second_bottom_text',true);

        spcieal_contact_button( $top,$bottom );

    

    }
}


if ( ! function_exists( 'about_page_values_func' ) ) {
	function about_page_values_func(){

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
													
									
						?>	
					
							<li class="service-item">
								
								<div class="image-wrap">
									<?php if ($image): ?>
										
											<img src="<?php echo wp_get_attachment_image_src($image,$size)[0]; ?>" alt="" aria-hidden="true" >
										
									<?php endif;	?>
								</div>
								<div class="service-content">
									<h3><?php if ($title) echo $title; ?></h3>
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



if ( ! function_exists( 'services_page_servies_func' ) ) {
	function services_page_servies_func(){

		$section_title =  get_post_meta(get_the_ID(),'services_section_title',true);
        $services_desc = apply_filters( 'the_content',get_post_meta(get_the_ID(),'services_section_text',true));
		$services = get_post_meta(get_the_ID(),'hp_process',true);

		$size = 'medium'; //'homepage-links-size'; // (thumbnail, medium, large, full or custom size)

		if($services){
			?>
			<section id="main-services">
				<div class="container">
				<?php if( $section_title ): ?> <h2><?php echo $section_title; ?> </h2><?php endif; ?>
                <?php if( $services_desc ): ?> <div class="services-desc"><?php echo  $services_desc; ?></div><?php endif; ?>
				
					<ul class="services-list">
					
						

						<?php
							for( $i = 0; $i < $services; $i++ ) {

								$title= get_post_meta(get_the_ID(),'hp_process_'.$i.'_service_title',true);
							
								$image = (int) get_post_meta( get_the_ID(),'hp_process_'.$i.'_service_image',true);
								$desc =  apply_filters( 'the_content', get_post_meta(get_the_ID(),'hp_process_'.$i.'_service_text',true));
													
									
						?>	
					
							<li class="service-item" id="services<?php echo $i; ?>" tabindex="-1" >
								
								<div class="image-wrap">
									<?php if ($image): ?>
										
											<img src="<?php echo wp_get_attachment_image_src($image,$size)[0]; ?>" alt="" aria-hidden="true" >
										
									<?php endif;	?>
								</div>
								<div class="service-content">
									<h3><?php if ($title) echo $title; ?></h3>
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


/*
if ( ! function_exists( 'clients_logo_gallery_func' ) ) {
	function clients_logo_gallery_func() {
       // $images = get_field('logo_gallery');
        
        $images  = get_post_meta( get_the_ID(), 'logo_gallery', true );

        $size = 'thumbnail'; //'tiny-height'; // (thumbnail, medium, large, full,'medium-height' or custom size) 

        ?>
		<section id="clients-gallery" >
            <div class="container container-cleints">
                <h2 id="gallery" class=""><?php echo __('בין לקוחותינו','hinit'); ?></h2>
                <div class="row">
                    <div class="col">
                        <?php
                            if( $images ):
                        
                                ?> 
                                <div id="logo-slider" class="logo-slider" >
                                <?php
                                    foreach( $images as $image_id ):
                                        ?>
                                        <div class="image_container">
                                            <div class="image_wrap">
                                                <?php
                                                echo  wp_get_attachment_image( $image_id, $size );
                                                ?>
                                            </div>
                                        </div>
                                        <?php
                                    
                                endforeach;
                                ?>
                                </div>
                                <?php
                            endif;
                        ?>
                    </div>
                </div>
            </div>
	    </section>

	    <?php

    }
}*/



if ( ! function_exists( 'page_testimonials_func' ) ) {
	function page_testimonials_func() {

        
		//$testimonials = get_post_meta(get_the_ID(),'testimonials',true);
        $size = 'medium'; //'homepage-links-size'; // (thumbnail, medium, large, full or custom size)
        
        $term = term_exists('homepage', 'post_tag');
        if (post_type_exists( 'testimonials' )){

            if ($term !== 0 && $term !== null) {
                $args = array( 'posts_per_page' => 4, 'post_type'   => 'testimonials', 'tag'=> 'homepage' );
            }else{
                $args = array( 'posts_per_page' => 4, 'post_type'   => 'testimonials' );
            }
        
        
        }else{
           // $args = array( 'posts_per_page' => 4,  'category_name' 	=> 	'testimonials' , 'tag'=> 'homepage');
          
            if ($term !== 0 && $term !== null) {
                
                $args = array( 'posts_per_page' => 4,  'category_name' 	=> 	'testimonials' , 'tag'=> 'homepage');
            } else {
                $args = array( 'posts_per_page' => 4,  'category_name' 	=> 	'testimonials' );
            }
           
        }
           
        
		$loop = get_posts( $args );

		//if($testimonials):

        ?>
        <section id="testimonials-sections" >

            <div class="testi-title-wrap">
                        <h2 id="test-title" ><?php  echo __('testemonials','hinit'); ?></h2>
                    
            </div>
            <div class="container slider-wrap" >     
                <div class="row">
                
                <div class="col-lg-12">
                    <div class="inner-col-testimonials">
                        <div id="testimonials-slider" class="single-testem"  >
                        
                            <?php             
                            

                            foreach ( $loop as $post ): 
                                
                                //for( $i = 0; $i < $testimonials; $i++ ) {

                                    //$title= get_post_meta(get_the_ID(),'testimonials_'.$i.'_testimonial_title',true);
                                   // $desc = // get_post_meta(get_the_ID(),'testimonials_'.$i.'_testimonials_text',true);
                                    
                                    if (has_excerpt($post->ID))
                                            $desc= $post->post_excerpt;
                                    else{
                                           
                                       // $desc="no expert";
                                       
                                        $desc =strip_tags( $post->post_content);
                                        // strip_tags(apply_filters('the_content', $post->post_content));//strip_tags( $post->post_content); //(string) substr($post->post_content , 0, strpos($post->post_content," ",190));
                                        if(strlen($desc)>200) $desc = substr( $desc , 0, strpos( $desc," ",180));
                                    }

                                    $class = "";
                                    
                                    ?>                                    
                                    <div class="front_holder">
                                        <div class="front_holder_inner">


                                            <?php if ( has_post_thumbnail($post->ID) ) : 
											  
                                                 $class = "hasimage"
                                                ?>
                                                <div class="image-wrap col-md-3">
                                                    <?php echo get_the_post_thumbnail( $post->ID, 'size'); ?>   
                                                
                                                </div>
                                            <?php
                                        
                                                endif;	?>
                                            <div class="testem-wrap col <?php echo $class; ?>">
                                        
                                                <div class="testem-content "><?php echo $desc ?></div>
                                                <div class="testem-name"><?php echo $post->post_title; ?></div>
                                            </div>
                                    
                                        </div>
                                    </div>
                                <?php
                                //} //end for loop
                            endforeach;	
                            ?>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
            </div><!-- container -->
        </section>
        <?php
      //  endif; 

    }
}



if ( ! function_exists( 'candidates_benefits_func' ) ) {
	function candidates_benefits_func() {

      
        $benefits = get_post_meta(get_the_ID(),'benefits',true);
        $size="thumbnail";

        if($benefits):
        ?>
            <ul class="candidates-benefits">
        <?php
            for( $i = 0; $i < $benefits; $i++ ) {

                $content= get_post_meta(get_the_ID(),'benefits_'.$i.'_benefits_text',true);             
                $image = (int) get_post_meta( get_the_ID(),'benefits_'.$i.'_benefits_icon',true);


            ?>
                <li class="benefit-item">
                    <div class="image-wrap">
						<img src="<?php echo wp_get_attachment_image_src($image,$size)[0]; ?>" alt="" aria-hidden="true" >
					</div>
                    <div class="text-wrap">
                     <?php if ( $content) echo  $content; ?>
                     </div>
                </li>

            <?php
            } //and for loop
            ?>
            </ul>
            <?php
        endif;

    }
}


if ( ! function_exists( 'candidates_page_special_link' ) ) {
	function candidates_page_special_link() {

        
    $link =  get_post_meta( get_the_ID(), 'special_link', true ) ;
	
		
    if( $link ):
    
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
          <div class="section-link-wrap"><a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>" class="special-link"><?php echo $link_title; ?></a></div>
        <?php
    endif;	

    }
}
/**
 * 
 *  About Page Function
 * 
*/


if ( ! function_exists( 'page_values_func' ) ) {
	function page_values_func(){
	
		$services = get_post_meta(get_the_ID(),'hp_process',true);
        $title = get_post_meta(get_the_ID(),'values-title',true);
		$size = 'medium'; //'homepage-links-size'; // (thumbnail, medium, large, full or custom size)

		if($services){
			?>
			<div id="main-values">
                <h2><?php echo $title; ?></h2>
				<!--div class= "container" -->
					<div class= "row-values justify-content-center">

					<?php
						for( $i = 0; $i < $services; $i++ ) {

							$title= get_post_meta(get_the_ID(),'hp_process_'.$i.'_service_title',true);
							//$desc = get_post_meta(get_the_ID(),'hp_process_'.$i.'_service_text',true);
							$image = (int) get_post_meta( get_the_ID(),'hp_process_'.$i.'_service_image',true);
								
					?>	
					<div class = "col-4 col-sm-2 process-col">
						<div class= "process-wrap">

							<?php if ($image): ?>
								<div class="image-wrap">
									<img src="<?php echo wp_get_attachment_image_src($image,$size)[0]; ?>" alt="" aria-hidden="true" >
								</div>
							<?php endif;	?>
							<h3><?php if ($title) echo $title; ?></h3>
							
							

						</div>
					</div>
					<?php
				}
			?>
					</div>
				<!--/div-->

			
			</div>

			<?php





		}
	}
}





if ( ! function_exists( 'services_page_secound_content' ) ) {
    function services_page_secound_content(){

        $content = apply_filters( 'the_content',get_post_meta(get_the_ID(),'second_content',true));
      

        ?>
            <div  id="secound-content" class="" >
                    
                                    
                                
                <?php if($content): ?>
                    <div class= "entry-content">
                    <?php echo $content ?>
                    </div>
                <?php endif;  ?>
                                    
                                    

                    
            </div><!-- secound-content end -->

        <?php

    }
}

if ( ! function_exists( 'page_secound_content' ) ) {
    function page_secound_content(){

        $content = apply_filters( 'the_content',get_post_meta(get_the_ID(),'second_content',true));
        //$title = get_post_meta(get_the_ID(),'values-title',true);
		$size = 'full'; //'homepage-links-size'; // (thumbnail, medium, large, full or custom size)
        $image = (int) get_post_meta( get_the_ID(),'content2_deco_img',true);

        ?>
        <div  id="secound-content" class="container-fluid main-container" >
                    <div class="row flex-row-reverse"><!-- .row end -->
                            
                        <div class="col-lg-7" >

                            <div class="site-main" id="main" role="main">
                                
                            
                                <?php if($content): ?>
                                    <div class= "entry-content">
                                    <?php echo $content ?>
                                    </div>
                                 <?php endif;  ?>
                                
                                

                            </div><!-- site main -->
                        </div><!-- col-md-12 end -->
                        <div class="col-lg-5 content-deco-img-wrap"  >
                        <?php
                        if( $image) :
		                    ?>	
			                    <div class="content-deco-img" style="background-image:url('<?php echo wp_get_attachment_image_src(  $image , $size)[0]; ?>')" >
				
				
				
			            </div>
	            	<?php	endif; ?>
                            
                        </div>

                    </div><!-- .row end -->
                
                </div><!-- Container end -->

        <?php

    }
}


if ( ! function_exists( 'page_about_process_content' ) ) {
    function page_about_process_content(){

        $content = apply_filters( 'the_content',get_post_meta(get_the_ID(),'process_content',true));
        $title = get_post_meta(get_the_ID(),'process-title',true);
		$size = 'full'; //'homepage-links-size'; // (thumbnail, medium, large, full or custom size)
        $image = (int) get_post_meta( get_the_ID(),'content3_deco_img',true);

        ?>

        <div id="about-process" class="container-fluid main-container" >
        <div class="about-process-title-wrap"><div class="col-lg-7"><h2 class="about-process-title "><?php if ($title){ echo $title;} ?></h2></div></div>
                    <div class="row "><!-- .row end -->
                            
                        <div class="col-lg-7" >

                            <div class="site-main" id="main" role="main">
                                
                            
                                <?php if($content): ?>

                                    <div class= "entry-content">
                                    <?php echo $content ?>
                                    </div>
                                 <?php endif;  ?>
                                
                                

                            </div><!-- site main -->
                        </div><!-- col-md-12 end -->
                        <div class="col-lg-5 content-deco-img-wrap"  >
                        <?php
                        if( $image) :
		                    ?>	
			                    <div class="content-deco-img" style="background-image:url('<?php echo wp_get_attachment_image_src(  $image , $size)[0]; ?>')" >
				
				
				
			            </div>
	            	<?php	endif; ?>
                            
                        </div>

                    </div><!-- .row end -->
                
                </div><!-- Container end -->

        <?php

    }
}
/**
 * 
 *  Our Story Actions
 * 
 */

 /*
if ( ! function_exists( 'page_story_content' ) ) {
    function page_story_content(){

        $content1 = apply_filters( 'the_content',get_post_meta(get_the_ID(),'story_content_1',true));
        $content2 = apply_filters( 'the_content',get_post_meta(get_the_ID(),'story_content_2',true));
        $content3 = apply_filters( 'the_content',get_post_meta(get_the_ID(),'story_content_3',true));
      
		$size = 'full'; //'homepage-links-size'; // (thumbnail, medium, large, full or custom size)
        $image = (int) get_post_meta( get_the_ID(),'content2_deco_img',true);

        ?>
        <div  id="story-content" >
            <div id="strory-part-1"  class="" >
                <?php if($content1): ?>
                    <div class= "entry-content">
                    <?php echo $content1 ?>
                    </div>
                <?php endif;  ?>
            </div>
            <div id="strory-part-2"  class="container-fluid main-container" >
                    <div class="row"><!-- .row end -->
                            
                        <div class="col-lg-7" >

                            <div class="site-main" id="main" role="main">
                                
                            
                                <?php if($content2): ?>
                                    <div class= "entry-content">
                                    <?php echo $content2 ?>
                                    </div>
                                 <?php endif;  ?>
                                
                                

                            </div><!-- site main -->
                        </div><!-- col-md-12 end -->
                        <div class="col-lg-5 content-deco-img-wrap"  >
                        <?php
                        if( $image) :
		                    ?>	
			                    <div class="content-deco-img" style="background-image:url('<?php echo wp_get_attachment_image_src(  $image , $size)[0]; ?>')" >
				
				
				
			            </div>
	            	<?php	endif; ?>
                            
                        </div>

                    </div><!-- .row end -->
                
                </div><!-- Container end -->
                <div id="strory-part-3"  class="container-fluid" >
                <?php if($content3): ?>
                    <div class="row"><!-- .row end -->
                            
                        <div class="col-lg-7" >
                            <div class= "entry-content">
                            <?php echo $content3 ?>
                            </div>
                        </div>
                    </div>
                <?php endif;  ?>
            </div>
            </div>

        <?php

    }
}*/

/**
 * 
 *  Team Function
 * 
 */

 
if ( ! function_exists( 'hinit_team_list' ) ) {
    function hinit_team_list()    {

        $id = get_the_ID();
        $rows = get_post_meta(  $id, 'team_list', true );
        //$section_title  =get_post_meta(  $id, 'team_section_title', true );
        $size='large';
       
       
        if( $rows ) {

            $class = 'col-md-6 col-xl-4';
            if( $rows == 1  ){
                $class = 'col-lg-12';
            } else if ($rows ==2 || $rows == 4  ){
                $class = 'col-lg-6';
            }


            ?>
            <section id="team-list"  class="team-list">

            <div class="container">
                <div class="row">
            <?php
            
            

            for( $i = 0; $i < $rows; $i++ ) {
           // while ( have_rows('links_list') ) : the_row();
                $name =get_post_meta(  $id, 'team_list_'.$i.'_person_name', true );
                $title =get_post_meta(  $id, 'team_list_'.$i.'_person_title', true );
                $desc =get_post_meta(  $id,'team_list_'.$i.'_person_desc', true ); 
                $slogan=get_post_meta(  $id,'team_list_'.$i.'_person_slogan', true ); 
                $image= (int) get_post_meta(  $id, 'team_list_'.$i.'_person_image', true );
                $icon = (int) get_post_meta(  $id, 'team_list_'.$i.'_person_icon', true );

                /*
                $email =get_post_meta(  $id, 'team_list_'.$i.'_person email', true );
                $linkedin = get_post_meta(  $id,  'team_list_'.$i.'_person_linkedin', true );
                $phone = get_post_meta(  $id,  'team_list_'.$i.'_person_phone', true );
                */
               
                 ?>
                <div class="team-items-wrap <?php echo  $class; ?>">
                    
                    <div class="team-item ">
                        <?php  if ($image): ?>
                            <?php if( $class == 'col-lg-12'): ?>
                                <div class="team-list-image-wrap col-lg-4">
                            <?php endif; ?>
                            <div class="team-list-image-wrap">
                                <div class="team-list-image " aria-hidden="true">
                                
                                    
                                        <img src="<?php echo wp_get_attachment_image_src( $image, $size  )[0]; ?>" alt="<?php echo $title; ?>" aria-hidden="true" >
                                
                                </div>
                                <?php  if ($icon): ?>
                                    <div class="team-list-icon " aria-hidden="true">   
                                        
                                            <img src="<?php echo wp_get_attachment_image_src( $icon, $size  )[0]; ?>" alt="<?php echo $title; ?>" aria-hidden="true" >
                                    
                                    </div>

                                <?php  endif; ?>
                            </div>
                            <?php if( $class == 'col-lg-12'): ?>
                             </div> <!-- team-list-image-wrap col-lg-4 -->
                            <?php endif; ?>  
                        <?php  endif; ?>

                        

                        <div class="team-list-content ">
                            <div class="title-wrap">
                                <h3><?php echo $name; 
                                    if($title):
                                        echo " | " ; ?></h3>
                                         <h4><?php echo $title; ?></h4>
                                    <?php else: ?>
                                        </h3>
                                    <?php endif; ?>
                                    <?php  if ($slogan): ?>
                                <div class="slogan-wrap"><span class="slogan"><?php echo $slogan; ?></span></div>
                            <?php endif; ?>
                               
                            </div>
                            
                            <div class="team-list-desc">     
                                <?php echo $desc ?>
                            </div>
                            <?php 
                            /*
                            <div class="social_buttons">
                                <?php if ($email ): ?>
                                    <a href="mailto:<?php echo  $email; ?>" target="_blank"><i class="fa fa-envelope-o" aria-hidden="true"></i><span class="sr-only"><?php echo __('שליחת מייל'); ?></sapn></a>
                                <?php endif; ?>
                                <?php  if ($linkedin): ?>
                                    <a href="<?php echo $linkedin; ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i><span class="sr-only"><?php echo __('פרופיל הלינקאין'); ?></sapn></a>
                                <?php endif; ?>
                                <?php if ($phone ): ?>
                                    <button class="btn" type="button" data-toggle="collapse"  aria-expanded="false" data-target="#person_<?php echo $i; ?>" aria-controls="person_<?php echo $i; ?>"><i class="fa fa-phone" aria-hidden="true"></i><span class="sr-only"><?php echo __('חיוג למספר'); ?></button>                     
                                <?php endif; ?>
                            </div>
                            <div  class="collapse phone-number-wrap"  id="person_<?php echo $i; ?>" ><a href="tel:<?php echo  $phone; ?>" target="_blank"  ?><?php echo $phone; ?></a></div>
                            */?>
                        </div>
                    </div><!-- team-item -->
                   
                </div> <!--  team-items-wrap  -->
                <?php
                
            }
            ?>  
             </div>
            </div></section>
            <?php
              
            
                
        }
           
    }
}

if ( ! function_exists( 'contact_us_form_func' ) ) {
    function contact_us_form_func(){
       
        $form = get_post_meta(   get_the_ID() , 'form_shortcode', true ); 


        if($form){
             echo do_shortcode($form); 
        }
    }
}


if ( ! function_exists( 'position_archive_modal' ) ) {
    function position_archive_modal(){
        $form = '[contact-form-7 id="195" title="Page Form"]';
        //$slogen = __('יוצרים הצלחה פיננסית','hinit');
        ?>

            <!-- Modal -->
		<div class="modal fade" id="SendCVModal" tabindex="-1" role="dialog" aria-labelledby="SendCVTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content continer">
                <div class="row ">
                    <div class="d-none d-md-block col-md-4 col-lg-6">
                        <div class="modal-deco-image">
                            <!--div class="modal-deco-slogen"><?php// echo  $slogen; ?></div-->
                        </div>
                    </div>
                    <div class="col">
                        <div class="modal-header">
                            <h2 class="modal-title" id="SendCVTitle"><?php echo __('קדימה בואו נדבר', 'hinit'); ?></h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body borderless-form">

                            <?php echo do_shortcode($form); ?>

                        </div>
                        <!--div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                        </div-->
                    </div>
                </div><!-- row -->
			</div>
		</div>
		</div>

        <?php


    }

}

if ( ! function_exists( 'social_div' ) ) {
    function social_div(){
        
        $url = esc_url(get_the_permalink()); //$attr['page_url'];
        $title =  get_the_title(); //$attr['first_name'].'%20'.$attr['last_name'];

        echo social_div_parser($url, $title);

    }
}

function social_div_parser($url, $title){
    $returnContent = '<div class = "social-links"  >
    <ul class="row">
        <li class= "share-item col"><a class="share-link facebook" href="https://www.facebook.com/sharer.php?u='. $url  .'&amp;t='.  $title .'" target="_blank"> <i  class="fa fa-facebook-f"></i></span><span class="grid-item-text"><span class="sr-only">'.__('Share on facebook','yourbiz').'</span></a></li>
        <li class= "share-item col"><a class="share-link whatsapp" href="whatsapp://send?text='.$title.' '. $url .'" target="_blank"> <i class="fa fa-whatsapp"></i><span class="sr-only">'.__('Share on whatsaap','yourbiz').'</span></a></li>
        <li class= "share-item col"><a class="share-link twitter" href="https://www.linkedin.com/sharing/share-offsite/?url='. $url .'" target="_blank"><i  class="fa fa-linkedin"></i><span class="sr-only">'.__('Share on Linked in','hinit').'</span></a></li>
        <li class= "share-item col"><a  class="share-link email" href="mailto:?subject='.$title.'&amp;body='.$title .'%20'. $url .'" target="_blank"> <i  class="fa fa-at"></i><span class="sr-only">'.__('Share by email','yourbiz').'</span></a></li>
        
    </ul>
    </div>';
    
    return $returnContent;

    /* <li class= "share-item col"><a class="share-link sms" href="sms:?body='.$title.' '. $url .'" > <i class="fa fa-commenting-o "></i><span class="sr-only">'.__('Share on sms','yourbiz').'</span></a></li>*/
    /*<li class= "share-item col"><a class="share-link twitter" href="https://twitter.com/intent/tweet?text='.$title.'%20'. $url .'"> <i class="fa fa-twitter"></i><span class="sr-only">'.__('Share on whatsaap','yourbiz').'</span></a></li> */
}


function whatsapp_floating_button(){

    $phone = "972523689661";
    $text= "אני%20רוצה%20הצלחה%20פיננסית";

    ?>
    <div class="whatapp-wrap">
        <div class="whatapp-icon-wrap">
            <a href="https://api.whatsapp.com/send?phone=<?php echo $phone; ?>&amp;text=<?php echo $text; ?>">
            <i aria-hidden="true" class="fa fa-whatsapp"></i>
            <span class="sr-only">לשיחה בוואצאפ</span></a>
        </div>
    </div>
    <?php

}

/*
add_action("position_archive_actions","search_position_section_func",10);
add_action("position_archive_actions","positions_categories_list_func",20);
*/

/**
 * 
 *  About page actions
 * 
 */

    add_action("about_page_content_actions","about_page_values_func",10 );
    add_action("about_page_content_actions","spcieal_contact_button", 20);
   
   // add_action("about_page_actions","page_secound_content",10);
 
    add_action("about_page_actions","page_footer_slogen",10);
    add_action("about_page_actions","position_archive_modal",20);
    add_action("about_page_content_actions","whatsapp_floating_button",90);

    
/**
 * 
 *  Services page actions
 * 
 */

  

    add_action("services_page_content_actions","services_page_process_func",20);

   
    add_action("services_page_content_actions","services_page_secound_content",40);

    add_action("services_page_content_actions","services_first_spcieal_contact_button", 50);

    add_action("services_page_content_actions","services_page_servies_func",60 );

    add_action("services_page_content_actions","services_second_spcieal_contact_button", 70);

    add_action("services_page_actions","page_footer_slogen",20);
    add_action("services_page_actions","position_archive_modal",30);
    add_action("about_page_content_actions","whatsapp_floating_button",90);



/* 404 and no search results page:  */

     add_action("error_page_actions","search_position_section_func",10);
     add_action("error_page_actions","positions_categories_list_func",20);
         
    add_action("error_page_actions","homepage_jobs_func",50);

    add_action("error_page_actions","recent_posts_action_func",80);

