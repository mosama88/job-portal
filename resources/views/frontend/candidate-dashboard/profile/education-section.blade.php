    <div class="d-flex justify-content-between">
        <h4>Education</h4>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalEducation">
            Create
        </button>

    </div>

    <table class="table table-striped  border-primary">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Level</th>
                <th scope="col">Degree</th>
                <th scope="col">Year</th>
                <th scope="col">Note</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($educations as $education)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $education->level }}</td>
                    <td>{{ $education->degree }}</td>
                    <td>{{ $education->year }}</td>
                    <td>{{ Str::limit($education->note, 30) }}</td>
                    <td class="text-nowrap">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Action buttons">
                            {{-- زر التعديل --}}
                            <button type="button" data-id="{{ $education->id }}"
                                class="btn btn-outline-info edit-education-btn">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <span class="d-none d-md-inline ms-1"></span>
                            </button>

                            {{-- زر الحذف --}}
                            <button type="button" data-id="{{ $education->id }}"
                                class="btn btn-outline-danger rounded-end delete-btn">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>

                        {{-- نموذج الحذف المخفي --}}
                        <form id="delete-form-{{ $education->id }}"
                            action="{{ route('candidate.candidate-educations.destroy', $education->id) }}"
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
