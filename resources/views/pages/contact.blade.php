@extends('layouts.app')

@section('title', 'Contact Us — Divine Dev Hub')
@section('description', 'Tell us about your project. We\'ll follow up at ' . config('company.email') . ' with next steps.')

@section('content')

    <x-breadcrumb :items="[['label' => 'Contact']]" />

    <x-page-hero
        eyebrow="Get in Touch"
        title="Let's talk about what you're building"
        description="Send a few details about your project and we'll get back to you."
    />

    <section class="py-20 sm:py-28" aria-labelledby="contact-heading">
        <div class="page-container grid gap-14 lg:grid-cols-12 lg:gap-10">
            <div data-reveal class="lg:col-span-7">
                <h2 id="contact-heading" class="sr-only">Contact form</h2>

                @if (session('status') === 'sent')
                    <div class="mb-6 rounded-xl border border-success/30 bg-success/5 px-5 py-4 text-sm font-medium text-success">
                        Thanks — your message is on its way. We'll be in touch soon.
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="space-y-5" novalidate>
                    @csrf

                    {{-- Honeypot: hidden from real visitors via CSS, invisible to screen readers.
                         Any bot that fills every field in the DOM will trip this. --}}
                    <div class="hidden" aria-hidden="true">
                        <label for="company_website">Leave this field empty</label>
                        <input type="text" name="company_website" id="company_website" tabindex="-1" autocomplete="off">
                    </div>

                    <div>
                        <label for="name" class="mb-2 block text-sm font-semibold text-text-primary">Name</label>
                        <input
                            type="text" name="name" id="name" required autocomplete="name"
                            value="{{ old('name') }}"
                            class="w-full rounded-lg border border-border bg-white px-4 py-3 text-sm text-text-primary transition focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                        >
                        @error('name')<p class="mt-1.5 text-xs text-error">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-text-primary">Email</label>
                        <input
                            type="email" name="email" id="email" required autocomplete="email"
                            value="{{ old('email') }}"
                            class="w-full rounded-lg border border-border bg-white px-4 py-3 text-sm text-text-primary transition focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                        >
                        @error('email')<p class="mt-1.5 text-xs text-error">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="message" class="mb-2 block text-sm font-semibold text-text-primary">Message</label>
                        <textarea
                            name="message" id="message" rows="6" required
                            class="w-full rounded-lg border border-border bg-white px-4 py-3 text-sm text-text-primary transition focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                        >{{ old('message') }}</textarea>
                        @error('message')<p class="mt-1.5 text-xs text-error">{{ $message }}</p>@enderror
                    </div>

                    <x-button type="submit" class="group w-full sm:w-auto">
                        Send Message
                        <x-svg-icon name="arrow-right" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-0.5" />
                    </x-button>

                    <p class="text-xs text-text-secondary">We only use these details to reply to your message.</p>
                </form>
            </div>

            <div data-reveal style="--reveal-delay:120ms" class="lg:col-span-5">
                <div class="rounded-2xl border border-border bg-surface p-8">
                    <h2 class="text-lg font-semibold text-text-primary">Other ways to reach us</h2>

                    <ul class="mt-6 space-y-5 text-sm">
                        <li class="flex items-start gap-3">
                            <x-svg-icon name="mail" class="mt-0.5 h-5 w-5 shrink-0 text-primary" />
                            <div>
                                <p class="font-medium text-text-primary">Email</p>
                                <a href="mailto:{{ config('company.email') }}" class="text-text-secondary transition hover:text-primary">{{ config('company.email') }}</a>
                            </div>
                        </li>

                        @if (config('company.phone'))
                            <li class="flex items-start gap-3">
                                <x-svg-icon name="smartphone" class="mt-0.5 h-5 w-5 shrink-0 text-primary" />
                                <div>
                                    <p class="font-medium text-text-primary">Phone</p>
                                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', config('company.phone')) }}" class="text-text-secondary transition hover:text-primary">{{ config('company.phone') }}</a>
                                </div>
                            </li>
                        @endif

                        @if (config('company.whatsapp'))
                            <li class="flex items-start gap-3">
                                <x-svg-icon name="message" class="mt-0.5 h-5 w-5 shrink-0 text-primary" />
                                <div>
                                    <p class="font-medium text-text-primary">WhatsApp</p>
                                    <a href="https://wa.me/{{ config('company.whatsapp') }}" target="_blank" rel="noopener noreferrer" class="text-text-secondary transition hover:text-primary">Message us</a>
                                </div>
                            </li>
                        @endif

                        <li class="flex items-start gap-3">
                            <x-svg-icon name="map-pin" class="mt-0.5 h-5 w-5 shrink-0 text-primary" />
                            <div>
                                <p class="font-medium text-text-primary">Office</p>
                                <p class="text-text-secondary">{{ config('company.address') }}</p>
                                @if (config('company.address_map_link'))
                                    <a href="{{ config('company.address_map_link') }}" target="_blank" rel="noopener noreferrer" class="mt-1 inline-flex items-center gap-1 text-sm font-medium text-primary hover:underline">
                                        Get directions
                                        <x-svg-icon name="arrow-up-right" class="h-3.5 w-3.5" />
                                    </a>
                                @endif
                            </div>
                        </li>
                    </ul>

                    <div class="mt-8 border-t border-border pt-6">
                        <p class="text-xs font-medium uppercase tracking-wide text-text-secondary">Follow us</p>
                        <ul class="mt-3 flex items-center gap-3">
                            @foreach (config('company.social') as $social)
                                <li>
                                    @php
                                        $socialHoverClass = match ($social['icon']) {
                                            'facebook' => 'hover:border-[#1877F2]/60 hover:bg-[#1877F2]/10 hover:text-[#1877F2] hover:shadow-[0_0_0_4px_rgba(24,119,242,0.08)]',
                                            'twitter', 'x' => 'hover:border-white/40 hover:bg-white/10 hover:text-text-primary hover:shadow-[0_0_0_4px_rgba(0,0,0,0.06)]',
                                            'linkedin' => 'hover:border-[#0A66C2]/60 hover:bg-[#0A66C2]/10 hover:text-[#0A66C2] hover:shadow-[0_0_0_4px_rgba(10,102,194,0.08)]',
                                            'instagram' => 'hover:border-[#E4405F]/60 hover:bg-[#E4405F]/10 hover:text-[#E4405F] hover:shadow-[0_0_0_4px_rgba(228,64,95,0.08)]',
                                            default => 'hover:border-primary/60 hover:bg-primary/10 hover:text-primary hover:shadow-[0_0_0_4px_rgba(0,0,0,0.06)]',
                                        };
                                    @endphp
                                    <a
                                        href="{{ $social['href'] }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="group flex h-9 w-9 items-center justify-center rounded-full border border-border text-text-secondary transition-all duration-200 hover:-translate-y-0.5 {{ $socialHoverClass }}"
                                        aria-label="{{ $social['label'] }} (opens in a new tab)"
                                    >
                                        <x-svg-icon
                                            :name="$social['icon']"
                                            class="h-4 w-4 transition-transform duration-200 group-hover:scale-110"
                                        />
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
