<?php
class CStaticRule extends CBaseUrlRule
{

    public function createUrl($manager,$route,$params,$ampersand)
    {
        if ( in_array($route, ['site/i', 'site/my']) )
        {
            $action = explode('/', $route)[1];
            return $action.'/'.$params['template'];
        }
        return false;  // не применяем данное правило
    }

    public function parseUrl($manager, $request, $pathInfo, $rawPathInfo)
    {
        if (preg_match('%^(\w+)/(\w+)?$%', $pathInfo, $matches)){
            list($controller, $template) = explode('/',$pathInfo);
            if ( in_array($controller, ['i', 'my']) ){
//            $_GET['args'] = [$request, $pathInfo, $rawPathInfo];
                $_GET['controller'] = $controller;
                $_GET['template'] = $template;
                return 'site/'. $controller;
            }
        } 
        return false;  // не применяем данное правило
    }
}