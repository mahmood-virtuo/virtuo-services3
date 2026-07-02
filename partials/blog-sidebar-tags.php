<?php
require_once __DIR__ . '/blog-taxonomy.php';

$popularTags = virtuo_blog_get_popular_tag_slugs(10);
?>
<div class="sidebar__widget">
    <h4 class="sidebar__widget-title">Popular Tags</h4>
    <div class="sidebar__tag-list">
        <ul class="list-wrap">
            <?php foreach ($popularTags as $tag): ?>
                <li><a class="tag-item" href="<?php echo htmlspecialchars(virtuo_blog_get_tag_url($tag), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(virtuo_blog_get_tag_label($tag), ENT_QUOTES, 'UTF-8'); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
