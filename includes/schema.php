<?php
if (!function_exists('schema_clean_value')) {
    function schema_clean_value($value)
    {
        if (is_array($value)) {
            $clean = array();

            foreach ($value as $key => $item) {
                $item = schema_clean_value($item);

                if ($item === null || $item === '' || $item === array()) {
                    continue;
                }

                $clean[$key] = $item;
            }

            return $clean;
        }

        return $value;
    }
}

if (!function_exists('schema_to_url')) {
    function schema_to_url($path)
    {
        global $schema_site_url;

        if (empty($path)) {
            return '';
        }

        if (preg_match('/^https?:\/\//', (string) $path)) {
            return $path;
        }

        $site_url = $schema_site_url ?? 'https://virtuo.ae/';
        $path = '/' . ltrim((string) $path, '/');

        return $path === '/' ? $site_url : rtrim($site_url, '/') . $path;
    }
}

if (!function_exists('schema_trim_text')) {
    function schema_trim_text($text, $limit = 500)
    {
        $text = trim(strip_tags((string) $text));

        if ($limit > 0 && function_exists('mb_strlen') && function_exists('mb_substr') && mb_strlen($text) > $limit) {
            return rtrim(mb_substr($text, 0, $limit - 1)) . '...';
        }

        if ($limit > 0 && strlen($text) > $limit) {
            return rtrim(substr($text, 0, $limit - 1)) . '...';
        }

        return $text;
    }
}

if (!function_exists('schema_organization')) {
    function schema_organization()
    {
        global $schema_organization_name, $schema_logo, $schema_site_url, $schema_same_as, $schema_email, $schema_phone;

        return schema_clean_value(array(
            '@type' => 'Organization',
            '@id' => schema_to_url('/#organization'),
            'name' => $schema_organization_name ?? '',
            'url' => $schema_site_url ?? '',
            'logo' => schema_to_url($schema_logo ?? ''),
            'sameAs' => isset($schema_same_as) && is_array($schema_same_as) ? $schema_same_as : array(),
            'email' => $schema_email ?? '',
            'telephone' => $schema_phone ?? '',
        ));
    }
}

if (!function_exists('schema_website')) {
    function schema_website()
    {
        global $schema_organization_name, $schema_site_url;

        return schema_clean_value(array(
            '@type' => 'WebSite',
            '@id' => schema_to_url('/#website'),
            'url' => $schema_site_url ?? '',
            'name' => $schema_organization_name ?? '',
            'publisher' => array('@id' => schema_to_url('/#organization')),
            'potentialAction' => array(
                '@type' => 'SearchAction',
                'target' => schema_to_url('/?s={search_term_string}'),
                'query-input' => 'required name=search_term_string',
            ),
        ));
    }
}

if (!function_exists('schema_local_business')) {
    function schema_local_business()
    {
        global $include_local_business_schema, $schema_organization_name, $schema_site_url, $page_image;
        global $schema_email, $schema_phone, $schema_address_street, $schema_address_locality, $schema_address_region, $schema_address_country;

        if (empty($include_local_business_schema)) {
            return array();
        }

        return schema_clean_value(array(
            '@type' => 'LocalBusiness',
            '@id' => schema_to_url('/#localbusiness'),
            'name' => $schema_organization_name ?? '',
            'url' => $schema_site_url ?? '',
            'image' => schema_to_url($page_image ?? ''),
            'email' => $schema_email ?? '',
            'telephone' => $schema_phone ?? '',
            'address' => array(
                '@type' => 'PostalAddress',
                'streetAddress' => $schema_address_street ?? '',
                'addressLocality' => $schema_address_locality ?? '',
                'addressRegion' => $schema_address_region ?? '',
                'addressCountry' => $schema_address_country ?? '',
            ),
            'areaServed' => array(
                '@type' => 'Country',
                'name' => 'United Arab Emirates',
            ),
            'parentOrganization' => array('@id' => schema_to_url('/#organization')),
        ));
    }
}

if (!function_exists('schema_breadcrumb')) {
    function schema_breadcrumb()
    {
        global $page_url, $page_breadcrumb_title;

        $items = array(
            array(
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Home',
                'item' => schema_to_url('/'),
            ),
        );

        if (!empty($page_url) && rtrim($page_url, '/') !== rtrim(schema_to_url('/'), '/')) {
            $items[] = array(
                '@type' => 'ListItem',
                'position' => 2,
                'name' => $page_breadcrumb_title ?? '',
                'item' => $page_url,
            );
        }

        return schema_clean_value(array(
            '@type' => 'BreadcrumbList',
            '@id' => ($page_url ?? schema_to_url('/')) . '#breadcrumb',
            'itemListElement' => $items,
        ));
    }
}

