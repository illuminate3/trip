<?php

if (!function_exists('check_model')) {
    /**
     * Generate a HTML link after checking the correct model to a controller action.
     *
     * @param string $model
     * @param string $slug
     * @param string $title
     * @param array $parameters
     * @param array $attributes
     *
     * @return string
     */
    function check_model($model, $slug, $title = null, $parameters = [], $attributes = [])
    {
        $route = "";
        switch ($model) {
            case "App\\Hotel":
                $route = "hotels";
                break;
            case "App\\Vehicle":
                $route = "vehicles";
                break;
            case "App\\Tour":
                $route = "tours";
                break;
            case "App\\Restaurant":
                $route = "restaurants";
                break;
            case "App\\Venue":
                $route = "venues";
                break;
            default:
                $route = "404";
                break;
        }
        return $this->app('html')->linkRoute($route . "/" . $slug, $title, $parameters, $attributes);

    }
}
