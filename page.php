<?php
/**
 * Template Name: Single Page Template
 *
 * This is a custom page template for your single-page layout.
 */

get_header();

// Initialize an empty array to store the pages
$sections = array();

// Define a custom query to fetch all pages
$args = array(
    'post_type' => 'page',
    'posts_per_page' => -1, // Retrieve all pages
    'orderby' => 'menu_order', // Order by menu order (can be changed)
    'order' => 'ASC', // Order in ascending order (can be changed)
);

$page_query = new WP_Query($args);

$index = 1; // Initialize index to 1

while ($page_query->have_posts()) : $page_query->the_post();
    // Collect page data into an array
    $page_data = array(
        'title' => get_the_title(),
        'content' => '',
    );

    // Append page data to the sections array
    $sections[] = $page_data;

    // Store the content of the last section
    if ($index === count($sections)) {
        ob_start(); // Start output buffering
        the_content();
        $sections[$index - 1]['content'] = ob_get_clean(); // Store the content and stop output buffering
    }

    $index++; // Increment index
endwhile;

// Reset post data
wp_reset_postdata();
?>

<main id="primary" class="site-main">
    <?php
    // Loop through the collected pages and output them as sections
    foreach ($sections as $index => $page_data) :
    ?>
        <section <?php if ($index >= 1) echo 'id="section-' . ($index) . '"'; ?>>
            <?php
            // Output the page content
            echo $page_data['content'];
            ?>
        </section>
    <?php endforeach; ?>
</main><!-- #main -->

<?php
get_footer();
?>