if (!function_exists('schema_page')) {
    function schema_page()
    {
        global $page_type, $page_title, $page_description, $page_url;

        $type_map = array(
            'home' => 'WebPage',
            'about' => 'AboutPage',
            'contact' => 'ContactPage',
            'blog' => 'Blog',
            'page' => 'WebPage',
        );

        if (in_array($page_type ?? '', array('services', 'article'), true)) {
            return array();
        }

        return schema_clean_value(array(
            '@type' => $type_map[$page_type ?? 'page'] ?? 'WebPage',
            '@id' => ($page_url ?? schema_to_url('/')) . '#webpage',
            'url' => $page_url ?? '',
            'name' => $page_title ?? '',
            'description' => schema_trim_text($page_description ?? ''),
            'isPartOf' => array('@id' => schema_to_url('/#website')),
            'about' => array('@id' => schema_to_url('/#organization')),
            'breadcrumb' => array('@id' => ($page_url ?? schema_to_url('/')) . '#breadcrumb'),
            'mainEntity' => ($page_type ?? '') === 'contact' ? array('@id' => schema_to_url('/#localbusiness')) : array(),
            'publisher' => ($page_type ?? '') === 'blog' ? array('@id' => schema_to_url('/#organization')) : array(),
        ));
    }
}

if (!function_exists('schema_service')) {
    function schema_service()
    {
        global $page_type, $page_url, $service_name, $service_description;

        if (($page_type ?? '') !== 'services') {
            return array();
        }

        return schema_clean_value(array(
            '@type' => 'Service',
            '@id' => ($page_url ?? schema_to_url('/')) . '#service',
            'name' => $service_name ?? '',
            'description' => schema_trim_text($service_description ?? ''),
            'url' => $page_url ?? '',
            'provider' => array('@id' => schema_to_url('/#organization')),
            'areaServed' => array(
                '@type' => 'Country',
                'name' => 'United Arab Emirates',
            ),
            'breadcrumb' => array('@id' => ($page_url ?? schema_to_url('/')) . '#breadcrumb'),
        ));
    }
}

if (!function_exists('schema_article')) {
    function schema_article()
    {
        global $page_type, $page_title, $page_description, $page_url, $page_image, $article_author, $article_date_published;

        if (($page_type ?? '') !== 'article') {
            return array();
        }

        return schema_clean_value(array(
            '@type' => 'Article',
            '@id' => ($page_url ?? schema_to_url('/')) . '#article',
            'headline' => $page_title ?? '',
            'description' => schema_trim_text($page_description ?? ''),
            'image' => schema_to_url($page_image ?? ''),
            'author' => array(
                '@type' => 'Organization',
                'name' => $article_author ?? '',
            ),
            'datePublished' => $article_date_published ?? '',
            'mainEntityOfPage' => array(
                '@type' => 'WebPage',
                '@id' => $page_url ?? '',
            ),
            'publisher' => array('@id' => schema_to_url('/#organization')),
        ));
    }
}

if (!function_exists('schema_extract_faqs_from_html')) {
    function schema_extract_faqs_from_html($html)
    {
        if (empty($html)) {
            return array();
        }

        $faqs = array();

        if (class_exists('DOMDocument') && class_exists('DOMXPath')) {
            $dom = new DOMDocument();
            $previous = libxml_use_internal_errors(true);
            $dom->loadHTML('<?xml encoding="UTF-8">' . $html);
            libxml_clear_errors();
            libxml_use_internal_errors($previous);

            $xpath = new DOMXPath($dom);
            $items = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' faq-item ')]");

            foreach ($items as $item) {
                $question_nodes = $xpath->query(".//*[contains(concat(' ', normalize-space(@class), ' '), ' faq-question ')]", $item);
                $answer_nodes = $xpath->query(".//*[contains(concat(' ', normalize-space(@class), ' '), ' faq-answer ')]", $item);
                $question = $question_nodes->length ? schema_trim_text($question_nodes->item(0)->textContent, 300) : '';
                $answer = $answer_nodes->length ? schema_trim_text($answer_nodes->item(0)->textContent, 1000) : '';

                if ($question !== '' && $answer !== '') {
                    $faqs[] = array('question' => $question, 'answer' => $answer);
                }
            }

            return $faqs;
        }

        if (preg_match_all('/<[^>]*class=["\'][^"\']*faq-question[^"\']*["\'][^>]*>(.*?)<\/[^>]+>.*?<[^>]*class=["\'][^"\']*faq-answer[^"\']*["\'][^>]*>(.*?)<\/[^>]+>/is', $html, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $question = schema_trim_text($match[1], 300);
                $answer = schema_trim_text($match[2], 1000);

                if ($question !== '' && $answer !== '') {
                    $faqs[] = array('question' => $question, 'answer' => $answer);
                }
            }
        }

        return $faqs;
    }
}

