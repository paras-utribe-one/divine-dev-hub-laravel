@extends('layouts.app')

@section('title', 'Terms & Conditions — Divine Dev Hub')
@section('description', 'Terms governing the use of the Divine Dev Hub website.')

@section('content')

    <x-breadcrumb :items="[['label' => 'Terms & Conditions']]" />

    <x-page-hero eyebrow="Legal" title="Terms & Conditions" />

    <section class="py-16 sm:py-20">
        <div class="page-container max-w-2xl">
            <div class="mb-10 rounded-xl border border-accent/30 bg-accent/5 px-5 py-4 text-sm leading-relaxed text-text-secondary">
                <strong class="text-text-primary">Draft pending formal legal review.</strong>
                These are general terms for using this website. Terms governing an actual client engagement (scope, IP ownership, payment, confidentiality) are set out separately in that engagement's signed agreement, not on this page.
            </div>

            <div class="prose-content space-y-8 text-sm leading-relaxed text-text-secondary [&_h2]:mt-10 [&_h2]:text-lg [&_h2]:font-semibold [&_h2]:text-text-primary [&_p]:mt-3">
                <p>Last updated: {{ now()->format('F Y') }}</p>

                <div>
                    <h2>Use of this website</h2>
                    <p>
                        This website is published by Divine Dev Hub to describe our services and portfolio, and to let visitors get in touch. Content on this site — including project descriptions, copy and design — belongs to Divine Dev Hub unless otherwise noted, and should not be reproduced without permission.
                    </p>
                </div>

                <div>
                    <h2>No warranty</h2>
                    <p>
                        We keep this site accurate to the best of our ability, but information here (including project descriptions and figures) is provided as-is and may be updated without notice.
                    </p>
                </div>

                <div>
                    <h2>Client engagements</h2>
                    <p>
                        Nothing on this website constitutes an offer or a binding agreement for services. The terms of an actual engagement — scope, timelines, intellectual property, confidentiality and payment — are agreed separately, in writing, before any project begins.
                    </p>
                </div>

                <div>
                    <h2>Contact</h2>
                    <p>
                        Questions about these terms can be sent to <a href="mailto:{{ config('company.email') }}" class="text-primary hover:underline">{{ config('company.email') }}</a>.
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection
