<div>
    <div class="bs-stepper wizard-numbered mt-2">
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
                        <span class="bs-stepper-circle">{{ $loop->iteration }}</span>
                        <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">{{ $step->title }}</span>
                            @if ($step->subtitle)
                                <span class="bs-stepper-subtitle">{{ $step->subtitle }}</span>
                            @endif
                        </span>
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
