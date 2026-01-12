<ul class="breadcrumb bg-transparent rounded mb-0 p-0">
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('dashboard.' . $url) }}">{{ $urlTitle }}</a>
    </li>

    @if (!empty($previousUrl))
        <li class="breadcrumb-item text-capitalize">
            <a href="{{ route('dashboard.' . $previousUrl) }}">
                {{ $previousPageTitle }}
            </a>
        </li>
    @endif

    <li class="breadcrumb-item text-capitalize active" aria-current="page">{{ $PageTitle }}</li>
</ul>
