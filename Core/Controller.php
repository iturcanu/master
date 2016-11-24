<?php
/**
 * Created by PhpStorm.
 * User: ioturcanu
 * Date: 11/24/2016
 * Time: 2:44 PM
 */

namespace Core;


abstract class Controller
{

    /**
     * Parameters from the matched route
     *
     * @var array
     */
    protected $route_params = [];

    /**
     * Class constructor
     *
     * @param array $route_params
     *
     * @return void
     */
    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }

    /**
     * Function to call for private, protected and non existing actions inside of a controller
     *
     * @param string $name the name of the method
     * @param array @args Arguments passed to the method
     *
     * @return void
     */
    public function __call($name, $args)
    {
        $method = $name.'Action';

        if(method_exists($this, $method))
        {
            if($this->before() !== false)
            {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        }else{
            echo "Method $method not found in controller ".get_class($this);
        }
    }

    /**
     *Before filter - called before an action method.
     *
     *@return void
     */
    protected function before()
    {

    }

    /**
     * After filter - called after an action method
     *
     * @return void
     */
    protected function after()
    {

    }


}