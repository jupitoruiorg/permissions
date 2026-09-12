<?php

/*
 * Part of the Permissions package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Cartalyst PSL License.
 *
 * This source file is subject to the Cartalyst PSL License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Permissions
 * @version    3.0.0
 * @author     Cartalyst LLC
 * @license    Cartalyst PSL
 * @copyright  (c) 2011-2022, Cartalyst LLC
 * @link       https://cartalyst.com
 */

namespace Cartalyst\Permissions;

use Closure;

class Group extends Collection
{
    /**
     * Returns a permission instance.
     *
     * @param mixed         $id
     * @param \Closure|null $callback
     *
     * @return \Cartalyst\Permissions\Collection
     */
    public function permission($id, ?Closure $callback = null): Collection
    {
        if (! $permission = $this->find($id)) {
            $this->put($id, $permission = new Permission($id));
        }

        $permission->executeCallback($callback);

        return $permission;
    }

    /**
     * Checks if the group has any permissions registered.
     *
     * @return bool
     */
    public function hasPermissions(): bool
    {
        return (bool) $this->count();
    }
}
