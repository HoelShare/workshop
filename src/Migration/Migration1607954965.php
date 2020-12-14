<?php declare(strict_types=1);

namespace Workshop\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1607954965 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1607954965;
    }

    public function update(Connection $connection): void
    {
        $connection->executeQuery(<<<SQL
            create table product_number
            (
                id                 binary(16) not null,
                product_id         binary(16) not null,
                product_version_id binary(16) not null,
                created_at DATETIME(3) NOT NULL,
                updated_at DATETIME(3) NULL,
                constraint pk_product_number
                    primary key (id),
                constraint fk_product_number_product
                    foreign key (product_id, product_version_id) references product (id, version_id)
            );

            create table product_number_translation
            (
                product_number_id binary(16)  not null,
                language_id       binary(16)  not null,
                number            varchar(64) not null,
                created_at DATETIME(3) NOT NULL,
                updated_at DATETIME(3) NULL,
                constraint pk_product_number_translation
                    primary key (product_number_id, language_id),
                constraint fk_product_number_translation
                    foreign key (product_number_id) references product_number (id),
                constraint fk_product_number_translation_language
                    foreign key (language_id) references language (id)
            );
SQL
        );
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
