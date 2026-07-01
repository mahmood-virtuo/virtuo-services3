<div class="blog-details-sticky-sidebar">
    <aside class="blog__sidebar blog__sidebar-two blog-details-sticky-sidebar-inner">
        <?php include __DIR__ . '/blog-sidebar-categories.php'; ?>
        <?php include __DIR__ . '/blog-sidebar-tags.php'; ?>
        <?php include __DIR__ . '/blog-recent-posts.php'; ?>

        <div class="sidebar__widget">
            <nav class="blog-toc" aria-label="Article quick links">
                <h4 class="sidebar__widget-title blog-toc__title">In This Article</h4>
                <ol class="blog-toc__list" id="blogArticleToc"></ol>
            </nav>
        </div>
    </aside>

    <div class="blog-sidebar-form-sticky-slot">
        <?php include __DIR__ . '/sidebar-consultation-form.php'; ?>
    </div>
</div>
