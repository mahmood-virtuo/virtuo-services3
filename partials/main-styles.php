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

if (isset($virtuoCssFamilies[$virtuoSelectedCssFamily])) {
    $virtuoStylesheets = array(
        '/assets/css/bundles/core.min.css',
        '/assets/css/bundles/' . $virtuoCssFamilies[$virtuoSelectedCssFamily] . '.min.css',
    );
} else {
    $virtuoStylesheets = array('/assets/css/main.min.css');
}

$isHomePage = ($virtuoSelectedCssFamily === 'home');
if ($isHomePage) {
    $criticalCssPath = __DIR__ . '/../assets/css/bundles/home-critical.min.css';
    if (file_exists($criticalCssPath)) {
        echo '<style id="virtuo-home-critical-css">';
        echo file_get_contents($criticalCssPath);
        echo '</style>' . "\n";
    }
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/css/intlTelInput.css">
<?php
foreach (array_unique($virtuoStylesheets) as $virtuoStylesheet) {
    ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(virtuo_asset_url($virtuoStylesheet), ENT_QUOTES, 'UTF-8'); ?>">
    <?php
}

unset($virtuoCssFamilies, $virtuoSelectedCssFamily, $virtuoStylesheets, $virtuoStylesheet);
