<?php declare(strict_types=1);

namespace Workshop\ProductNumber;

use Shopware\Core\Framework\DataAbstractionLayer\EntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class ProductNumberTranslationDefinition extends EntityTranslationDefinition
{
    public const ENTITY_NAME = 'product_number_translation';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    protected function getParentDefinitionClass(): string
    {
        return ProductNumberDefinition::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new StringField('number', 'number'))->addFlags(new Required()),
        ]);
    }
}
