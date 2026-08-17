<?php

/**
 * Single source of truth for the company's publishable contact details.
 *
 * `phone` and `whatsapp` are null until a real number is confirmed by the
 * client (see docs/redesign-strategy.md Part 10.3 and docs/build-log.md).
 * Every place these appear — header, footer, contact page, final CTA,
 * Organization schema — reads from this file, so publishing the real number
 * later is a single .env change, not a find-and-replace across the codebase.
 * Views should hide the phone/WhatsApp UI entirely when these are null
 * rather than showing a fake number to visitors, and schema markup should
 * omit the `telephone` field entirely under the same condition.
 */
return [
    'name' => 'Divine Dev Hub',

    'email' => env('COMPANY_EMAIL', 'info@divinedevhub.in'),

    // Digits and symbols only as typed for display, e.g. "+91 98765 43210".
    'phone' => env('COMPANY_PHONE'),

    // Same number, digits only (with country code, no symbols), for the
    // wa.me deep link, e.g. "919876543210". Falls back to a digit-stripped
    // version of `phone` if not set separately.
    'whatsapp' => env('COMPANY_WHATSAPP'),

    // Same "leave blank until confirmed" rule as phone/whatsapp above —
    // e.g. "Mon–Fri, 9am–6pm IST". Views should hide the hours UI entirely
    // when this is null rather than showing invented hours.
    'hours' => env('COMPANY_HOURS'),

    'address' => '304, Palladium Business Hub, Opposite 4D Square Mall, Chandkheda, Ahmedabad, Gujarat 382424',

    'address_map_link' => 'https://maps.app.goo.gl/hBxGrDZchp9s4hSB8',

    // Structured breakdown of the same address above, for schema.org
    // PostalAddress markup — kept in sync manually since it's one line that
    // rarely changes. If `address` above is ever edited, update this too.
    'address_structured' => [
        'street' => '304, Palladium Business Hub, Opposite 4D Square Mall, Chandkheda',
        'locality' => 'Ahmedabad',
        'region' => 'Gujarat',
        'postal_code' => '382424',
        'country' => 'IN',
    ],

    'founded_year' => 2014,

    'social' => [
        ['label' => 'Facebook', 'icon' => 'facebook', 'href' => 'https://www.facebook.com/profile.php?id=61572012705524'],
        ['label' => 'X (Twitter)', 'icon' => 'twitter', 'href' => 'https://x.com/DivineDevHub'],
        ['label' => 'LinkedIn', 'icon' => 'linkedin', 'href' => 'https://www.linkedin.com/company/divine-dev-hub/'],
        ['label' => 'Instagram', 'icon' => 'instagram', 'href' => 'https://www.instagram.com/divine_dev_hub/'],
    ],
];
