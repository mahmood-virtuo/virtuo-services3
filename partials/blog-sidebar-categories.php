<?php
require_once __DIR__ . '/blog-taxonomy.php';

$showEmptyCategories = true;
$blogCategories = virtuo_blog_get_sorted_categories($showEmptyCategories);
?>
<div class="sidebar__widget">
    <h4 class="sidebar__widget-title">Categories</h4>
    <div class="bs-cat-list">
        <ul class="list-wrap">
            <?php foreach ($blogCategories as $category): ?>
                <li>
                    <a href="<?php echo htmlspecialchars(virtuo_blog_get_category_url($category['slug']), ENT_QUOTES, 'UTF-8'); ?>">
                        <?php echo htmlspecialchars($category['label'], ENT_QUOTES, 'UTF-8'); ?>
                        <span>(<?php echo $category['count'] > 0 ? str_pad((string) $category['count'], 2, '0', STR_PAD_LEFT) : '0'; ?>)</span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
