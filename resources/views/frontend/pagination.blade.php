@push('css')
    <style>
        .paginations {
            margin-top: 30px;
            text-align: center;
        }

        .pager {
            list-style: none;
            padding: 0;
            margin: 0;
            display: inline-flex;
            gap: 8px;
        }

        .pager li {
            display: inline-block;
        }

        .pager a,
        .pager span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 38px;
            height: 38px;
            padding: 0 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        /* Hover */
        .pager a:hover {
            background-color: #f1f1f1;
        }

        /* الصفحة النشطة */
        .pager li.active a {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
        }

        /* الأسهم */
        .pager-prev,
        .pager-next {
            font-size: 14px;
        }

        /* Disabled */
        .pager .disabled a,
        .pager .disabled span {
            opacity: 0.5;
            cursor: not-allowed;
            background-color: #f8f9fa;
        }

        /* النقاط ... */
        .pager-dots {
            border: none;
            cursor: default;
        }
    </style>
@endpush


<div class="paginations">
    <ul class="pager">
        {{-- السابق --}}
        <li class="{{ $companies->onFirstPage() ? 'disabled' : '' }}">
            @if ($companies->onFirstPage())
                <span class="pager-prev"><i class="fas fa-arrow-left"></i></span>
            @else
                <a class="pager-prev" href="{{ $companies->previousPageUrl() }}">
                    <i class="fas fa-arrow-left"></i>
                </a>
            @endif
        </li>

        @php
            $current = $companies->currentPage();
            $last = $companies->lastPage();
            $start = max(1, $current - 2);
            $end = min($last, $current + 2);
        @endphp

        {{-- الصفحة الأولى --}}
        @if ($start > 1)
            <li class="{{ $current == 1 ? 'active' : '' }}">
                <a class="pager-number" href="{{ $companies->url(1) }}">
                    1
                </a>
            </li>

            @if ($start > 2)
                <li><span class="pager-dots">...</span></li>
            @endif
        @endif

        {{-- الصفحات الوسط --}}
        @for ($page = $start; $page <= $end; $page++)
            <li class="{{ $page == $current ? 'active' : '' }}">
                <a class="pager-number" href="{{ $companies->url($page) }}">
                    {{ $page }}
                </a>
            </li>
        @endfor

        {{-- الصفحة الأخيرة --}}
        @if ($end < $last)
            @if ($end < $last - 1)
                <li><span class="pager-dots">...</span></li>
            @endif

            <li class="{{ $current == $last ? 'active' : '' }}">
                <a class="pager-number" href="{{ $companies->url($last) }}">
                    {{ $last }}
                </a>
            </li>
        @endif

        {{-- التالي --}}
        <li class="{{ !$companies->hasMorePages() ? 'disabled' : '' }}">
            @if ($companies->hasMorePages())
                <a class="pager-next" href="{{ $companies->nextPageUrl() }}">
                    <i class="fas fa-arrow-right"></i>
                </a>
            @else
                <span class="pager-next"><i class="fas fa-arrow-right"></i></span>
            @endif
        </li>
    </ul>
</div>