if (!function_exists('schema_extract_faqs_from_php_source')) {
    function schema_extract_faqs_from_php_source($source)
    {
        if (empty($source)) {
            return array();
        }

        $faqs = array();

        if (preg_match_all('/<button[^>]*class=["\'][^"\']*accordion-button[^"\']*["\'][^>]*>(.*?)<\/button>\s*<\/h2>\s*<div[^>]*class=["\'][^"\']*accordion-collapse[^"\']*["\'][^>]*>\s*<div[^>]*class=["\'][^"\']*accordion-body[^"\']*["\'][^>]*>(.*?)<\/div>/is', $source, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $question = schema_trim_text(html_entity_decode($match[1], ENT_QUOTES, 'UTF-8'), 300);
                $answer = schema_trim_text(html_entity_decode($match[2], ENT_QUOTES, 'UTF-8'), 1000);

                if ($question !== '' && $answer !== '') {
                    $faqs[] = array('question' => $question, 'answer' => $answer);
                }
            }
        }

        if (preg_match_all('/array\s*\(\s*[\'"][^\'"]*[\'"]\s*,\s*[\'"]([^\'"]+)[\'"]\s*,\s*[\'"]([^\'"]+)[\'"]\s*\)/', $source, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $question = schema_trim_text(html_entity_decode($match[1], ENT_QUOTES, 'UTF-8'), 300);
                $answer = schema_trim_text(html_entity_decode($match[2], ENT_QUOTES, 'UTF-8'), 1000);

                if ($question !== '' && $answer !== '') {
                    $faqs[] = array('question' => $question, 'answer' => $answer);
                }
            }
        }

        return $faqs;
    }
}

if (!function_exists('schema_extract_faqs_from_files')) {
    function schema_extract_faqs_from_files()
    {
        global $page_type, $schema_page_file;

        $files = array();
        $script_file = $_SERVER['SCRIPT_FILENAME'] ?? '';

        if ($script_file !== '' && is_readable($script_file)) {
            $files[] = $script_file;
        }

        $resolved_file = dirname(__DIR__) . '/' . ($schema_page_file ?? '');

        if (!empty($schema_page_file) && is_readable($resolved_file) && !in_array($resolved_file, $files, true)) {
            $files[] = $resolved_file;
        }

        $renderer_file = dirname(__DIR__) . '/partials/service-category-renderer.php';

        if (($page_type ?? '') === 'services' && is_readable($renderer_file)) {
            $files[] = $renderer_file;
        }

        $faqs = array();
        $seen = array();

        foreach ($files as $file) {
            $source = file_get_contents($file);

            if ($source === false) {
                continue;
            }

            foreach (schema_extract_faqs_from_php_source($source) as $faq) {
                $key = md5($faq['question'] . '|' . $faq['answer']);

                if (!isset($seen[$key])) {
                    $seen[$key] = true;
                    $faqs[] = $faq;
                }
            }
        }

        return $faqs;
    }
}

if (!function_exists('schema_faq')) {
    function schema_faq()
    {
        global $faqs, $schema_html, $page_url;

        $faq_items = array();

        if (isset($faqs) && is_array($faqs)) {
            foreach ($faqs as $faq) {
                $question = $faq['question'] ?? $faq['q'] ?? '';
                $answer = $faq['answer'] ?? $faq['a'] ?? '';

                if ($question !== '' && $answer !== '') {
                    $faq_items[] = array(
                        '@type' => 'Question',
                        'name' => schema_trim_text($question, 300),
                        'acceptedAnswer' => array(
                            '@type' => 'Answer',
                            'text' => schema_trim_text($answer, 1000),
                        ),
                    );
                }
            }
        } elseif (!empty($schema_html)) {
            foreach (schema_extract_faqs_from_html($schema_html) as $faq) {
                $faq_items[] = array(
                    '@type' => 'Question',
                    'name' => $faq['question'],
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => $faq['answer'],
                    ),
                );
            }
        } else {
            foreach (schema_extract_faqs_from_files() as $faq) {
                $faq_items[] = array(
                    '@type' => 'Question',
                    'name' => $faq['question'],
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => $faq['answer'],
                    ),
                );
            }
        }

        if (empty($faq_items)) {
            return array();
        }

        return schema_clean_value(array(
            '@type' => 'FAQPage',
            '@id' => ($page_url ?? schema_to_url('/')) . '#faq',
            'mainEntity' => $faq_items,
        ));
    }
}

if (!function_exists('generate_schema_output')) {
    function generate_schema_output()
    {
        static $schema_output_generated = false;

        if ($schema_output_generated) {
            return '';
        }

        $schema_output_generated = true;
        $schemas = array(
            schema_organization(),
            schema_website(),
            schema_local_business(),
            schema_breadcrumb(),
            schema_page(),
            schema_service(),
            schema_article(),
            schema_faq(),
        );

        $graph = array();

        foreach ($schemas as $schema) {
            $schema = schema_clean_value($schema);

            if (!empty($schema)) {
                $graph[] = $schema;
            }
        }

        return json_encode(array(
            '@context' => 'https://schema.org',
            '@graph' => $graph,
        ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
