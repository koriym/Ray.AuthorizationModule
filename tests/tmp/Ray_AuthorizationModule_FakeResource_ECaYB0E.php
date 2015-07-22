<?php 
use Ray\AuthorizationModule\Annotation\RequiresRoles;class Ray_AuthorizationModule_FakeResource_ECaYB0E extends Ray\AuthorizationModule\FakeResource implements Ray\Aop\WeavedInterface
{
    private $isIntercepting = true;
    public $bind;
    /**
     * @RequiresRoles({"admin"})
     */
    function createUser()
    {
        if (isset($this->bindings[__FUNCTION__]) === false) {
            return call_user_func_array('parent::' . __FUNCTION__, func_get_args());
        }
        if ($this->isIntercepting === false) {
            $this->isIntercepting = true;
            return call_user_func_array('parent::' . __FUNCTION__, func_get_args());
        }
        $this->isIntercepting = false;
        $invocationResult = (new \Ray\Aop\ReflectiveMethodInvocation($this, new \ReflectionMethod($this, __FUNCTION__), new \Ray\Aop\Arguments(func_get_args()), $this->bindings[__FUNCTION__]))->proceed();
        $this->isIntercepting = true;
        return $invocationResult;
    }
}