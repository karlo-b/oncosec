<?php
include_once( XT_THEME_DIR . '/inc/cpt.php' );

// create a book custom post type
$books = new CPT('book');


// create a genre taxonomy
$books->register_taxonomy('genre');


// define the columns to appear on the admin edit screen
$books->columns(array(
    'cb' => '<input type="checkbox" />',
    'title' => __('Title'),
    'genre' => __('Genres'),
    // 'price' => __('Price'),
    // 'rating' => __('Rating'),
    'date' => __('Date')
));


// // populate the price column
// $books->populate_column('price', function($column, $post) {

//     echo "£" . get_field('price'); // ACF get_field() function

// }); 


// // populate the ratings column
// $books->populate_column('rating', function($column, $post) {

//     echo get_field('rating') . '/5'; // ACF get_field() function

// });


// // make rating and price columns sortable
// $books->sortable(array(
//     'price' => array('price', true),
//     'rating' => array('rating', true)
// ));


// use "pages" icon for post type
$books->menu_icon("dashicons-book-alt");

$books->add_meta_box(
    'Car Info', array(
        // Text field
    array(
           'name'  => 'First Name',
            'label' => 'First Name',
            'desc'  => 'Please enter your first name',
            'type'  => 'text'
        ),
    // Telephone field
    array(
            'name'  => 'Telephone',
            'label' => 'Telephone Number',
            'desc'  => 'Please enter your office number',
            'type'  => 'tel'
        ),
    // Website/URL field
    array(
            'name'  => 'Website',
            'label' => 'Website Address',
            'desc'  => 'Please enter website address starting with http://',
            'type'  => 'url'
        ),
    // Image
    array(
            'name'  => 'Faculty Image',
            'label' => 'Faculty Image',
            'desc'  => 'Please select an image',
            'type'  => 'image'
        ),
    // Single Checkbox
    array(
            'name'  => 'Yes',
            'label' => 'TCU Graduate',
            'desc'  => 'Check if yes',
            'type'  => 'checkbox'
        ),
    // Group Checkbock
    array(
           'name'    => 'Favorite color',
           'label'   => 'Favorite color',
           'desc'    => 'Check all that apply',
           'type'    => 'checkbox_group',
           'options' => array(
                array(
                    'value' => 'red',
                    'label' => 'Red'
                    ),
                array(
                    'value' => 'yellow',
                    'label' => 'Yellow'
                    )
                )
            ),
    // Radio
    array(
           'name'    => 'Radio',
           'label'   => 'Radio',
           'desc'    => 'Check only one',
           'type'    => 'radio',
           'options' => array(
                array(
                    'value' => 'blue',
                    'label' => 'Blue'
                    ),
                array(
                    'value' => 'green',
                    'label' => 'Green'
                    )
                )
            ),
    // Date
    array(
            'name'  => 'Event Date',
            'label' => 'Event Date',
            'desc'  => 'Please choose the event date',
            'type'  => 'date'
        ),
    // Select
    array(
               'name'    => 'Select Slider Speed',
               'label'   => 'Select Slider Speed',
               'desc'    => 'Please choose in milliseconds',
               'type'    => 'select',
               'options' => array(
                    array(
                        'value' => 'horizontal',
                        'label' => 'Horizontal'
                        ),
                    array(
                        'value' => 'vertical',
                        'label' => 'Vertical'
                        )
                    )
          ),
    // Wordpress editor
    array(
            'name'    => 'Wordpress Editor',
            'label'   => 'WordPress Editor',
            'desc'    => 'Please enter content',
            'type'    => 'editor',
            'options' => array('media_buttons' => false) // add media buttons true/false
        )
    ));