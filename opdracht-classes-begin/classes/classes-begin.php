<?php 
    class Percent
        {
        public $absolute;
		public $relative;
		public $hundred;
		public $nominal;
        
            public function __construct($new, $unit)
            {
                $absolute = formatNumber($new / $unit);
                $relative = formatNumber($absolute - 1);
                $hundred = formatNumber($absolute * 100);
                if( $absolute > 1 )
                {
                    $nominal = 'positive';
                }
                else if( $absolute = 1)
                {
                    $nominal = 'status-quo';
                }
                else
                {
                    $nominal = 'negative';
                }
            }
        
            public function formatNumber($number)
		    {
			     return number_format($number, 2, ',', ' ');
		    }
        
        
        }
/*$this->absolute = $this->formatNumber($new / $unit);
                $this->relative = $this->formatNumber($this - 1);
                $this->hundred = $this->formatNumber($this * 100);*/

?>