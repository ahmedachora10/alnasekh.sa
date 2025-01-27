<form enctype="multipart/form-data" {{ $attributes->merge([
    'class' => 'dropzone needsclick',
]) }} action="{{route('file.uploader')}}">
    <div class="dz-message needsclick">
        @if ($content)
            {{ $content }}
        @else
            {{__('Drop files here or click to upload')}}
            {{-- <span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong>
                actually uploaded.)</span> --}}
            <i class="bx bx-upload fs-2"></i>
        @endif
        {{$slot}}
    </div>
    <div class="fallback">
        <input name="{{ $fileName }}" type="file" hidden />
    </div>
</form>
