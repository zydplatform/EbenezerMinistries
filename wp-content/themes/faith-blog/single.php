<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Faith Blog
 */
get_header();
/**
 * Blog Page Sidebar Control
 */
$getblogsidebar = get_theme_mod( 'single_page_sidebar', 'right' );
$blogsidebar = 'col-md-5 col-lg-4 order-1';
$blogcontent = 'col-md-7 col-lg-8 order-0';
$sidebarshow = true;
if ($getblogsidebar === 'right') {
    $blogsidebar = 'col-md-5 col-lg-4 order-1';
    $blogcontent = 'col-md-7 col-lg-8 order-0';
    $sidebarshow = true;
}elseif ($getblogsidebar === 'left') {
    $blogsidebar = 'col-md-5 col-lg-4 order-0';
    $blogcontent = 'col-md-7 col-lg-8 order-1';
    $sidebarshow = true;
}elseif($getblogsidebar === 'no'){
    $blogsidebar = 'sidebar-hide';
    $blogcontent = 'col-md-12';
    $sidebarshow = false;
}else{
    $blogsidebar = 'col-md-5 col-lg-4 order-1';
	$blogcontent = 'col-md-7 col-lg-8 order-0';
}
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<div class="<?php echo esc_attr( $blogcontent );?> post-details-page">
						<?php
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content/content', 'single' );
							// the_post_navigation();
						endwhile; // End of the loop.
						$post_navigation_show = get_theme_mod('post_navigation_show', true);
						$post_comment_section_show = get_theme_mod('post_comment_section_show', true);
						
						if(true === $post_navigation_show) :
							?>
							<div class="d-flex single-post-navigation justify-content-between">
								<div class="previous-post">
									<div class="postarrow"><i class="fa fa-long-arrow-left"></i><?php echo esc_html_e( 'Previous Post', 'faith-blog' ); ?></div>
									<?php echo wp_kses_post( get_previous_post_link('%link') );?>
								</div>
								<div class="next-post">
									<div class="postarrow"><?php echo esc_html_e( 'Next Post', 'faith-blog' ); ?><i class="fa fa-long-arrow-right"></i></div>
									<?php echo wp_kses_post(get_next_post_link('%link')); ?>
								</div>
							</div>
							<?php
						endif;
						if (true === $post_comment_section_show) :
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						endif;
						?>
					</div>
					<?php if ($sidebarshow === true) :?>
                        <div class="<?php echo esc_attr( $blogsidebar );?>">
                            <?php get_sidebar(); ?>
                        </div>
                    <?php endif; ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
