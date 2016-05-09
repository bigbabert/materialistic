<?php
/**
 * materialistic Theme Customizer.
 *
 * @package materialistic
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function material_at_customize_register( $wp_customize ) {
class Alter_Customize_Category_Dropdown_Control extends WP_Customize_Control
 {
    private $cats = false;

    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $this->cats = get_categories($options);

        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content()
       {
            if(!empty($this->cats))
            {
                ?>
                    <label>
                      <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
                      <select <?php $this->link(); ?>>
                           <?php
                                foreach ( $this->cats as $cat )
                                {
                                    printf('<option value="%s" %s>%s</option>', $cat->term_id, selected($this->value(), $cat->term_id, false), $cat->name);
                                }
                           ?>
                      </select>
                    </label>
                <?php
            }
       }
 } 
        $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
        // Header Section
    $wp_customize->add_section( 'material_at_header_section' , array(
	    'title'       => __( 'Header Section', 'material_at' ),
	    'priority'    => 21,
	    'description' => __( 'Change settings for your site header', 'material_at' ),
	) );
        // Favicon upload
	$wp_customize->add_setting( 'material_at_favicon', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'material_at_favicon', array(
		'label'    => __( 'Favicon', 'material_at' ),
		'section'  => 'material_at_header_section',
		'settings' => 'material_at_favicon',
                'description' => __( 'Upload your Favicon'.'</br><span style="color:red;">'.'The should be .jpg and .png but the size must be 192x192 px'.'</span>', 'material_at' ),
            
	) ) );
        // Logo upload
	$wp_customize->add_setting( 'material_at_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'material_at_logo', array(
		'label'    => __( 'Logo', 'material_at' ),
		'section'  => 'material_at_header_section',
		'settings' => 'material_at_logo',
                'description' => __( 'Upload a logo to replace the default site name and description in the header', 'material_at' )
	) ) );
        // Sticky Header
        $wp_customize->add_setting( 'material_at_sticky_header', array(
            'default'        => false,
            'transport'  =>  'postMessage',
        ) );
 
        $wp_customize->add_control( 'material_at_sticky_header', array(
            'label'     =>  __( 'Header Sticky', 'material_at' ),
            'section'   => 'material_at_header_section',
            'settings' => 'material_at_sticky_header',
            'type'      => 'checkbox',
            'description' => __( 'Make header sticky to top', 'material_at' )
        ) );
        // Slider Section
    $wp_customize->add_section( 'material_at_slider_section' , array(
	    'title'       => __( 'Slider Section', 'material_at' ),
	    'priority'    => 29,
	    'description' => __( 'Add Slider to your site', 'material_at' ),
	) );
        // Slider Home Page Checkbox
        $wp_customize->add_setting( 'material_at_slider_opt', array(
            'default'        => true,
            'transport'  =>  'postMessage',
        ) );
 
        $wp_customize->add_control( 'material_at_slider_opt', array(
            'label'     =>  __( 'Add Slider to Home', 'material_at' ),
            'section'   => 'material_at_slider_section',
            'settings' => 'material_at_slider_opt',
            'type'      => 'checkbox',
            'description' => __( 'If Checked add full screen slider to the Home Page', 'material_at' )
        ) );    
        // Slider Page Select
	for ( $count = 1; $count <= 3; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'material_at_slider_pages_' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'material_at_slider_pages_' . $count, array(
			'label'    => __( 'Select Page', 'textdomain' ),
			'section'  => 'material_at_slider_section',
			'type'     => 'dropdown-pages'
		) );

	}
        // Footer Text 
   $wp_customize->add_section( 'material_at_footers_section' , array(
	    'title'       => __( 'Footer Settings', 'material_at' ),
	    'priority'    => 34,
	    'description' => __( 'Write text to display in footer', 'material_at' )
	) );
$wp_customize->add_setting( 'material_at_footers_text', array(
    'sanitize_callback' => 'esc_url_raw',
    'default' => '<p><a href="http://wordpress.org/">Proudly powered by WordPress</a> | Theme: Materialistic made with <i style="color:red;" class="fa fa-heartbeat"></i><span class="hidden">love</span> by  <a class="white" href="http://www.blog.altertech.it/author/alberto-cocchiara/" rel="nofollow"> AlterTech</a> . </p>',
    ) );
 
$wp_customize->add_control( 'material_at_footers_text', array(
    'label' => 'Footer Text',
    'type' => 'text',
    'section' => 'material_at_footers_section',
) );
// Author checkbox 
   $wp_customize->add_section( 'material_at_author_section' , array(
	    'title'       => __( 'Author Settings', 'material_at' ),
	    'priority'    => 36,
	    'description' => __( 'If checked hide the authors page.', 'material_at' )
	) );
$wp_customize->add_setting( 'material_at_author_checkbox', array(
    'sanitize_callback' => 'esc_url_raw',
    'default' => 0,
) );
 
$wp_customize->add_control( 'material_at_author_checkbox', array(
    'label' => 'Hide Author Page',
    'type' => 'checkbox',
    'section' => 'material_at_author_section',
) );
$wp_customize->add_setting(
        'material_at_header_custom_color',
        array(
    'sanitize_callback' => 'esc_url_raw',
            'default'     => '#4285f4',
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_custom_color',
            array(
                'label'      => __( 'Header Color', 'material_at' ),
                'section'    => 'colors',
                'settings'   => 'material_at_header_custom_color'
            )
        )
    );
$wp_customize->add_setting(
        'material_at_sidebar_custom_color',
        array(
    'sanitize_callback' => 'esc_url_raw',
            'default'     => '#89c4e2',
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sidebar_custom_color',
            array(
                'label'      => __( 'Sidebar Color', 'material_at' ),
                'section'    => 'colors',
                'settings'   => 'material_at_sidebar_custom_color'
            )
        )
    );
$wp_customize->add_setting(
        'material_at_link_menu_color',
        array(
    'sanitize_callback' => 'esc_url_raw',
            'default'     => '#ffffff',
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_menu_color',
            array(
                'label'      => __( 'Link Menu Color', 'material_at' ),
                'section'    => 'colors',
                'settings'   => 'material_at_link_menu_color'
            )
        )
    );
$wp_customize->add_setting(
        'material_at_link_color',
        array(
    'sanitize_callback' => 'esc_url_raw',
            'default'     => '#3372df',
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_color',
            array(
                'label'      => __( 'Link Color', 'material_at' ),
                'section'    => 'colors',
                'settings'   => 'material_at_link_color'
            )
        )
    );
$wp_customize->add_setting(
        'material_at_link_hover_color',
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'     => '#06e',
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_hover_color',
            array(
                'label'      => __( 'Link Hover Color', 'material_at' ),
                'section'    => 'colors',
                'settings'   => 'material_at_link_hover_color'
            )
        )
    );
}
add_action( 'customize_register', 'material_at_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function material_at_customize_preview_js() {
	wp_enqueue_script( 'material_at_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'material_at_customize_preview_js' );
function material_at_customizer_styles() { ?>
  <style>
      #customize-control-material_at_favicon img{
          max-width: 60px;
          margin: 0 33.3%;
          height: auto;
      }
      input[type=radio], input[type=checkbox] {
          width: 25px;
          height: 25px;
      }
      input[type=checkbox]:checked:before {
          font-size: 30px;
      }
      .customize-control-checkbox label, .customize-control-nav_menu_auto_add label, .customize-control-radio label {
          font-weight: bold;
          font-size: 18px;
      }
      .customize-control-checkbox label, .customize-control-nav_menu_auto_add label, .customize-control-radio label span {
          display: block;
      }
      #customize-control-material_at_logo img {
          max-width: 120px;
          margin: 0 25%;
          height: auto;
      }
      .accordion-section-content li {
          border-bottom: 1px solid #fff;
          padding: 20px 0;
      }
  </style>
  <?php
}
add_action( 'customize_controls_print_styles', 'material_at_customizer_styles' );