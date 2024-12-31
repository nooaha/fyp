<!-- checklist-milestone-partial.blade.php -->

@foreach ($milestoneProgress as $item)
    <div class="card mb-3">
        <div class="card-body">
            <h6 class="card-title mb-3">
                {{ $item['milestone']->title }} - {{ $item['milestone']->age_category }}
            </h6>
            <div class="row align-items-center">
                <!-- Progress Label -->
                <div class="col-md-4">
                    <p class="mb-0">Peratusan Pencapaian Perkembangan</p>
                </div>
                <!-- Progress Bar -->
                <div class="col-md-5 mb-2">
                    <div class="progress progress-lg">
                        <div class="progress-bar progress-bar-striped bg-success d-flex justify-content-center align-items-center"
                            role="progressbar"
                            style="width: {{ $item['progress'] ?? 0 }}%; height: 25px; font-weight: bold; color: black;"
                            aria-valuenow="{{ $item['progress'] ?? 0 }}" aria-valuemin="0" aria-valuemax="100">
                            {{ $item['progress'] ?? 0 }}%
                        </div>
                    </div>
                </div>
                <!-- Record Progress Button -->
                <div class="col-md-3 text-end">
                    <a href="{{ route('record-milestone.index', ['milestone_id' => $item['milestone']->id, 'childId' => $child->id]) }}"
                        class="btn btn-primary">Rekod Perkembangan</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
