<aside class="blog-details-right-sidebar-column">
    <div class="blog__sidebar blog__sidebar-two blog-details-right-normal-sidebar">
        <?php $showBlogFilterClear = false; ?>
        <?php include __DIR__ . '/blog-sidebar-tags.php'; ?>
        <?php unset($showBlogFilterClear); ?>
        <div class="sidebar__widget">
            <nav class="blog-toc" aria-label="Article quick links">
                <h4 class="sidebar__widget-title blog-toc__title">In This Article</h4>
                <ol class="blog-toc__list" id="blogArticleToc"></ol>
            </nav>
        </div>
    </div>
    <div class="blog-details-right-sticky-slot">
        <div class="blog-details-right-sticky-inner">
            <?php include __DIR__ . '/sidebar-consultation-form.php'; ?>
        </div>
    </div>
</aside>
