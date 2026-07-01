<?php
require_once __DIR__ . '/blog-posts.php';

$currentBlogPost = virtuo_get_current_blog_post($seoPage ?? null);
$currentBlogTags = $currentBlogPost['tags'] ?? array();
?>
<ul class="list-wrap">
    <?php foreach ($currentBlogTags as $tag): ?>
        <li><span class="tag-item"><?php echo htmlspecialchars($tag, ENT_QUOTES, 'UTF-8'); ?></span></li>
    <?php endforeach; ?>
</ul>
