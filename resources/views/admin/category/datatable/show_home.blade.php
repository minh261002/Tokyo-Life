<span @class([
    'badge',
    \App\Enums\Category\ShowHomeStatus::from($show_home)->badge(),
])>
    {{ \App\Enums\Category\ShowHomeStatus::getDescription($show_home) }}
</span>
