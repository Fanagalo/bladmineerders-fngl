<?php

// limits the number of search results per page in Relevanssi
// source https://www.relevanssi.com/knowledge-base/posts-per-page/

add_filter('post_limits', 'postsperpage');
function postsperpage($limits) {
	if (is_search()) {
		global $wp_query;
		$wp_query->query_vars['posts_per_page'] = 1000;
	}
	return $limits;
}