<span @class([
    'badge',
    \App\Enums\Category\ShowMenuStatus::from($show_menu)->badge(),
])>
    {{ \App\Enums\Category\ShowMenuStatus::getDescription($show_menu) }}
</span>
