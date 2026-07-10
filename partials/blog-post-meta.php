<?php
$blogMetaDate = '';

if (!empty($currentBlogPost['date'])) {
    $blogMetaDate = $currentBlogPost['date'];
} elseif (!empty($postDatePublished)) {
    $blogMetaDate = $postDatePublished;
} elseif (!empty($post_date_pub)) {
    $blogMetaDate = $post_date_pub;
} elseif (!empty($seoPage['datePublished'])) {
    $blogMetaDate = $seoPage['datePublished'];
}

$blogMetaTimestamp = $blogMetaDate !== '' ? strtotime($blogMetaDate) : false;
$blogMetaDisplayDate = $blogMetaTimestamp ? date('M j, Y', $blogMetaTimestamp) : $blogMetaDate;
?>
<?php if ($blogMetaDisplayDate !== '') : ?>
    <div class="blog__post-meta blog__post-meta--date-only">
        <ul class="list-wrap">
            <li><img src="/assets/img/icons/calendar.svg" alt="" class="injectable"><?php echo htmlspecialchars($blogMetaDisplayDate, ENT_QUOTES, 'UTF-8'); ?></li>
        </ul>
    </div>
<?php endif; ?>
