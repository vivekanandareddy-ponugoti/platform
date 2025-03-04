<?php

namespace Ushahidi\Modules\V5\Actions\Category\Commands;

use App\Bus\Command\Command;
use Ushahidi\Modules\V5\Requests\CategoryRequest;

class UpdateCategoryCommand implements Command
{
    const DEFAULT_LANUGAGE = 'en';
    /**
     * @var int
     */
    private $categoryId;

    /**
     * @var ?string
     */
    private $parentId;

    /**
     * @var ?string
     */
    private $tag;

    /**
     * @var ?string
     */
    private $slug;

    /**
     * @var ?string
     */
    private $type;

    /**
     * @var ?string
     */
    private $description;

    /**
     * @var ?string
     */
    private $color;

    /**
     * @var ?string
     */
    private $icon;

    /**
     * @var ?int
     */
    private $priority;

    /**
     * @var ?array
     */
    private $role;

    /**
     * @var ?string
     */
    private $defaultLanguage;

    /**
     * @var ?array
     */
    private $availableLanguages;

    public function __construct(
        int $categoryId,
        ?string $parentId,
        ?string $tag,
        ?string $slug,
        ?string $description,
        ?string $type,
        ?string $color,
        ?string $icon,
        ?int $priority,
        ?array $role,
        ?string $defaultLanguage,
        ?array $availableLanguages
    ) {
        $this->categoryId = $categoryId;
        $this->parentId = $parentId;
        $this->tag = $tag;
        $this->slug = $slug;
        $this->description = $description;
        $this->type = $type;
        $this->color = $color;
        $this->icon = $icon;
        $this->priority = $priority;
        $this->role = $role;
        $this->defaultLanguage = $defaultLanguage;
        $this->availableLanguages = $availableLanguages;
    }

    public static function fromRequest(int $id, CategoryRequest $request): self
    {
        return new self(
            $id,
            $request->input('parent_id'),
            $request->input('tag'),
            $request->input('slug'),
            $request->input('description'),
            $request->input('type'),
            $request->input('color'),
            $request->input('icon'),
            $request->input('priority'),
            $request->input('role'),
            self::DEFAULT_LANUGAGE,
            []
        );
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function getParentId(): ?string
    {
        return $this->parentId;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function getRole(): ?array
    {
        return $this->role;
    }

    public function getDefaultLanguage(): ?string
    {
        return $this->defaultLanguage;
    }

    public function getAvailableLanguages(): ?array
    {
        return $this->availableLanguages;
    }
}
