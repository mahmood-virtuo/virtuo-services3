<?php
function virtuo_mail_field($key)
{
    return isset($_POST[$key]) ? trim((string) $_POST[$key]) : '';
}

function virtuo_mail_clean_header($value)
{
    return str_replace(array("\r", "\n"), ' ', strip_tags(trim($value)));
}

// Only process POST requests.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(403);
    echo 'There was a problem with your submission, please try again.';
    exit;
}

$form_type = virtuo_mail_field('form_type');
$name = virtuo_mail_clean_header(virtuo_mail_field('name'));
$email = filter_var(virtuo_mail_field('email'), FILTER_SANITIZE_EMAIL);
$phone = virtuo_mail_clean_header(virtuo_mail_field('phone'));
$website = virtuo_mail_clean_header(virtuo_mail_field('website'));
$service = virtuo_mail_clean_header(virtuo_mail_field('service'));
$emirate = virtuo_mail_clean_header(virtuo_mail_field('emirate'));
$message = trim(strip_tags(virtuo_mail_field('message')));

$required_fields = array($name, $email, $message);

if ($form_type === 'footer_quote') {
    $required_fields[] = $phone;
    $required_fields[] = $service;
    $required_fields[] = $emirate;
} else {
    $required_fields[] = $website;
}

foreach ($required_fields as $field) {
    if ($field === '') {
        http_response_code(400);
        echo 'Please complete the form and try again.';
        exit;
    }
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo 'Please enter a valid email address.';
    exit;
}

$recipient = 'info@virtuo.ae';
$subject_prefix = $form_type === 'footer_quote' ? 'New quote request' : 'New contact message';
$subject = $subject_prefix . ' from ' . $name;

$email_content = "Virtuo Services Website Form Submission\n\n";
$email_content .= "Form: " . ($form_type === 'footer_quote' ? 'Footer quote form' : 'Contact page form') . "\n";
$email_content .= "Name: $name\n";
$email_content .= "Email: $email\n";

if ($phone !== '') {
    $email_content .= "Phone: $phone\n";
}

if ($website !== '') {
    $email_content .= "Website: $website\n";
}

if ($service !== '') {
    $email_content .= "Service: $service\n";
}

if ($emirate !== '') {
    $email_content .= "Emirate: $emirate\n";
}

$email_content .= "\nMessage:\n$message\n";

$email_headers = array(
    'From: Virtuo Website <info@virtuo.ae>',
    'Reply-To: ' . $name . ' <' . $email . '>',
    'Content-Type: text/plain; charset=UTF-8',
);

if (mail($recipient, $subject, $email_content, implode("\r\n", $email_headers))) {
    http_response_code(200);
    echo 'Thank You! Your message has been sent.';
    exit;
}

http_response_code(500);
echo "Oops! Something went wrong and we couldn't send your message.";
