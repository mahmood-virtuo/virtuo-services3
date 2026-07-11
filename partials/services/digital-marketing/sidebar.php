<?php
$digitalServiceGroups = virtuo_digital_service_groups();
$digitalActiveSlug = $digitalActiveSlug ?? virtuo_digital_service_default_slug();
$digitalActiveEntry = virtuo_digital_service_get($digitalActiveSlug);
$digitalActiveParent = $digitalActiveEntry['parent'] ?? $digitalActiveSlug;

if (!function_exists('virtuo_digital_service_arrow')) {
    function virtuo_digital_service_arrow()
    {
        return '<span class="digital-service-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="14" viewBox="0 0 24 14" fill="none" aria-hidden="true" focusable="false"><path d="M1 6.7777H22.6667M22.6667 6.7777L16.9683 1M22.6667 6.7777L16.9683 12.5556" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></span>';
    }
}
?>
<div class="sidebar__cat-list digital-service-tabs" data-digital-service-nav>
    <ul class="list-wrap digital-service-main-list">
        <?php foreach ($digitalServiceGroups as $mainSlug => $group) : ?>
            <?php
            $isMainActive = $digitalActiveParent === $mainSlug;
            $isExactMain = $digitalActiveSlug === $mainSlug;
            ?>
            <li class="digital-service-main-item<?php echo $isMainActive ? ' is-open' : ''; ?>">
                <a href="<?php echo htmlspecialchars(virtuo_digital_service_url($mainSlug), ENT_QUOTES, 'UTF-8'); ?>" class="digital-service-main-link<?php echo $isExactMain ? ' is-active' : ''; ?>" data-service-tab="<?php echo htmlspecialchars($mainSlug, ENT_QUOTES, 'UTF-8'); ?>" data-digital-service-link="<?php echo htmlspecialchars($mainSlug, ENT_QUOTES, 'UTF-8'); ?>"<?php echo $isExactMain ? ' aria-current="page"' : ''; ?>>
                    <?php echo htmlspecialchars($group['label'], ENT_QUOTES, 'UTF-8'); ?>
                    <?php echo virtuo_digital_service_arrow(); ?>
                </a>

                <ul class="digital-service-sub-list">
                    <?php foreach ($group['children'] as $childSlug => $childLabel) : ?>
                        <?php $isChildActive = $digitalActiveSlug === $childSlug; ?>
                        <li>
                            <a href="<?php echo htmlspecialchars(virtuo_digital_service_url($childSlug), ENT_QUOTES, 'UTF-8'); ?>" class="digital-service-sub-link<?php echo $isChildActive ? ' is-active' : ''; ?>" data-parent-tab="<?php echo htmlspecialchars($mainSlug, ENT_QUOTES, 'UTF-8'); ?>" data-digital-service-link="<?php echo htmlspecialchars($childSlug, ENT_QUOTES, 'UTF-8'); ?>"<?php echo $isChildActive ? ' aria-current="page"' : ''; ?>>
                                <?php echo htmlspecialchars($childLabel, ENT_QUOTES, 'UTF-8'); ?>
                                <?php echo virtuo_digital_service_arrow(); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
