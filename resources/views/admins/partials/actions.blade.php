        <a title="Edit" href="{{ route('admin.' . $name . '.edit', $name_id) }}"
            class="btn btn-icon btn-outline-info mt-2">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        {{-- <a title="Show" href="{{ route('admin.' . $name . '.show', $name_id) }}"
            class="btn btn-icon btn-outline-secondary mt-2">
            <i class="fa-solid fa-eye"></i>
        </a> --}}

        <form id="delete-form-{{ $name_id }}" action="{{ route('admin.' . $name . '.destroy', $name_id) }}"
            method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>


        <a href="javascript:void(0)" id="delete_one" data-id="{{ $name_id }}"
            class="btn btn-icon btn-outline-danger mt-2 delete-btn"><i class="fa-solid fa-trash-can"></i></a>

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
