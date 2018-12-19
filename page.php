<?php
/**
 * @package WordPress
 * @subpackage Sunset_Theme
 */

get_header(); ?>

	<div id="content" class="narrowcolumn ispage">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2><?php the_title(); ?></h2>
				<?php edit_post_link('Edit this entry.', '<span class="postmetadata">', '</span>'); ?>
				
				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
					<?php wp_link_pages(array('before' => '<p>Pages: ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div>

			</div>
	
			<?php comments_template(); // Get wp-comments.php template ?>		

		<?php endwhile; endif; ?>		

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>