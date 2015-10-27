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
			
		}
        
        public function buildHeader()
        {
            foreach (glob("css/*.css") as $css)
            {
                echo "<link type='text/css' rel='stylesheet' href='$css'>\n";
            }
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
                echo "<script src='$js'></script>\n";
            }
            include 'html/'. $this->footer;
        }
        
        public function findFiles($dir, $file)
		{
			return glob($dir . '/*.' . $file);	
		}
    }




?>