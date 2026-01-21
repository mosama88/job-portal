@extends('admins.layouts.master', ['titlePage' => 'Plan'])
@section('plans_active', 'active')
@section('title', 'Plan')
@push('css')
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/dist/css/price-plan.css">
@endpush
@section('content')

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1 class="m-0">Choose the Perfect Plan for Your Needs</h1>
                    <p class="lead">All plans include our core features. Select the one that fits your requirements.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin.plans.create') }}" class="btn btn-md btn-primary">
                            <i class="fa-solid fa-square-plus"></i> Create New Plan
                        </a>
                    </div>
                </div>
                <!-- Pricing cards -->
                <div class="row">
                    @foreach ($data as $info)
                        <div class="col-md-4 mb-4">
                            @if ($info->label === 'DEVELOPER')
                                <div class="card pricing-card developer">
                                @elseif($info->label === 'SMALL TEAM')
                                    <div class="card pricing-card team">
                                    @else
                                        <div class="card pricing-card enterprise">
                            @endif

                            @if ($info->recommended == 1)
                                <div class="badge-popular">Recommended</div>
                            @endif

                            <div class="pricing-card-header">
                                <h3 class="pricing-card-title">{{ $info->label }}</h3>
                                <div class="price">${{ $info->price }}<span>/month</span></div>
                                <p class="mb-0">
                                    @if ($info->label === 'DEVELOPER')
                                        Perfect for individual developers
                                    @elseif($info->label === 'SMALL TEAM')
                                        Ideal for growing teams
                                    @else
                                        For large organizations
                                    @endif
                                </p>
                            </div>

                            <div class="card-body pricing-features">
                                <!-- You should update these features dynamically based on your database -->
                                <div class="feature-item">
                                    <i class="fas fa-check"></i>
                                    <span>
                                        {{ $info->job_limit }} Job Limit
                                    </span>
                                </div>

                                <div class="feature-item">
                                    <i class="fas fa-check"></i>
                                    <span> {{ $info->featured_job_limit }} Featured Job Limit
                                    </span>
                                </div>

                                <div class="feature-item">
                                    <i class="fas fa-check"></i>
                                    <span>
                                        {{ $info->highlight_job_limit }} Highlight Job Post
                                    </span>
                                </div>

                                <div class="feature-item">
                                    @if ($info->profile_verified == 1)
                                        <span>
                                            <i class="fas fa-check"></i>
                                        </span>
                                    @else
                                        <span>
                                            <i class="fas fa-times"></i>
                                        </span>
                                    @endif
                                    Verify Company
                                </div>



                                <a href="{{ route('admin.plans.edit', $info->id) }}" class="btn btn-info mt-4 mx-2">
                                    <i class="fa-solid fa-pen-to-square mr-2"></i>Edit
                                </a>
                                <a href="javascript:void(0)" id="delete_one" data-id="{{ $info->id }}"
                                    class="btn btn-danger mt-4 delete-btn"><i class="fas fa-shopping-cart mr-2"></i> Delete
                                </a>

                                <form id="delete-form-{{ $info->id }}"
                                    action="{{ route('admin.plans.destroy', $info->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </div>
                        </div>
                </div>
                @endforeach

            </div>
        </div>


    </div>

    <!-- Additional info -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="callout callout-info">
                <h5><i class="fas fa-info-circle mr-2"></i>Note:</h5>
                <p>All plans come with our core features including dashboard access, basic analytics, and API access. You
                    can upgrade or downgrade your plan at any time. All prices are in USD.</p>
            </div>
        </div>
    </div>
    </div>

@endsection


@push('js')
    <script src="{{ asset('admin') }}/assets/js/sweetalert2@11.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Attach event listener to delete buttons
            document.querySelectorAll('.delete-btn').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default behavior

                    // Retrieve the form ID from the button's data attribute
                    const nameId = this.getAttribute('data-id');
                    const form = document.getElementById(`delete-form-${nameId}`);

                    // Display SweetAlert confirmation dialog
                    Swal.fire({
                        title: 'Are You Sure?',
                        text: "You won't be able to undo this.!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Perform AJAX request
                            fetch(form.action, {
                                    method: 'POST',
                                    body: new FormData(form),
                                    headers: {
                                        'X-CSRF-TOKEN': "{{ csrf_token() }}" // Add CSRF token
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire({
                                            title: "Success!",
                                            text: data
                                                .message, // هذه الرسالة تأتي من الـ Controller
                                            icon: 'success',
                                            timer: 1500,
                                            showConfirmButton: false
                                        }).then(() => {
                                            location
                                                .reload(); // Reload the page
                                        });
                                    } else {
                                        Swal.fire({
                                            title: "Error!",
                                            text: data.message ||
                                                "An error occurred",
                                            icon: 'error'
                                        });
                                    }
                                })
                                .catch(error => {
                                    Swal.fire({
                                        title: "Error!",
                                        text: "An error occurred",
                                        icon: 'error'
                                    });
                                });
                        }
                    });
                });
            });
        });
    </script>
@endpush
