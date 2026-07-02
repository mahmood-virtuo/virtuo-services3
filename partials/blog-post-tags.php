<?php
require_once __DIR__ . '/blog-taxonomy.php';

$currentBlogPost = virtuo_get_current_blog_post($seoPage ?? null);
$currentBlogTags = $currentBlogPost['tags'] ?? array();
?>
<ul class="list-wrap">
    <?php foreach ($currentBlogTags as $tag): ?>
        <li><a class="tag-item" href="<?php echo htmlspecialchars(virtuo_blog_get_tag_url($tag), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(virtuo_blog_get_tag_label($tag), ENT_QUOTES, 'UTF-8'); ?></a></li>
    <?php endforeach; ?>
</ul>
