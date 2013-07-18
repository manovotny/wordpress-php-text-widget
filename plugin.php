<?php
/*
Plugin Name: Standard PHP Text Widget
Plugin URI: https://github.com/eightbit/plugins/tree/master/standard-php-text-widget
Description: Allows PHP to be used within Text widgets.
Version: 1.0
Author: Michael Novotny
Author URI: http://manovotny.com
Author Email: manovotny@gmail.com
License: GNU General Public License v3.0 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/


/*
/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ CONTENTS /\/\/\/\/\/\/\/\/\/\/\/\/\/\//\/\/\/\/\

    1. Constructor
    2. Actions
    3. Instantiation

/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\//\/\/\/\/\/\/\/\/\/\
*/


class Standard_PHP_Text_Widget {

    /* Constructor
    ---------------------------------------------------------------------------------- */

    /**
     * Initializes the plugin by setting localization, filters, and administration functions.
     */
    function __construct() {

        // Add Text widget actions.
        add_action( 'widget_text', array( $this, 'standard_php_text_widget' ) );

    } // end constructor


    /* Actions
    ---------------------------------------------------------------------------------- */

    /**
     * Allows PHP to be used in a Text widget.
     */
    public function standard_php_text_widget( $text ) {

        if ( false !== strpos( $text, '<' . '?' ) )
        {
            ob_start();
            eval( '?' . '>' . $text );
            $text = ob_get_contents();
            ob_end_clean();
        }
        return $text;

    } // end standard_php_text_widget

} // end class


/* Instantiation
---------------------------------------------------------------------------------- */

new Standard_PHP_Text_Widget();