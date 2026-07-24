<?php
$blogPostListingImage = trim((string) ($blogPost['listingImage'] ?? ''));
$blogPostImage = (string) ($blogPost['image'] ?? '');
$blogPostListingImagePath = $blogPostListingImage !== '' ? dirname(__DIR__) . '/' . ltrim($blogPostListingImage, '/') : '';
$blogPostCardImage = (!empty($useBlogListingImage) && $blogPostListingImagePath !== '' && is_file($blogPostListingImagePath)) ? $blogPostListingImage : $blogPostImage;
$blogPostCardImageSrcset = '';
$blogPostCardImageSizes = '';
$blogPostCardImageWidth = 900;
$blogPostCardImageHeight = 643;

if (!empty($useBlogListingImage) && $blogPostCardImage === $blogPostListingImage) {
    $blogPostListingImageDirectory = dirname($blogPostListingImage);
    $blogPostListingImageFilename = pathinfo($blogPostListingImage, PATHINFO_FILENAME);
    $blogPostListingImageBase = $blogPostListingImageDirectory . '/' . $blogPostListingImageFilename;
    $blogPostListingImageSmall = $blogPostListingImageBase . '-480.webp';
    $blogPostListingImageLarge = $blogPostListingImageBase . '-960.webp';
    $blogPostListingImageSmallPath = dirname(__DIR__) . '/' . ltrim($blogPostListingImageSmall, '/');
    $blogPostListingImageLargePath = dirname(__DIR__) . '/' . ltrim($blogPostListingImageLarge, '/');

    // Listing-only variants keep mobile cards from downloading the original multi-megabyte JPGs.
    if (is_file($blogPostListingImageSmallPath) && is_file($blogPostListingImageLargePath)) {
        $blogPostCardImage = $blogPostListingImageLarge;
        $blogPostCardImageSrcset = $blogPostListingImageSmall . ' 480w, ' . $blogPostListingImageLarge . ' 960w';
        $blogPostCardImageSizes = '(max-width: 575px) calc(100vw - 28px), (max-width: 991px) calc(100vw - 48px), 960px';
        $blogPostCardImageWidth = 960;
        $blogPostCardImageHeight = 450;
    }
}

$blogPostOverlaySegments = array();

if (!empty($blogPost['listingOverlaySegments']) && is_array($blogPost['listingOverlaySegments'])) {
    foreach ($blogPost['listingOverlaySegments'] as $blogPostOverlaySegment) {
        if (!is_array($blogPostOverlaySegment)) {
            continue;
        }

        $blogPostOverlaySegmentText = trim((string) ($blogPostOverlaySegment['text'] ?? ''));

        if ($blogPostOverlaySegmentText === '') {
            continue;
        }

        $blogPostOverlaySegmentTone = (string) ($blogPostOverlaySegment['tone'] ?? 'default');
        $blogPostOverlaySegments[] = array(
            'text' => $blogPostOverlaySegmentText,
            'tone' => in_array($blogPostOverlaySegmentTone, array('accent', 'default'), true) ? $blogPostOverlaySegmentTone : 'default',
            'breakBefore' => !empty($blogPostOverlaySegment['breakBefore']),
        );
    }
}

if (empty($blogPostOverlaySegments)) {
    $blogPostOverlayAccent = trim((string) ($blogPost['listingOverlayAccent'] ?? ''));
    $blogPostOverlayText = trim((string) ($blogPost['listingOverlayText'] ?? ''));

    if ($blogPostOverlayAccent !== '') {
        $blogPostOverlaySegments[] = array('text' => $blogPostOverlayAccent, 'tone' => 'accent', 'breakBefore' => false);
    }

    if ($blogPostOverlayText !== '') {
        $blogPostOverlaySegments[] = array('text' => $blogPostOverlayText, 'tone' => 'default', 'breakBefore' => false);
    }
}

if (empty($blogPostOverlaySegments)) {
    $blogPostOverlayFallbackTitle = trim((string) ($blogPost['title'] ?? ''));

    if ($blogPostOverlayFallbackTitle !== '') {
        $blogPostOverlaySegments[] = array('text' => $blogPostOverlayFallbackTitle, 'tone' => 'default', 'breakBefore' => false);
    }
}

$blogPostShouldRenderOverlay = !empty($useBlogListingOverlay) && !empty($blogPostOverlaySegments);
?>
<div class="blog__post-item-five<?php if (!empty($blogLoadItemInitiallyHidden)) : ?> blog-load-hidden<?php endif; ?>"<?php if (!empty($blogLoadItemEnabled)) : ?> data-blog-load-item<?php endif; ?>>
    <div class="blog__post-thumb-five">
        <a href="<?php echo htmlspecialchars($blogPost['url'], ENT_QUOTES, 'UTF-8'); ?>"<?php if ($blogPostShouldRenderOverlay) : ?> class="blog-listing-image-link--overlay"<?php endif; ?>>
            <img src="<?php echo htmlspecialchars($blogPostCardImage, ENT_QUOTES, 'UTF-8'); ?>"<?php if ($blogPostCardImageSrcset !== '') : ?> srcset="<?php echo htmlspecialchars($blogPostCardImageSrcset, ENT_QUOTES, 'UTF-8'); ?>" sizes="<?php echo htmlspecialchars($blogPostCardImageSizes, ENT_QUOTES, 'UTF-8'); ?>"<?php endif; ?> alt="<?php echo htmlspecialchars($blogPost['alt'], ENT_QUOTES, 'UTF-8'); ?>" loading="<?php echo !empty($blogPostEager) ? 'eager' : 'lazy'; ?>" decoding="async" width="<?php echo htmlspecialchars((string) $blogPostCardImageWidth, ENT_QUOTES, 'UTF-8'); ?>" height="<?php echo htmlspecialchars((string) $blogPostCardImageHeight, ENT_QUOTES, 'UTF-8'); ?>">
            <?php if ($blogPostShouldRenderOverlay) : ?>
                <span class="blog-listing-image-overlay" aria-hidden="true">
                    <span class="blog-listing-image-overlay__title">
                        <?php foreach ($blogPostOverlaySegments as $blogPostOverlaySegmentIndex => $blogPostOverlaySegment) : ?><?php if (!empty($blogPostOverlaySegment['breakBefore']) && $blogPostOverlaySegmentIndex > 0) : ?><br class="blog-listing-image-overlay__break" aria-hidden="true"><?php elseif ($blogPostOverlaySegmentIndex > 0) : ?> <?php endif; ?><span class="blog-listing-image-overlay__segment blog-listing-image-overlay__segment--<?php echo htmlspecialchars($blogPostOverlaySegment['tone'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($blogPostOverlaySegment['text'], ENT_QUOTES, 'UTF-8'); ?></span><?php endforeach; ?>
                    </span>
                </span>
            <?php endif; ?>
        </a>
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
