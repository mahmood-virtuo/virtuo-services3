<?php
require_once __DIR__ . '/asset-helper.php';

if (!empty($virtuoMainStylesLoaded)) {
    return;
}

$virtuoMainStylesLoaded = true;
$virtuoCssFamilies = array(
    'home' => 'home',
    'about' => 'about',
    'contact' => 'contact',
    'services' => 'services',
    'blog-listing' => 'blog-listing',
    'blog-details' => 'blog-details',
    'legal' => 'legal',
    'error' => 'error',
);
$virtuoSelectedCssFamily = isset($virtuoCssFamily) ? (string) $virtuoCssFamily : '';
$virtuoCoreStylesheet = '/assets/css/bundles/core.min.css';
$virtuoHomeCriticalStylesheet = '/assets/css/bundles/home-core-critical.min.css';
$virtuoRootBlogCriticalStylesheet = '/assets/css/bundles/blog-listing-core-critical.min.css';
$virtuoIntlTelStylesheetUrl = 'https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/css/intlTelInput.css';

if (isset($virtuoCssFamilies[$virtuoSelectedCssFamily])) {
    $virtuoStylesheets = array(
        $virtuoCoreStylesheet,
        '/assets/css/bundles/' . $virtuoCssFamilies[$virtuoSelectedCssFamily] . '.min.css',
    );
} else {
    $virtuoStylesheets = array('/assets/css/main.min.css');
}

$virtuoRootBlogCriticalCssPath = dirname(__DIR__) . $virtuoRootBlogCriticalStylesheet;
$virtuoRootBlogCriticalCss = (
    !empty($virtuoUseRootBlogCriticalCss) &&
    $virtuoSelectedCssFamily === 'blog-listing' &&
    is_readable($virtuoRootBlogCriticalCssPath)
) ? file_get_contents($virtuoRootBlogCriticalCssPath) : false;
$virtuoHasRootBlogCriticalCss = (
    is_string($virtuoRootBlogCriticalCss) &&
    trim($virtuoRootBlogCriticalCss) !== '' &&
    !empty($virtuoRootBlogPreMainStylesheets) &&
    is_array($virtuoRootBlogPreMainStylesheets)
);

if ($virtuoHasRootBlogCriticalCss) {
    $virtuoRootBlogStylesheets = array();

    foreach ($virtuoRootBlogPreMainStylesheets as $virtuoRootBlogStylesheet) {
        if (empty($virtuoRootBlogStylesheet['path'])) {
            continue;
        }

        $virtuoRootBlogStylesheets[] = array(
            'url' => virtuo_asset_url($virtuoRootBlogStylesheet['path']),
            'media' => (string) ($virtuoRootBlogStylesheet['media'] ?? ''),
        );
    }

    $virtuoRootBlogStylesheets[] = array('url' => $virtuoIntlTelStylesheetUrl, 'media' => '');

    foreach (array_unique($virtuoStylesheets) as $virtuoStylesheet) {
        $virtuoRootBlogStylesheets[] = array(
            'url' => virtuo_asset_url($virtuoStylesheet),
            'media' => '',
        );
    }

    $virtuoRootBlogDeferredCount = count(array_filter(
        $virtuoRootBlogStylesheets,
        static function ($virtuoRootBlogStylesheet) {
            return $virtuoRootBlogStylesheet['media'] === '';
        }
    ));
    ?>
    <style data-virtuo-critical="root-blog-listing"><?php echo $virtuoRootBlogCriticalCss; ?></style>
    <script>
    // Activate the complete root-blog cascade together after every non-media preload settles.
    (function () {
        var pending = <?php echo (int) $virtuoRootBlogDeferredCount; ?>;
        var activated = false;

        window.virtuoRootBlogStyleReady = function () {
            pending -= 1;

            if (pending > 0 || activated) {
                return;
            }

            activated = true;
            var links = document.querySelectorAll('link[data-virtuo-root-blog-style="deferred"]');

            for (var index = 0; index < links.length; index += 1) {
                links[index].rel = 'stylesheet';
                links[index].removeAttribute('as');
            }
        };
    }());
    </script>
    <?php foreach ($virtuoRootBlogStylesheets as $virtuoRootBlogStylesheet) : ?>
        <?php if ($virtuoRootBlogStylesheet['media'] !== '') : ?>
    <link rel="preload" as="style" href="<?php echo htmlspecialchars($virtuoRootBlogStylesheet['url'], ENT_QUOTES, 'UTF-8'); ?>" media="<?php echo htmlspecialchars($virtuoRootBlogStylesheet['media'], ENT_QUOTES, 'UTF-8'); ?>" onload="this.onload=null;this.rel='stylesheet';this.removeAttribute('as')">
        <?php else : ?>
    <link rel="preload" as="style" href="<?php echo htmlspecialchars($virtuoRootBlogStylesheet['url'], ENT_QUOTES, 'UTF-8'); ?>" data-virtuo-root-blog-style="deferred" onload="this.onload=this.onerror=null;window.virtuoRootBlogStyleReady()" onerror="this.onload=this.onerror=null;window.virtuoRootBlogStyleReady()">
        <?php endif; ?>
    <?php endforeach; ?>
    <noscript>
        <?php foreach ($virtuoRootBlogStylesheets as $virtuoRootBlogStylesheet) : ?>
        <link rel="stylesheet" href="<?php echo htmlspecialchars($virtuoRootBlogStylesheet['url'], ENT_QUOTES, 'UTF-8'); ?>"<?php if ($virtuoRootBlogStylesheet['media'] !== '') : ?> media="<?php echo htmlspecialchars($virtuoRootBlogStylesheet['media'], ENT_QUOTES, 'UTF-8'); ?>"<?php endif; ?>>
        <?php endforeach; ?>
    </noscript>
    <?php
    unset(
        $virtuoCssFamilies,
        $virtuoSelectedCssFamily,
        $virtuoCoreStylesheet,
        $virtuoHomeCriticalStylesheet,
        $virtuoRootBlogCriticalStylesheet,
        $virtuoIntlTelStylesheetUrl,
        $virtuoStylesheets,
        $virtuoStylesheet,
        $virtuoRootBlogCriticalCssPath,
        $virtuoRootBlogCriticalCss,
        $virtuoHasRootBlogCriticalCss,
        $virtuoRootBlogStylesheets,
        $virtuoRootBlogStylesheet,
        $virtuoRootBlogDeferredCount
    );
    return;
}

