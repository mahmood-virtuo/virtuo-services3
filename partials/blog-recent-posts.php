<?php
require_once __DIR__ . '/blog-posts.php';

$recentPosts = array_slice(virtuo_get_blog_posts(), 0, 5);
?>
<div class="sidebar__widget">
    <h4 class="sidebar__widget-title">Recent Posts</h4>
    <div class="rc-post-wrap">
        <?php foreach ($recentPosts as $recentPost) : ?>
            <div class="rc-post-item">
                <div class="thumb">
                    <a href="<?php echo htmlspecialchars($recentPost['url'], ENT_QUOTES, 'UTF-8'); ?>"><img src="<?php echo htmlspecialchars($recentPost['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($recentPost['alt'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async" width="300" height="300"></a>
                </div>
                <div class="content">
                    <span class="date">
                        <img src="/assets/img/icons/calendar.svg" alt="" class="injectable">
                        <?php echo htmlspecialchars($recentPost['date'], ENT_QUOTES, 'UTF-8'); ?>
                    </span>
                    <h2 class="title"><a href="<?php echo htmlspecialchars($recentPost['url'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($recentPost['title'], ENT_QUOTES, 'UTF-8'); ?></a></h2>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
