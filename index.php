<?php
/**
 * @package WordPress
 * @subpackage Sunset_Theme
 */

get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>

		<?php while (have_posts()) : the_post(); ?>
		
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2><span class="date"><?php echo strftime('%d %b',strtotime(get_the_time('m/d/Y'))); ?></span><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				
				<span class="postmetadata">
				<!--  By <?php the_author() ?><?php if(!is_single()){ echo " | "; }?> -->
				<?php edit_post_link('Edit this entry', '', ' | '); ?><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>				
				</span>
				
				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
					<?php wp_link_pages(array('before' => '<p>Pages: ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div>
				
				<span class="postmetadata">
				Category(s):  <?php the_category(', ') ?>
				<?php the_tags('<br />Tag(s): ', ', ', ''); ?>
				</span>

			</div>			

		<?php comments_template(); // Get wp-comments.php template ?>

		<?php endwhile; ?>

		<div class="navigation <?php if(is_single()){ echo "hide"; }?>">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="pagetitle searchtitle">Not Found</h2>
		<small class="queryBlog">Sorry, but you are looking for something that isn't here.</small>
		<div class="searchboxbody">
		<?php get_search_form(); ?>
		</div>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
