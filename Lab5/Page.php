<?php
    class Page {
        private $page;
        private $title;
        private $year;
        private $copyright;

        function __construct($title, $content, $name) {
            $this->year = date('Y');
            $this->page = "<div>$content</div>";
            $this->title = $title;
            $this->copyright = "Copyright : Created by $name";
            $this->addHeader();
            $this->addFooter();
        }

        private function addHeader() {
            $this->title = "<header>$this->title</header>";
        }

        public function addContent($in_content) {
            $this->page = $this->page . "<div>$in_content</div>";
        }

        private function addFooter() {
            $this->copyright = "<footer>$this->copyright, in $this->year.</footer>";
        }

        public function get() {
            return($this->title . "<hr><body>$this->page</body><hr>" . $this->copyright);
        }
    }
?>