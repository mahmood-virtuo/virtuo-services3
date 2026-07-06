<aside class="blog-details-left-sidebar-column">
    <div class="blog__sidebar blog-details-left-normal-sidebar">
        <?php $showBlogFilterClear = false; ?>
        <?php include __DIR__ . '/blog-sidebar-categories.php'; ?>
        <?php unset($showBlogFilterClear); ?>
    </div>
    <div class="blog-details-left-recent-sticky-slot">
        <div class="blog-details-left-recent-sticky-inner">
            <?php include __DIR__ . '/blog-recent-posts.php'; ?>
        </div>
    </div>
</aside>
