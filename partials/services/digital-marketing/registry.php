<?php
if (!function_exists('virtuo_digital_service_base_path')) {
    function virtuo_digital_service_base_path()
    {
        return '/digital-marketing-and-brand-development';
    }
}

if (!function_exists('virtuo_digital_service_default_slug')) {
    function virtuo_digital_service_default_slug()
    {
        return 'digital-marketing-brand-development-web-and-digital-solutions';
    }
}

if (!function_exists('virtuo_digital_service_groups')) {
    function virtuo_digital_service_groups()
    {
        return array(
            'digital-marketing-brand-development-web-and-digital-solutions' => array(
                'label' => 'Web & Digital Solutions',
                'children' => array(
                    'web-digital-solutions-website-design' => 'Website Design (UI/UX)',
                    'web-digital-solutions-website-development' => 'Website Development',
                    'web-digital-solutions-ecommerce-solutions' => 'E-Commerce Solutions',
                    'web-digital-solutions-landing-page-development' => 'Landing Page Development',
                    'web-digital-solutions-seo-performance-optimization' => 'SEO & Performance Optimization',
                    'web-digital-solutions-website-maintenance-support' => 'Website Maintenance & Support',
                ),
            ),
            'digital-marketing-brand-development-social-media-management' => array(
                'label' => 'Social Media Management',
                'children' => array(
                    'social-media-content-plan-strategy' => 'Content Plan & Strategy',
                    'social-media-content-creation' => 'Content Creation',
                    'social-media-community-management' => 'Community Management',
                    'social-media-influencer-marketing' => 'Influencer Marketing',
                ),
            ),
            'digital-marketing-brand-development-brand-development' => array(
                'label' => 'Brand Development',
                'children' => array(
                    'brand-development-brand-identity-design' => 'Brand Identity Design',
                    'brand-development-graphic-design' => 'Graphic Design',
                    'brand-development-video-production-motion-graphics' => 'Video Production & Motion Graphics',
                    'brand-development-marketing-collateral-design' => 'Marketing Collateral Design',
                    'brand-development-creative-direction-concept-development' => 'Creative Direction & Concept Development',
                ),
            ),
            'digital-marketing-brand-development-marketing-solutions' => array(
                'label' => 'Marketing Solutions',
                'children' => array(
                    'marketing-solutions-paid-advertising' => 'Paid Advertising (Meta & Google Ads)',
                    'marketing-solutions-content-marketing' => 'Content Marketing',
                    'marketing-solutions-brand-strategy-positioning' => 'Brand Strategy & Positioning',
                    'marketing-solutions-analytics-performance-marketing' => 'Analytics & Performance Marketing',
                ),
            ),
        );
    }
}

if (!function_exists('virtuo_digital_service_url')) {
    function virtuo_digital_service_url($slug)
    {
        $slug = (string) $slug;

        if ($slug === virtuo_digital_service_default_slug()) {
            return virtuo_digital_service_base_path();
        }

        return virtuo_digital_service_base_path() . '?tab=' . rawurlencode($slug);
    }
}

if (!function_exists('virtuo_digital_service_registry')) {
    function virtuo_digital_service_registry()
    {
        static $registry = null;

        if ($registry !== null) {
            return $registry;
        }

        $registry = array();

        foreach (virtuo_digital_service_groups() as $mainSlug => $group) {
            $mainLabel = $group['label'];
            $registry[$mainSlug] = virtuo_digital_service_make_entry($mainSlug, $mainLabel, $mainSlug, $mainLabel, 'main');

            foreach ($group['children'] as $childSlug => $childLabel) {
                $registry[$childSlug] = virtuo_digital_service_make_entry($childSlug, $childLabel, $mainSlug, $mainLabel, 'sub');
            }
        }

        return $registry;
    }
}

if (!function_exists('virtuo_digital_service_make_entry')) {
    function virtuo_digital_service_make_entry($slug, $label, $parentSlug, $parentLabel, $serviceType)
    {
        $contentFile = __DIR__ . '/content/' . $slug . '.php';
        $title = $label . ' UAE | Virtuo';
        $description = 'Explore Virtuo ' . $label . ' services for UAE businesses, including strategy, execution, optimization and support from a specialist digital marketing team.';

        return array(
            'slug' => $slug,
            'label' => $label,
            'parent' => $parentSlug,
            'parentLabel' => $parentLabel,
            'title' => $title,
            'metaDescription' => $description,
            'breadcrumbMain' => $parentLabel,
            'breadcrumbSub' => $serviceType === 'sub' ? $label : '',
            'canonicalPath' => virtuo_digital_service_url($slug),
            'partial' => $contentFile,
            'serviceType' => $label,
            'type' => $serviceType,
        );
    }
}

if (!function_exists('virtuo_digital_service_get')) {
    function virtuo_digital_service_get($slug = null)
    {
        $registry = virtuo_digital_service_registry();
        $slug = $slug === null || $slug === '' ? virtuo_digital_service_default_slug() : (string) $slug;

        return $registry[$slug] ?? null;
    }
}

if (!function_exists('virtuo_digital_service_resolve_slug')) {
    function virtuo_digital_service_resolve_slug($value)
    {
        $value = trim((string) $value);

        if ($value === '') {
            return virtuo_digital_service_default_slug();
        }

        $value = ltrim($value, '#');

        return virtuo_digital_service_get($value) ? $value : '';
    }
}

if (!function_exists('virtuo_digital_service_render_content')) {
    function virtuo_digital_service_render_content($entry)
    {
        if (!is_array($entry) || empty($entry['partial']) || !is_readable($entry['partial'])) {
            return '';
        }

        ob_start();
        include $entry['partial'];
        return ob_get_clean();
    }
}

if (!function_exists('virtuo_digital_service_extract_faqs')) {
    function virtuo_digital_service_extract_faqs($html)
    {
        $faqs = array();

        if (preg_match_all('/<button[^>]*class=["\'][^"\']*accordion-button[^"\']*["\'][^>]*>(.*?)<\/button>\s*<\/h2>\s*<div[^>]*class=["\'][^"\']*accordion-collapse[^"\']*["\'][^>]*>\s*<div[^>]*class=["\'][^"\']*accordion-body[^"\']*["\'][^>]*>(.*?)<\/div>/is', (string) $html, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $question = trim(strip_tags(html_entity_decode($match[1], ENT_QUOTES, 'UTF-8')));
                $answer = trim(strip_tags(html_entity_decode($match[2], ENT_QUOTES, 'UTF-8')));

                if ($question !== '' && $answer !== '') {
                    $faqs[] = array('question' => $question, 'answer' => $answer);
                }
            }
        }

        return $faqs;
    }
}
