<?php

namespace Modules\Service\App\DTOs;

use App\Contracts\DTOInterface;
use App\Contracts\FromLivewireRequest;
use App\Contracts\FromWebRequest;
use App\Contracts\ToArray;
use Modules\Service\App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Modules\Tasks\App\Enums\TaskStatus;

class ServiceActionDTO implements DTOInterface, FromWebRequest, ToArray {
    public function __construct(
        public readonly string $name,
        public readonly ?string $nameEn = null,
        public readonly string $description,
        public readonly ?string $descriptionEn = null,
        public readonly float|int $price,
        public readonly float|int $oldPrice,
        public readonly ?UploadedFile $image = null,
        public readonly ?Service $service = null,
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'name_en' => $this->nameEn,
            'description' => $this->description,
            'description_en' => $this->descriptionEn,
            'price' => $this->price,
            'old_price' => $this->oldPrice,
        ];
    }

    public static function fromWebRequest(\Illuminate\Foundation\Http\FormRequest $request): static
    {
        return new self(
            image: $request->validated('image'),
            name: $request->validated('name'),
            nameEn: $request->validated('name_en'),
            description: $request->validated('description'),
            descriptionEn: $request->validated('description_en'),
            price: $request->validated('price'),
            oldPrice: $request->validated('old_price'),
            service : $request->route('service') ?? null,
        );
    }
}