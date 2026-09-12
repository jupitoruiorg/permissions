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

class Container extends Collection
{
    /**
     * Returns a group instance.
     *
     * @param mixed         $id
     * @param \Closure|null $callback
     *
     * @return \Cartalyst\Permissions\Collection
     */
    public function group($id, ?Closure $callback = null): Collection
    {
        if (! $group = $this->find($id)) {
            $this->put($id, $group = new Group($id));
        }

        $group->executeCallback($callback);

        return $group;
    }

    /**
     * Checks if the container has any groups registered.
     *
     * @return bool
     */
    public function hasGroups(): bool
    {
        return (bool) $this->count();
    }
}
