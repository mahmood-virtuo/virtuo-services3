<div class="blog__post-item-five">
    <div class="blog__post-thumb-five">
        <a href="<?php echo htmlspecialchars($blogPost['url'], ENT_QUOTES, 'UTF-8'); ?>"><img src="<?php echo htmlspecialchars($blogPost['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($blogPost['alt'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async" width="900" height="643"></a>
    </div>
    <div class="blog__post-content-five">
        <div class="blog__post-meta">
            <ul class="list-wrap">
                <li>
                    <img src="/assets/img/icons/calendar.svg" alt="" class="injectable"> <?php echo htmlspecialchars($blogPost['date'], ENT_QUOTES, 'UTF-8'); ?>
                </li>
            </ul>
        </div>
        <h2 class="title"><a href="<?php echo htmlspecialchars($blogPost['url'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($blogPost['detail_title'], ENT_QUOTES, 'UTF-8'); ?></a></h2>
        <p><?php echo htmlspecialchars($blogPost['excerpt'], ENT_QUOTES, 'UTF-8'); ?></p>
        <a href="<?php echo htmlspecialchars($blogPost['url'], ENT_QUOTES, 'UTF-8'); ?>" class="tg-btn tg-btn-four tg-btn-six">Read More <img src="/assets/img/icons/right_arrow02.svg" alt="" class="injectable"></a>
    </div>
</div>
