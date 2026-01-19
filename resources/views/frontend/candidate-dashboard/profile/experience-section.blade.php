<div class="tab-pane fade" id="pills-experience" role="tabpanel" aria-labelledby="pills-experience-tab" tabindex="0">
    <div class="d-flex justify-content-between">
        <h4>Experience</h4>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Create
        </button>

    </div>
    Experience & Education Content

    <table class="table table-striped  border-primary">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Company</th>
                <th scope="col">Department</th>
                <th scope="col">Designation</th>
                <th scope="col">Period</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($experiences as $experience)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $experience->company }}</td>
                    <td>{{ $experience->department }}</td>
                    <td>{{ $experience->designation }}</td>
                    <td>
                        {{ $experience->start->format('Y-m-d') }} to
                        @if ($experience->end)
                            {{ $experience->end->format('Y-m-d') }}
                        @else
                            Present
                        @endif
                    </td>
                    <td class="text-nowrap">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Action buttons">
                            {{-- زر التعديل --}}
                            <button type="button" data-id="{{ $experience->id }}"
                                class="btn btn-outline-info edit-experience-btn">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <span class="d-none d-md-inline ms-1"></span>
                            </button>

                            {{-- زر الحذف --}}
                            <button type="button" data-id="{{ $experience->id }}"
                                class="btn btn-outline-danger rounded-end delete-btn">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>

                        {{-- نموذج الحذف المخفي --}}
                        <form id="delete-form-{{ $experience->id }}"
                            action="{{ route('candidate.candidate-experiences.destroy', $experience->id) }}"
                            method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @empty
                No Experience Data
            @endforelse

        </tbody>
    </table>

</div>
