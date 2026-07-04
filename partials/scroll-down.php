<?php
$scrollTarget = $scrollTarget ?? '#main-content';
$scrollLabel = $scrollLabel ?? 'Scroll to next section';
$scrollText = $scrollText ?? 'Scroll';
?>

<a href="<?php echo htmlspecialchars($scrollTarget, ENT_QUOTES, 'UTF-8'); ?>" class="hero-scroll-down js-hero-scroll-down" aria-label="<?php echo htmlspecialchars($scrollLabel, ENT_QUOTES, 'UTF-8'); ?>">
    <span class="hero-scroll-down__chevrons" aria-hidden="true">
        <span class="hero-scroll-down__chevron"></span>
        <span class="hero-scroll-down__chevron"></span>
    </span>
    <span class="hero-scroll-down__text"><?php echo htmlspecialchars($scrollText, ENT_QUOTES, 'UTF-8'); ?></span>
</a>

<?php
unset($scrollTarget, $scrollLabel, $scrollText);
?>
