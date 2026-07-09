<?php
require_once __DIR__ . '/blog-posts.php';

if (!function_exists('virtuo_blog_categories')) {
    function virtuo_blog_categories()
    {
        return array(
            'business-setup-structuring' => array(
                'label' => 'Business Setup & Structuring',
                'description' => 'UAE company formation, Mainland, Free Zone, Offshore, tax, banking, and cross-border structuring insights.',
                'seo_title' => 'Business Setup & Structuring Insights | Virtuo',
                'seo_description' => 'Read Virtuo insights on UAE business setup, Mainland, Free Zone, Offshore, corporate tax, banking readiness and structuring strategy.',
            ),
            'industry-trade-strategy' => array(
                'label' => 'Industry & Trade Strategy',
                'description' => 'Industry-specific UAE strategy for trade, logistics, electronics, ITAD, and cross-border operators.',
                'seo_title' => 'Industry & Trade Strategy Insights | Virtuo',
                'seo_description' => 'Explore Virtuo insights on UAE industry strategy, trade routes, Free Zones, logistics, electronics and cross-border business operations.',
            ),
            'residency-immigration' => array(
                'label' => 'Residency & Immigration',
                'description' => 'Guides on UAE residency routes including Golden Visa, Freelance Visa, Green Residence, and family sponsorship.',
                'seo_title' => 'Residency & Immigration Insights | Virtuo',
                'seo_description' => 'Read Virtuo guidance on UAE Golden Visa, Freelance Visa, Green Residence, residency planning and immigration options.',
            ),
            'uae-tax-compliance' => array(
                'label' => 'UAE Tax & Compliance',
                'description' => 'UAE tax, VAT, corporate tax, compliance, and business filing guidance for founders and operators.',
                'seo_title' => 'UAE Tax & Compliance Insights | Virtuo',
                'seo_description' => 'Read Virtuo insights on UAE corporate tax, VAT, compliance, business filing requirements and tax-efficient structuring.',
            ),
            'business-strategy' => array(
                'label' => 'Business Strategy',
                'description' => 'Strategic guidance for founders, investors, and growing UAE businesses.',
                'seo_title' => 'Business Strategy Insights | Virtuo',
                'seo_description' => 'Virtuo business strategy insights for UAE founders, investors and growing companies.',
            ),
            'finance-advisory' => array(
                'label' => 'Finance Advisory',
                'description' => 'Finance, planning, and advisory perspectives for UAE business operators.',
                'seo_title' => 'Finance Advisory Insights | Virtuo',
                'seo_description' => 'Virtuo finance advisory insights for UAE business planning and operational readiness.',
            ),
            'marketing-analysis' => array(
                'label' => 'Marketing Analysis',
                'description' => 'Marketing and brand development analysis for UAE businesses.',
                'seo_title' => 'Marketing Analysis Insights | Virtuo',
                'seo_description' => 'Virtuo marketing analysis and brand development insights for businesses in the UAE.',
            ),
            'investment-planning' => array(
                'label' => 'Investment Planning',
                'description' => 'Investment planning perspectives for UAE market entry and growth.',
                'seo_title' => 'Investment Planning Insights | Virtuo',
                'seo_description' => 'Virtuo investment planning insights for UAE market entry, business growth and long-term structuring.',
            ),
            'data-analysis' => array(
                'label' => 'Data Analysis',
                'description' => 'Data-driven perspectives for business decisions and operations.',
                'seo_title' => 'Data Analysis Insights | Virtuo',
                'seo_description' => 'Virtuo data analysis insights for business planning, strategy and operations.',
            ),
        );
    }
}

if (!function_exists('virtuo_blog_tags')) {
    function virtuo_blog_tags()
    {
        return array(
            'uae-structuring' => 'UAE Structuring',
            'mainland-company' => 'Mainland Company',
            'free-zone-qfzp' => 'Free Zone & QFZP',
            'offshore-company' => 'Offshore Company',
            'corporate-tax' => 'Corporate Tax',
            'us-founders' => 'U.S. Founders',
            'cross-border-structuring' => 'Cross-Border Structuring',
            'wireless-itad' => 'Wireless & ITAD',
            'electronics-trade' => 'Electronics Trade',
            'jafza' => 'JAFZA',
            'dafz' => 'DAFZ',
            'free-zone' => 'Free Zone',
            'uae-logistics' => 'UAE Logistics',
            'uae-strategy' => 'UAE Strategy',
            'business-setup' => 'Business Setup',
            'vat' => 'VAT',
            'uae-tax' => 'UAE Tax',
            'banking-readiness' => 'Banking Readiness',
            'compliance' => 'Compliance',
            'entrepreneur-route' => 'Entrepreneur Route',
            'uae-business-base' => 'UAE Business Base',
            'golden-visa' => 'Golden Visa',
            'uae-residency' => 'UAE Residency',
            'property-investor' => 'Property Investor',
            'skilled-professional' => 'Skilled Professional',
            'entrepreneur-visa' => 'Entrepreneur Visa',
            'family-sponsorship' => 'Family Sponsorship',
            'freelance-visa' => 'Freelance Visa',
            'green-residence' => 'Green Residence',
            'independent-professionals' => 'Independent Professionals',
            'virtual-work-visa' => 'Virtual Work Visa',
            'freelance-permit' => 'Freelance Permit',
        );
    }
}

