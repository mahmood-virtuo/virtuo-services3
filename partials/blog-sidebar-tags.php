<?php
require_once __DIR__ . '/blog-posts.php';

$popularTags = virtuo_get_popular_blog_tags(10);
?>
<div class="sidebar__widget">
    <h4 class="sidebar__widget-title">Popular Tags</h4>
    <div class="sidebar__tag-list">
        <ul class="list-wrap">
            <?php foreach ($popularTags as $tag): ?>
                <li><span class="tag-item"><?php echo htmlspecialchars($tag, ENT_QUOTES, 'UTF-8'); ?></span></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
