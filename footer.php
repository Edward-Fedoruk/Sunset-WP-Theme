<?php
/**
 * @package WordPress
 * @subpackage Sunset_Theme
 */
?>

<hr />
<div id="footer">
<!-- If you'd like to support WordPress, having the "powered by" link somewhere on your blog is the best way; it's our only promotion or advertising. -->
	<p>
	<a href="<?php bloginfo('rss2_url'); ?>"><strong>Entries (RSS)</strong></a>
		and <a href="<?php bloginfo('comments_rss2_url'); ?>"><strong>Comments (RSS)</strong></a> | Powered by
		<a href="http://wordpress.org/">WordPress</a> and <a href="http://www.etrecos.com/index.php/themes/" title="Sunset Theme was created by eTrecos">Sunset Theme</a>
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
	</p>
</div>
</div>

<!-- Gorgeous design by Michael Heilemann - http://binarybonsai.com/kubrick/ -->
<?php /* "Just what do you think you're doing Dave?" */ ?>

		<?php wp_footer(); ?>
</body>
</html>
