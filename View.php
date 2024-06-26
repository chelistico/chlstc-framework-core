<?php
/**
 * User: chelistico
 * Date: 11/04/2024
 * Time: 21:44
 */

 namespace chelistico\phpframeworkcore;

 /**
  * Class View
  *
  * @author chelistico <marcelovieyra@hotmail.com>
  * @package chelistico\phpframeworkcore
  */
class View
{
    public string $title = '';

    public function renderView($view, $params = [])
    {
        $viewContent = $this->renderOnlyView($view, $params);
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        $layout = Application::$app->layout;
        if (Application::$app->controller) {
            $layout = Application::$app->controller->layout;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {
        foreach($params as $k => $v) {
            $$k = $v;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return  ob_get_clean();
    }
}