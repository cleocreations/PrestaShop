<?php
/**
 * 2007-2020 PrestaShop SA and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2020 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

namespace PrestaShop\PrestaShop\Core\Domain\Currency\Command;

use PrestaShop\PrestaShop\Core\Domain\Currency\Exception\CurrencyConstraintException;
use PrestaShop\PrestaShop\Core\Domain\Currency\ValueObject\CurrencyId;

/**
 * Deletes given currencies
 */
class BulkDeleteCurrenciesCommand
{
    /**
     * @var CurrencyId[]
     */
    private $currencyIds = [];

    /**
     * @param int[] $currencyIds
     */
    public function __construct(array $currencyIds)
    {
        $this->setCurrencyIds($currencyIds);
    }

    /**
     * @return CurrencyId[]
     */
    public function getCurrencyIds()
    {
        return $this->currencyIds;
    }

    /**
     * @param int[] $currencyIds
     */
    private function setCurrencyIds(array $currencyIds)
    {
        if (empty($currencyIds)) {
            throw new CurrencyConstraintException('At least one currency must be provided for deleting', CurrencyConstraintException::EMPTY_BULK_DELETE);
        }

        foreach ($currencyIds as $currencyId) {
            $this->currencyIds[] = new CurrencyId($currencyId);
        }
    }
}