if (!function_exists('virtuo_blog_curated_popular_tag_slugs')) {
    function virtuo_blog_curated_popular_tag_slugs()
    {
        return array(
            'free-zone-qfzp',
            'golden-visa',
            'corporate-tax',
            'uae-structuring',
            'freelance-visa',
            'green-residence',
            'business-setup',
            'banking-readiness',
            'us-founders',
            'cross-border-structuring',
        );
    }
}

if (!function_exists('virtuo_blog_humanize_slug')) {
    function virtuo_blog_humanize_slug($slug)
    {
        return ucwords(str_replace('-', ' ', (string) $slug));
    }
}

if (!function_exists('virtuo_blog_get_category_label')) {
    function virtuo_blog_get_category_label($slug)
    {
        $categories = virtuo_blog_categories();

        return $categories[$slug]['label'] ?? virtuo_blog_humanize_slug($slug);
    }
}

if (!function_exists('virtuo_blog_get_category_description')) {
    function virtuo_blog_get_category_description($slug)
    {
        $categories = virtuo_blog_categories();

        return $categories[$slug]['description'] ?? '';
    }
}

if (!function_exists('virtuo_blog_get_tag_label')) {
    function virtuo_blog_get_tag_label($slug)
    {
        $tags = virtuo_blog_tags();

        return $tags[$slug] ?? virtuo_blog_humanize_slug($slug);
    }
}

if (!function_exists('virtuo_blog_get_category_url')) {
    function virtuo_blog_get_category_url($slug)
    {
        return '/blog/category/' . rawurlencode((string) $slug);
    }
}

if (!function_exists('virtuo_blog_get_tag_url')) {
    function virtuo_blog_get_tag_url($slug)
    {
        return '/blog/tag/' . rawurlencode((string) $slug);
    }
}

if (!function_exists('virtuo_blog_category_exists')) {
    function virtuo_blog_category_exists($slug)
    {
        $categories = virtuo_blog_categories();

        return isset($categories[$slug]);
    }
}

if (!function_exists('virtuo_blog_tag_exists')) {
    function virtuo_blog_tag_exists($slug)
    {
        $tags = virtuo_blog_tags();

        return isset($tags[$slug]);
    }
}

if (!function_exists('virtuo_blog_count_posts_by_category')) {
    function virtuo_blog_count_posts_by_category($posts = null)
    {
        $counts = array();

        foreach (($posts ?? virtuo_get_blog_posts()) as $post) {
            $category = trim((string) ($post['category'] ?? ''));

            if ($category === '') {
                continue;
            }

            $counts[$category] = ($counts[$category] ?? 0) + 1;
        }

        return $counts;
    }
}

if (!function_exists('virtuo_blog_count_posts_by_tag')) {
    function virtuo_blog_count_posts_by_tag($posts = null)
    {
        $counts = array();

        foreach (($posts ?? virtuo_get_blog_posts()) as $post) {
            foreach (($post['tags'] ?? array()) as $tag) {
                $tag = trim((string) $tag);

                if ($tag === '') {
                    continue;
                }

                $counts[$tag] = ($counts[$tag] ?? 0) + 1;
            }
        }

        return $counts;
    }
}

if (!function_exists('virtuo_blog_get_sorted_categories')) {
    function virtuo_blog_get_sorted_categories($showEmptyCategories = false, $posts = null)
    {
        $categories = virtuo_blog_categories();
        $counts = virtuo_blog_count_posts_by_category($posts);
        $items = array();

        foreach ($categories as $slug => $category) {
            $count = $counts[$slug] ?? 0;

            if (!$showEmptyCategories && $count === 0) {
                continue;
            }

            $items[] = array(
                'slug' => $slug,
                'label' => $category['label'],
                'count' => $count,
            );
        }

        usort($items, function ($a, $b) {
            if ($a['count'] !== $b['count']) {
                return $b['count'] <=> $a['count'];
            }

            return strcasecmp($a['label'], $b['label']);
        });

        return $items;
    }
}

if (!function_exists('virtuo_blog_filter_posts_by_category')) {
    function virtuo_blog_filter_posts_by_category($slug, $posts = null)
    {
        return array_values(array_filter($posts ?? virtuo_get_blog_posts(), function ($post) use ($slug) {
            return ($post['category'] ?? '') === $slug;
        }));
    }
}

if (!function_exists('virtuo_blog_filter_posts_by_tag')) {
    function virtuo_blog_filter_posts_by_tag($slug, $posts = null)
    {
        return array_values(array_filter($posts ?? virtuo_get_blog_posts(), function ($post) use ($slug) {
            return in_array($slug, $post['tags'] ?? array(), true);
        }));
    }
}

if (!function_exists('virtuo_blog_get_popular_tag_slugs')) {
    function virtuo_blog_get_popular_tag_slugs($limit = 10, $posts = null)
    {
        $counts = virtuo_blog_count_posts_by_tag($posts);
        $popularTags = array();

        foreach (virtuo_blog_curated_popular_tag_slugs() as $slug) {
            if (isset($counts[$slug])) {
                $popularTags[] = $slug;
            }
        }

        if (count($popularTags) < $limit) {
            $remainingTags = array_diff(array_keys($counts), $popularTags);

            usort($remainingTags, function ($a, $b) use ($counts) {
                if ($counts[$a] !== $counts[$b]) {
                    return $counts[$b] <=> $counts[$a];
                }

                return strcasecmp(virtuo_blog_get_tag_label($a), virtuo_blog_get_tag_label($b));
            });

            foreach ($remainingTags as $slug) {
                $popularTags[] = $slug;

                if (count($popularTags) >= $limit) {
                    break;
                }
            }
        }

        return array_slice($popularTags, 0, $limit);
    }
}
