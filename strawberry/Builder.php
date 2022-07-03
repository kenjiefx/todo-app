<?php

declare(strict_types=1);

define('URI',$_SERVER['REQUEST_URI']);

class Builder {

    private array $chunks = [];
    private static $themePath = ROOT.'/theme';
    private string $contentType = 'text/html';
    private string $contentPath = '';

    public function __construct()
    {
        $this->parse()->route();
    }

    private function parse()
    {
        $this->chunks = explode('/',explode('?',URI)[0]);
        array_shift($this->chunks);
        return $this;
    }

    private function route()
    {
        if ($this->chunks[0]==='widget') {
            if ($this->chunks[1]==='lib.css') {
                $this->contentType = 'text/css';
                $this->contentPath = Self::$themePath.'/widgets/lib.css.php';
                return;
            }
            if ($this->chunks[1]==='app.js') {
                $this->contentType = 'text/css';
                $this->contentPath = Self::$themePath.'/widgets/app.js.php';
                return;
            }
        }
        if ($this->chunks[0]==='preview'&&$this->chunks[1]==='module') {
            $GLOBALS['module'] = ucfirst($this->chunks[2]);
            $GLOBALS['scope'] = $_GET['scope'] ?? null;
            $this->contentType = 'text/html';
            $this->contentPath = __dir__.'/utils/module.php';
            return;
        }
        if ($this->chunks[0]==='venta'&&$this->chunks[1]==='app.css') {
            $this->contentType = 'text/css';
            $this->contentPath = Self::$themePath.'/widgets/lib.css.php';
            return;
        }
        if($this->chunks[0]==='') $this->chunks[0] = 'index';
        $this->validate();
        $this->contentPath = Self::$themePath.'/templates/'.implode('/',$this->chunks);
        if (!file_exists($this->contentPath)) {
            $this->found = false;
            $this->contentPath = Self::$themePath.'/templates/404.php';
            return;
        }
        return $this;
    }

    private function validate()
    {
        $chunks = $this->chunks;
        $this->chunks = [];
        $end = count($chunks)-1;
        $i = 0;
        foreach ($chunks as $chunk) {
            if ($i===$end) {
                $parts = explode('.',$chunk);
                $chunk = $parts[0].'.php';
            }
            array_push($this->chunks,$chunk);
        }
    }



    public function build()
    {
        if ($this->contentType==='text/html') {
            include __dir__.'/utils/functions.php';
        }

        header('Content-Type: '.$this->contentType);
        include $this->contentPath;

    }

}
