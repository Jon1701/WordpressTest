<?php

class Hyperion_Edit_Post_Box {
  // Class constructor.
  function __construct() {
    // Add Post Meta Box.
    add_action( 'add_meta_boxes', array( $this, 'register_post_metabox' ) );

    // Load JavaScript.
    add_action( 'admin_enqueue_scripts', array( $this, 'load_css_javascript' ) );
  }

  // Adds a Post Meta box.
  public function register_post_metabox() {
    add_meta_box(
      $id = 'container-hyperion-postmeta',
      $title = 'Hyperion',
      $callback = array( $this, 'post_metabox_contents' ),
      $screen = array( 'post', 'page' ),
      $context = 'normal',
      $priority = 'high',
      $callback_args = null
    );
  }

  // Display post metabox contents.
  public function post_metabox_contents() {
    // This is the DOM target used by React.
    echo '<div id="hyperion-target"></div>';
  }

  // Loads CSS and JavaScript.
  public function load_css_javascript( $hook ) {
    if ( 'post.php' !== $hook ) {
      return;
    }

    // Load JavaScript.
    wp_enqueue_script(
      $handle = 'hyperion-postmeta',
      $src = plugins_url( '../js/HyperionEditPost.js', __FILE__ ),
      $deps = null,
      $ver = '1',
      $in_footer = true
    );
  }
}

// Create instance.
$hyperion_edit_post_box = new Hyperion_Edit_Post_Box();