if (!empty($virtuoUseRootBlogCriticalCss) && !empty($virtuoRootBlogPreMainStylesheets)) {
    // Fail safely: keep the root blog's original blocking delivery if the bundle is unavailable.
    foreach ($virtuoRootBlogPreMainStylesheets as $virtuoRootBlogStylesheet) {
        if (empty($virtuoRootBlogStylesheet['path'])) {
            continue;
        }
        ?>
<link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url($virtuoRootBlogStylesheet['path']), ENT_QUOTES, 'UTF-8'); ?>"<?php if (!empty($virtuoRootBlogStylesheet['media'])) : ?> media="<?php echo htmlspecialchars($virtuoRootBlogStylesheet['media'], ENT_QUOTES, 'UTF-8'); ?>"<?php endif; ?>>
        <?php
    }
}

?>
<?php if ($virtuoSelectedCssFamily === 'home' && !empty($deferHomepageFooterPhoneAssets)) : ?>
<noscript>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($virtuoIntlTelStylesheetUrl, ENT_QUOTES, 'UTF-8'); ?>">
</noscript>
<?php elseif ($virtuoSelectedCssFamily === 'home') : ?>
<link rel="preload" as="style" href="<?php echo htmlspecialchars($virtuoIntlTelStylesheetUrl, ENT_QUOTES, 'UTF-8'); ?>" onload="this.onload=null;this.rel='stylesheet'">
<noscript>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($virtuoIntlTelStylesheetUrl, ENT_QUOTES, 'UTF-8'); ?>">
</noscript>
<?php else : ?>
<link rel="stylesheet" href="<?php echo htmlspecialchars($virtuoIntlTelStylesheetUrl, ENT_QUOTES, 'UTF-8'); ?>">
<?php endif; ?>
<?php
foreach (array_unique($virtuoStylesheets) as $virtuoStylesheet) {
    if ($virtuoSelectedCssFamily === 'home' && $virtuoStylesheet === $virtuoCoreStylesheet) {
        $virtuoCriticalCssPath = dirname(__DIR__) . $virtuoHomeCriticalStylesheet;
        $virtuoCriticalCss = is_readable($virtuoCriticalCssPath) ? file_get_contents($virtuoCriticalCssPath) : false;

        if (is_string($virtuoCriticalCss) && trim($virtuoCriticalCss) !== '') {
            $virtuoCoreStylesheetUrl = virtuo_asset_url($virtuoCoreStylesheet);
            ?>
            <style data-virtuo-critical="home-core"><?php echo $virtuoCriticalCss; ?></style>
            <link rel="preload" as="style" href="<?php echo htmlspecialchars($virtuoCoreStylesheetUrl, ENT_QUOTES, 'UTF-8'); ?>" onload="this.onload=null;this.rel='stylesheet'">
            <noscript>
                <link rel="stylesheet" href="<?php echo htmlspecialchars($virtuoCoreStylesheetUrl, ENT_QUOTES, 'UTF-8'); ?>">
            </noscript>
            <?php
            continue;
        }
    }
    ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url($virtuoStylesheet), ENT_QUOTES, 'UTF-8'); ?>">
    <?php
}

unset(
    $virtuoCssFamilies,
    $virtuoSelectedCssFamily,
    $virtuoCoreStylesheet,
    $virtuoHomeCriticalStylesheet,
    $virtuoRootBlogCriticalStylesheet,
    $virtuoIntlTelStylesheetUrl,
    $virtuoStylesheets,
    $virtuoStylesheet,
    $virtuoCriticalCssPath,
    $virtuoCriticalCss,
    $virtuoCoreStylesheetUrl,
    $virtuoRootBlogCriticalCssPath,
    $virtuoRootBlogCriticalCss,
    $virtuoHasRootBlogCriticalCss,
    $virtuoRootBlogStylesheet
);
