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
        'content' => get_the_content(),
    );

    // Append page data to the sections array
    $sections[] = $page_data;

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

            // Check if this is the last section
            if ($index === count($sections)) {
                // Parse and render blocks within the last section
                $blocks = parse_blocks($page_data['content']);
                foreach ($blocks as $block) {
                    // Check if this block is "Social Icons"
                    if ($block['blockName'] === 'core/social-links') {
                        // Render the block
                        echo render_block($block);
                    }
                }
            }
            ?>
        </section>
    <?php endforeach; ?>
</main><!-- #main -->

<?php
get_footer();
?>
