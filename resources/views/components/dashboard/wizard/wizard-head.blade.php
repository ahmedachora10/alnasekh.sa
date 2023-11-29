<div>
    <div class="bs-stepper wizard-numbered mt-2">
        {{-- style="overflow-x: scroll" --}}
        <div class="bs-stepper-header">
            @foreach ($steps as $step)
                @php
                    $currentStep = $step->target === $current;
                    if ($currentStep) {
                        $oldSteps = true;
                    }
                @endphp
                <div @class([
                    'step',
                    'active' => $currentStep,
                    'crossed' => !isset($oldSteps),
                ]) data-target="#{{ $step->target }}">
                    <button type="button" class="step-trigger" aria-selected="false">
                        @if ($currentStep || $loop->count < $countOfSteps)
                            <span class="bs-stepper-circle">{{ $loop->iteration }}</span>
                            <span class="bs-stepper-label mt-1">
                                <span class="bs-stepper-title">{{ $step->title }}</span>
                                @if ($step->subtitle)
                                    <span class="bs-stepper-subtitle">{{ $step->subtitle }}</span>
                                @endif
                            </span>
                        @else
                            <x-dashboard.tooltips class="bs-stepper-circle" :title="$loop->iteration">
                                <span class="bs-stepper-label mt-1">
                                    <span class="bs-stepper-title">
                                        <i class="bx bx-info-circle"></i>
                                        {{ $step->title }}
                                    </span>
                                </span>
                            </x-dashboard.tooltips>
                        @endif
                    </button>
                </div>
                @if (!$loop->last)
                    <div class="line">
                        <i class="bx bx-chevron-right"></i>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    {{ $slot }}
</div>
