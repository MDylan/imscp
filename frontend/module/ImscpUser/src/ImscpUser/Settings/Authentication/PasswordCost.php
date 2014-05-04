<?php
/**
 * i-MSCP - internet Multi Server Control Panel
 * Copyright (C) 2014 Laurent Declercq <l.declercq@nuxwin.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 */

namespace ImscpUser\Settings\Authentication;

use ImscpSettings\Settings\EditableSettingsInterface;

/**
 * Class PasswordCost
 *
 * @package ImscpUser\Settings\Authentication
 * @author Laurent Declercq <l.declercq@nuxwin.com>
 */
class PasswordCost implements EditableSettingsInterface
{
    /**
     * @var array
     */
    protected $value = 10;

    /**
     * @var array
     */
    protected $optionsValues;

    /**
     * Constructor
     */
    public function construct()
    {
        $this->optionsValues = range(4, 31);
    }

    /**
     * {@inheritdoc}
     */
    public function getNamespace()
    {
        return __NAMESPACE__;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function getLabel()
    {
        return "Authentication password cost";
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return 'The number represents the base-2 logarithm of the iteration count used for hashing.';
    }

    /**
     * {@inheritdoc}
     */
    public function getInputType()
    {
        return 'number';
    }

    /**
     * {@inheritdoc}
     */
    public function isRequired()
    {
        return true;
    }

    /**
     * Set option values
     *
     * @return PasswordCost
     */
    public function setOptionValues($optionsValues)
    {
        $this->optionsValues = $optionsValues;

        return $this;
    }

    /**
     * Get option values
     *
     * @return array
     */
    public function getOptionValues()
    {
        return $this->optionsValues;
    }

    /**
     * Get settings level
     *
     * @return string|array
     */
    public function getLevel()
    {
        return 'admin';
    }
}
