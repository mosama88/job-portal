        <div class="btn-group dropdown-primary me-2 mt-2">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Actions
            </button>
            <div class="dropdown-menu">
                <a href="{{ route('dashboard.' . $name . '.edit', $name_id) }}" class="dropdown-item text-info"><i
                        class="fa-solid fa-pen-to-square"></i> Edit</a>
                <a href="{{ route('dashboard.' . $name . '.show', $name_id) }}" class="dropdown-item text-secondary"><i
                        class="fa-solid fa-eye"></i> Show</a>
                <div class="dropdown-divider"></div>
                <form id="delete-form-{{ $name_id }}"
                    action="{{ route('dashboard.' . $name . '.destroy', $name_id) }}" method="POST"
                    style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                <a href="javascript:void(0)" id="delete_one" data-id="{{ $name_id }}"
                    class="dropdown-item delete-btn text-danger"><i class="fa-solid fa-eye"></i> Delete</a>
            </div>
        </div>

        @push('js')
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
