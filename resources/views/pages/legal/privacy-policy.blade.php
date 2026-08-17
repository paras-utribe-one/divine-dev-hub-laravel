@extends('layouts.app')

@section('title', 'Privacy Policy — Divine Dev Hub')
@section('description', 'How Divine Dev Hub collects and uses information submitted through this website.')

@section('content')

    <x-breadcrumb :items="[['label' => 'Privacy Policy']]" />

    <x-page-hero eyebrow="Legal" title="Privacy Policy" />

    <section class="py-16 sm:py-20">
        <div data-reveal class="page-container max-w-2xl">
            <div class="mb-10 rounded-xl border border-accent/30 bg-accent/5 px-5 py-4 text-sm leading-relaxed text-text-secondary">
                <strong class="text-text-primary">Draft pending formal legal review.</strong>
                This page accurately describes what this website currently does, but has not yet been reviewed by counsel. Treat it as provisional until that review is complete.
            </div>

            <div class="prose-content space-y-8 text-sm leading-relaxed text-text-secondary [&_h2]:mt-10 [&_h2]:text-lg [&_h2]:font-semibold [&_h2]:text-text-primary [&_p]:mt-3">
                <p>Last updated: {{ now()->format('F Y') }}</p>

                <div>
                    <h2>What we collect</h2>
                    <p>
                        When you use the contact form on this site, we collect the name, email address and message you provide. We do not require a phone number, and we do not ask for any other personal information anywhere on this site.
                    </p>
                </div>

                <div>
                    <h2>How we use it</h2>
                    <p>
                        Contact form submissions are sent by email directly to our team so we can reply to your enquiry. We do not store submissions in a database, and we do not use them for any purpose other than responding to you.
                    </p>
                </div>

                <div>
                    <h2>Cookies</h2>
                    <p>
                        This site uses a single session cookie required for basic functionality (such as securing the contact form against automated submissions). We do not currently use analytics or advertising cookies.
                    </p>
                </div>

                <div>
                    <h2>Sharing</h2>
                    <p>
                        We do not sell, rent, or share the information you submit with third parties.
                    </p>
                </div>

                <div>
                    <h2>Contact</h2>
                    <p>
                        Questions about this policy can be sent to <a href="mailto:{{ config('company.email') }}" class="text-primary hover:underline">{{ config('company.email') }}</a>.
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection
