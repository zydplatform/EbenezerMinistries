<?php
/**
 * Help Panel.
 *
 * @package Faith Blog
 */
?>
<!-- Updates panel -->
<div id="plugins-panel" class="panel-left visible">
	<h4><?php _e( 'Recommended Plugins', 'faith-blog' ); ?></h4>

	<p><?php _e( 'Below is a list of recommended plugins to install that will help you get the most out of Faith Blog. Although each plugin is optional', 'faith-blog' ); ?></p>
	<p><?php _e('If you want to import demo site in single click, then please install <strong>Starter Templates For Faith Blog</strong> and <strong>One Click Demo Import</strong> Plugins.', 'faith-blog');?></p>

	<hr/>

	<?php
	$free_plugins = array(
		'starter-blog-templates-for-faith-blog' => array(
			'slug'     	=> 'starter-blog-templates-for-faith-blog',
			'filename' 	=> 'stffb.php',
		),
		'blog-designer-for-elementor' => array(
			'slug'     	=> 'blog-designer-for-elementor',
			'filename' 	=> 'bdfe.php',
		),
        'elementor' => array(
			'slug' 		=> 'elementor',
			'filename' 	=> 'elementor.php',
		),
        'one-click-demo-import' => array(
            'slug'      => 'one-click-demo-import',
            'filename'  => 'one-click-demo-import.php',
        ),
	);

	if( $free_plugins ){ ?>
		<h4 class="recomplug-title"><?php esc_html_e( 'Free Plugins', 'faith-blog' ); ?></h4>
		<p><?php esc_html_e( 'These Free Plugins might be handy for you.', 'faith-blog' ); ?></p>
		<div class="recomended-plugin-wrap">
    		<?php
    		foreach( $free_plugins as $plugin ) {
    			$info     = faith_blog_call_plugin_api( $plugin['slug'] );
    			$icon_url = faith_blog_check_for_icon( $info->icons ); ?>    
    			<div class="recom-plugin-wrap">
    				<div class="plugin-img-wrap">
    					<img src="<?php echo esc_url( $icon_url ); ?>" />
    					<div class="version-author-info">
    						<span class="version"><?php printf( esc_html__( 'Version %s', 'faith-blog' ), $info->version ); ?></span>
    						<span class="seperator">|</span>
    						<span class="author"><?php echo esc_html( strip_tags( $info->author ) ); ?></span>
    					</div>
    				</div>
    				<div class="plugin-title-install clearfix">
    					<span class="title" title="<?php echo esc_attr( $info->name ); ?>">
    						<?php echo esc_html( $info->name ); ?>	
    					</span>
                        <div class="button-wrap">
    					   <?php echo Faith_Blog_Getting_Started_Page_Plugin_Helper::instance()->get_button_html( $plugin['slug'] ); ?>
                        </div>
    				</div>
    			</div>
    			<?php
    		} 
            ?>
		</div>
	<?php
	} 
?>
</div><!-- .panel-left -->