{{--
    PLACEHOLDER DATA MARKER — QA/design-review only.

    Stamps a small, impossible-to-miss "Placeholder" pill onto any card or
    block wrapping content added for Phase A (see docs/build-log.md). Every
    place this renders is standing in for real client content that hasn't
    arrived yet — swapping in real data in Phase C means deleting the
    <x-placeholder-tag /> call alongside it, not just editing the text.
--}}
<span {{ $attributes->merge(['class' => 'inline-flex items-center gap-1 rounded-full border border-dashed border-accent bg-accent/10 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-accent-hover']) }}>
    <x-svg-icon name="zap" class="h-3 w-3" />
    Placeholder
</span>
