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
$virtuoIntlTelStylesheetUrl = 'https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/css/intlTelInput.css';

if (isset($virtuoCssFamilies[$virtuoSelectedCssFamily])) {
    $virtuoStylesheets = array(
        $virtuoCoreStylesheet,
        '/assets/css/bundles/' . $virtuoCssFamilies[$virtuoSelectedCssFamily] . '.min.css',
    );
} else {
    $virtuoStylesheets = array('/assets/css/main.min.css');
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
    $virtuoIntlTelStylesheetUrl,
    $virtuoStylesheets,
    $virtuoStylesheet,
    $virtuoCriticalCssPath,
    $virtuoCriticalCss,
    $virtuoCoreStylesheetUrl
);
