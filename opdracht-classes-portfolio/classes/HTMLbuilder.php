<?php
    class HTMLbuilder
    {
        public $header;
        public $body;
        public $footer;
        
        public function __construct($header, $body, $footer)
		{
			$this->header	=	$header;
			$this->body		=	$body;
			$this->footer	=	$footer;

            $this->buildPage();
			
		}
        
        public function buildHeader()
        {
            foreach (glob("css/*.css") as $css)
            {
                $cssArray[] = "<link type='text/css' rel='stylesheet' href='$css'>";
            }
            $cssLink = implode('', $cssArray);

            include 'html/'. $this->header;
        }
        public function buildBody()
        {
            include 'html/'. $this->body;
        }
        public function buildFooter()
        {
            foreach (glob("js/*.js") as $js) 
            {
               $jsArray[] = "<script src='$js'></script>";
            }
            $jsLink = implode('', $jsArray);
            include 'html/'. $this->footer;
        }

        public function buildPage()
        {
            $this->buildHeader();
            $this->buildBody();
            $this->buildFooter();
        }
        
        public function findFiles($dir, $file)
		{
			return glob($dir . '/*.' . $file);	
		}
    }




?>