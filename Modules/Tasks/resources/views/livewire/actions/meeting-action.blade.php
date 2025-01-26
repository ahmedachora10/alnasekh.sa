<div class="row">

    <div class="col-12 mb-4">
        <x-dashboard.input-group type="text" name="form.title" wire:model.defer="form.title" :title="trans('table.columns.title')" />
    </div>

    <div @class(['col-md-6 col-12 mb-4'])>
        <x-dashboard.select-group name="form.invited" wire:change="addInvited" wire:model.defer="tag"
            :title="trans('table.columns.user')">
            <option value="">{{ trans('select an employee') }}</option>
            @foreach ($users->filter(fn($user) => !in_array($user->id, $form?->invited ?? [])) as $item)
            <option value="{{$item->id}}">{{ $item->name }} </option>
            @endforeach
        </x-dashboard.select-group>

        <ul class="row justify-content-start align-items-center list-unstyled mt-2">
            @foreach ($form->invited ?? [] as $key => $item)
                <li class="col-auto px-2">
                    <x-dashboard.badge color="primary">
                        {{ $users->find($item)?->name }}
                    </x-dashboard.badge>
                    <i class="bx bx-trash text-danger" wire:click='removeItem({{$key}})'></i>
                </li>
            @endforeach
        </ul>
        <x-dashboard.error field="form.invited" />
    </div>

    <div class="col-md-6 col-12 mb-4">
        <x-dashboard.input-group type="datetime-local" name="form.date" wire:model.defer="form.date"
            :title="trans('table.columns.date')" />
    </div>

    <div class="col-12 mb-4">
        <x-dashboard.input-group type="description" name="form.description" wire:model.defer="form.description"
            :title="trans('table.columns.description')" />
    </div>

    {{-- </br> {{implode(' - ',$user->roles->pluck('name')->toArray())}} --}}
    <div class="col-12">
        <x-dashboard.button type="button" wire:click="save" class="btn-primary mt-3" />
    </div>
</div>

{{-- @pushOnce('scripts')
    @script
        <script>

             $wire.on('meeting-send-request', (event) => {
                console.log(event.tags);

                let tag = document.querySelector("#users");

                let existingTags = Object.values(event.tags);
                const whitelist = {{Illuminate\Support\Js::from($users)}};

                let tagify = new Tagify(tag, {
                        whitelist: whitelist,
                        maxTags: 10, // allows to select max items
                        dropdown: {
                        maxItems: 20, // display max items
                        classname: "tags-inline", // Custom inline class
                        enabled: 0,
                        closeOnSelect: false
                    }
                });

                tagify.removeAllTags();


                 if (Array.isArray(existingTags) && existingTags.length) {


                     console.log(tag.value);

                    tagify.addTags(existingTags.map(t => t.value));
                    console.log(tagify);


                    console.log(existingTags);

                }

            });

            initTagify();
            function initTagify() {
                let TagifyCustomInlineSuggestionEl = document.querySelector("#users");

                if (!TagifyCustomInlineSuggestionEl) return;

                // Destroy existing instance if it exists
                if (TagifyCustomInlineSuggestionEl.tagify) {
                    TagifyCustomInlineSuggestionEl.tagify.destroy();
                }


                const whitelist = {{Illuminate\Support\Js::from($users)}};
                let existingTags = Array.from($wire.form.invited);

                if (existingTags.length) {
                    existingTags = existingTags.map(id => ({
                        id: whitelist.filter((user) => id == user.id)[0].id,
                        value: whitelist.filter((user) => id == user.id)[0].value
                    }));
                }

                let tagify = new Tagify(TagifyCustomInlineSuggestionEl, {
                        whitelist: whitelist,
                        maxTags: 10, // allows to select max items
                        dropdown: {
                        maxItems: 20, // display max items
                        classname: "tags-inline", // Custom inline class
                        enabled: 0,
                        closeOnSelect: false
                    }
                });


                tagify.on('change', function(e) {
                    const array = JSON.parse(e.detail.value);

                    $wire.form.invited = [];
                    $wire.tags = [];

                    array.map(tag => $wire.form.invited.push(tag.id));
                    array.map(tag => $wire.tags.push(tag.value));
                });
            }
        </script>
    @endscript
@endPushOnce --}}
