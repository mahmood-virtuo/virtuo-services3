<?php
require_once dirname(__DIR__) . '/partials/services/digital-marketing/registry.php';

header('Content-Type: application/json; charset=UTF-8');
header('X-Robots-Tag: noindex, nofollow', true);

$requestedSlug = virtuo_digital_service_resolve_slug($_GET['tab'] ?? '');

if ($requestedSlug === '') {
    http_response_code(404);
    echo json_encode(array('error' => 'Unknown service'), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

$entry = virtuo_digital_service_get($requestedSlug);
$html = virtuo_digital_service_render_content($entry);

if ($html === '') {
    http_response_code(404);
    echo json_encode(array('error' => 'Service content unavailable'), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

$canonicalUrl = 'https://virtuo.ae' . $entry['canonicalPath'];
$faqs = virtuo_digital_service_extract_faqs($html);

echo json_encode(
    array(
        'tab' => $entry['slug'],
        'parentTab' => $entry['parent'],
        'html' => $html,
        'title' => $entry['title'],
        'metaDescription' => $entry['metaDescription'],
        'canonicalUrl' => $canonicalUrl,
        'breadcrumbMain' => $entry['breadcrumbMain'],
        'breadcrumbSub' => $entry['breadcrumbSub'],
        'faqItems' => $faqs,
    ),
    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
);
