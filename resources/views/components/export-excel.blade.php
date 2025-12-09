<div>
    <form method="GET" action="{{ route('dashboard.export.excel') }}">
        <input type="hidden" name="model" value="{{ $model }}">
        <button type="submit" class="btn btn-primary mt-2 me-2">
            <i class="fa-solid fa-file-excel mx-1"></i> Export
        </button>
    </form>
</div>