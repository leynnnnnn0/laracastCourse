<?php

  git config --global user.email "you@example.com"
  git config --global user.name "Your Name"

class Container
{
    protected $bindings = [];
    // Add
    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }
    // Remove
    // Get from the container
    public function resolve($key)
    {
        if(!array_key_exists($key, $this->bindings)){
            throw new Exception("Key doesn't exist");
        }
        $this->bindings[$key];
        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
             
       
    }
}