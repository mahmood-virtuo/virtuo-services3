<section class="blog__post-area-five section-py-130">
    <div class="container site-content-gutter custom-container">
        <div class="blog-listing-layout">
            <div class="blog-sidebar-stack">
                <aside class="blog-left-sidebar-column">
                    <div class="blog__sidebar blog-left-normal-sidebar">
                        <?php include __DIR__ . '/blog-sidebar-categories.php'; ?>
                    </div>
                    <div class="blog-left-recent-sticky-slot">
                        <div class="blog-left-recent-sticky-inner">
                            <?php include __DIR__ . '/blog-recent-posts.php'; ?>
                        </div>
                    </div>
                </aside>

                <aside class="blog-right-sidebar-column">
                    <div class="blog__sidebar blog-right-normal-sidebar">
                        <?php include __DIR__ . '/blog-sidebar-tags.php'; ?>
                    </div>
                    <div class="blog-right-sticky-slot">
                        <div class="blog-right-sticky-inner">
                            <?php include __DIR__ . '/sidebar-consultation-form.php'; ?>
                        </div>
                    </div>
                </aside>
            </div>

            <div class="blog-main-column">
                <div class="inner-blog-post-wrap">
                    <?php if (!empty($blogListingTitle) || !empty($blogListingDescription)) : ?>
                        <div class="blog-taxonomy-intro mb-40">
                            <?php if (!empty($blogListingTitle)) : ?>
                                <h2 class="title"><?php echo htmlspecialchars($blogListingTitle, ENT_QUOTES, 'UTF-8'); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($blogListingDescription)) : ?>
                                <p><?php echo htmlspecialchars($blogListingDescription, ENT_QUOTES, 'UTF-8'); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($pagedBlogPosts)) : ?>
                        <?php foreach ($pagedBlogPosts as $blogPost) : ?>
                            <?php include __DIR__ . '/blog-post-card.php'; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No posts found.</p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>
