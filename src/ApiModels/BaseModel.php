<?php

namespace Sashalenz\Binotel\ApiModels;

use Closure;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Sashalenz\Binotel\Exceptions\BinotelException;
use Sashalenz\Binotel\Request;

abstract class BaseModel
{
    protected bool $canBeCached = false;
    protected int $cacheSeconds = -1;
    private ?string $method = null;

    /**
     * @param int $seconds
     * @return $this
     */
    public function cache(int $seconds = -1) : self
    {
        $this->canBeCached = true;
        $this->cacheSeconds = $seconds;

        return $this;
    }

    /**
     * @param $method
     * @return $this
     */
    protected function method($method) : self
    {
        $this->method = $method;

        return $this;
    }

    public function when(bool $condition, Closure $callback, ?Closure $closure = null) : self
    {
        if ($condition) {
            return $callback($this) ?: $this;
        }

        if (!is_null($closure)) {
            return $closure($this) ?: $this;
        }

        return $this;
    }

    /**
     * @return Collection
     */
    protected function getParams() : Collection
    {
        $properties = array_diff_key(
            get_object_vars($this),
            get_class_vars(get_parent_class($this))
        );

        return collect($properties);
    }

    /**
     * @param array $rules
     * @throws BinotelException
     */
    protected function validate($rules = []): void
    {
        $validator = Validator::make(
            $this->getParams()->toArray(),
            $rules
        );

        if ($validator->fails()) {
            throw new BinotelException($validator->errors()->first());
        }
    }

    /**
     * @return Collection
     * @throws BinotelException
     */
    public function request() : Collection
    {
        if (is_null($this->method)) {
            throw new BinotelException('Provide method first');
        }

        $request = new Request($this->method, $this->getParams());

        if ($this->canBeCached) {
            return $request->cache($this->cacheSeconds);
        }

        return $request->make();
    }
}
