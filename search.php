<?php
/**
 * @package WordPress
 * @subpackage Sunset_Theme
 */

get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle specialtitle">Search Results</h2>
		<?php if (is_search()) { ?>
			<small class="queryBlog">You have searched this blog for <strong>'<?php the_search_query(); ?>'</strong>.</small>
			<?php } ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?>>
				<h2 id="post-<?php the_ID(); ?>"><span class="date"><?php echo strftime('%d %b',strtotime(get_the_time('m/d/Y'))); ?></span><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

				<p class="postmetadata">
				Category(s): <?php the_category(', ') ?><br /><?php the_tags('Tag(s): ', ', ', '<br />'); ?>
				<?php edit_post_link('Edit this entry', '', ' | '); ?><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
				</p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>
		
		<h2 class="pagetitle searchtitle">No Search Results Found</h2>
			<small class="queryBlog">Try a different search.</small>
		<div class="searchboxbody">
		<?php get_search_form(); ?>
		</div>
	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>