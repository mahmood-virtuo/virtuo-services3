<?php
require_once __DIR__ . '/blog-posts.php';

$currentBlogPost = virtuo_get_current_blog_post($seoPage ?? null);
$sharePath = $seoPage['path'] ?? ($currentBlogPost['url'] ?? '/blog');
$shareTitle = $seoPage['title'] ?? ($currentBlogPost['detail_title'] ?? ($currentBlogPost['title'] ?? 'Virtuo Blog'));
$sharePath = parse_url((string) $sharePath, PHP_URL_PATH) ?: '/blog';
$shareUrl = 'https://virtuo.ae' . $sharePath;
$encodedShareUrl = rawurlencode($shareUrl);
$encodedShareTitle = rawurlencode($shareTitle);
?>
<div class="post-share">
    <h5 class="title">Social Share:</h5>
    <ul class="list-wrap">
        <li>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $encodedShareUrl; ?>" target="_blank" rel="noopener" aria-label="Share on LinkedIn">
                <img src="/assets/img/icons/linkedin2.svg" alt="" class="injectable" />
            </a>
        </li>
        <li>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $encodedShareUrl; ?>" target="_blank" rel="noopener" aria-label="Share on Facebook">
                <img src="/assets/img/icons/Facebook2.svg" alt="" class="injectable" />
            </a>
        </li>
        <li>
            <a href="https://wa.me/?text=<?php echo rawurlencode($shareTitle . ' ' . $shareUrl); ?>" target="_blank" rel="noopener" aria-label="Share on WhatsApp">
                <img src="/assets/img/icons/Whatsapp2.svg" alt="" class="injectable" />
            </a>
        </li>
        <li>
            <a href="https://twitter.com/intent/tweet?text=<?php echo $encodedShareTitle; ?>&amp;url=<?php echo $encodedShareUrl; ?>" target="_blank" rel="noopener" aria-label="Share on X">
                <img src="/assets/img/icons/twitter.svg" alt="" class="injectable" />
            </a>
        </li>
    </ul>
</div>
