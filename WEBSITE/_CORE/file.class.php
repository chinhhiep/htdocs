<?php

class    lg_file
{
    var $fi;
    var $mode;

    public function    __construct($file_path, $mode = "r")    //	r : read , w : write
    {
        if (!file_exists($file_path)) {
            echo "file not found";
            return;
        }
        $this->fi = fopen($file_path);
        $this->mode = $mode;
    }

    public function    write($txt)
    {
        if ($this->mode == "w")
            fputs($this->fi, $txt);
    }

    public function    writeln($txt)
    {
        if ($this->mode == "w")
            fputs($this->fi, $txt . "\n");
    }

    public function    readln()
    {
        if ($this->mode == "r")
            return fgetc($this->fi);
    }

    public function    readfile()
    {
    }

    public function    __destruct()
    {
        if (isset($this->fi))
            @fclose($this->fi);
    }
}

?>