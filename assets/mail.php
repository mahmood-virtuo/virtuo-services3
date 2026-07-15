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
$phone_display = virtuo_mail_clean_header(virtuo_mail_field('phone_display'));
$website = virtuo_mail_clean_header(virtuo_mail_field('website'));
$service = virtuo_mail_clean_header(virtuo_mail_field('service'));
$emirate = virtuo_mail_clean_header(virtuo_mail_field('emirate'));
$message = trim(strip_tags(virtuo_mail_field('message')));

$phone_for_email = $phone !== '' ? $phone : $phone_display;

$form_configs = array(
    'contact' => array(
        'label' => 'Contact page form',
        'subject_prefix' => 'New contact request',
        'required' => array('name', 'email', 'phone', 'service', 'emirate', 'message'),
    ),
    'footer_quote' => array(
        'label' => 'Footer quote form',
        'subject_prefix' => 'New footer quote request',
        'required' => array('name', 'email', 'phone', 'service', 'emirate', 'message'),
    ),
    'sidebar_quote' => array(
        'label' => 'Sidebar consultation form',
        'subject_prefix' => 'New sidebar consultation request',
        'required' => array('name', 'email', 'phone', 'service', 'emirate'),
    ),
);

if (!isset($form_configs[$form_type])) {
    http_response_code(400);
    echo 'Unsupported form submission.';
    exit;
}

$submitted_fields = array(
    'name' => $name,
    'email' => $email,
    'phone' => $phone_for_email,
    'website' => $website,
    'service' => $service,
    'emirate' => $emirate,
    'message' => $message,
);

foreach ($form_configs[$form_type]['required'] as $field_key) {
    if ($submitted_fields[$field_key] === '') {
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

$recipient = 'setup@virtuo.ae';
$subject = $form_configs[$form_type]['subject_prefix'] . ' from ' . $name;

$email_content = "Virtuo Services Website Form Submission\n\n";
$email_content .= "Form: " . $form_configs[$form_type]['label'] . "\n";
$email_content .= "Name: $name\n";
$email_content .= "Email: $email\n";

if ($phone_for_email !== '') {
    $email_content .= "Phone: $phone_for_email\n";
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

if ($message !== '') {
    $email_content .= "\nMessage:\n$message\n";
}

$email_headers = array(
    'From: Virtuo Website <setup@virtuo.ae>',
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
