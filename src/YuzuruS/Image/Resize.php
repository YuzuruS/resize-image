<?php
namespace YuzuruS\Image;
/**
 * Resize
 *
 * @author Yuzuru Suzuki <navitima@gmail.com>
 * @license MIT
 */
class Resize {
    
    private $file;
    private $image_width;
    private $image_height;
    private $width;
    private $height;
    private $ext;
    private $types = ['', 'gif', 'jpeg', 'png'];
    private $quality = 80;
    private $top = 0;
    private $left = 0;
    private $is_crop = false;
    private $type;

    /**
     * Resize constructor.
     * @param string $name
     */
    public function __construct($name = '')
    {
        $this->file = $name;
        $info = getimagesize($name);
        $this->image_width = $info[0];
        $this->image_height = $info[1];
        $this->type = $this->types[$info[2]];
        $info = pathinfo($name);
        $this->dir = $info['dirname'];
        $this->name = str_replace('.'.$info['extension'], '', $info['basename']);
        $this->ext = $info['extension'];
    }

    /**
     * set directory
     *
     * @param string $dir
     * @return mixed
     */
    public function dir($dir = '')
    {
        if(!$dir) return $this->dir;
        $this->dir = $dir;
    }

    /**
     * set image name
     *
     * @param string $name
     * @return mixed
     */
    public function name($name = '')
    {
        if(!$name) return $this->name;
        $this->name = $name;
    }

    /**
     * set width for image
     * @param string $width
     */
    public function width($width = '')
    {
        $this->width = $width;
    }

    /**
     * set height for immage
     * @param string $height
     */
    public function height($height = '')
    {
        $this->height = $height;
    }

    /**
     * execute to resize image
     * @param int $percentage
     */
    public function resize($percentage = 50)
    {
        if($this->is_crop) {
            $this->is_crop = false;
            $this->width = round($this->width * ($percentage / 100));
            $this->height = round($this->height *($percentage / 100));
            $this->image_width = round($this->width / ($percentage / 100));
            $this->image_height = round($this->height / ($percentage / 100));
        } else {
            $this->width = round($this->image_width * ($percentage / 100));
            $this->height = round($this->image_height * ($percentage / 100));
        }
    }

    /**
     * set crop
     * @param int $top
     * @param int $left
     */
    public function crop($top = 0, $left = 0)
    {
        $this->is_crop = true;
        $this->top = $top;
        $this->left = $left;
    }

    /**
     * set quality
     * @param int $quality
     */
    public function quality($quality = 80)
    {
        $this->quality = $quality;
    }

    /**
     * show
     */
    public function show()
    {
        $this->save(true);
    }

    /**
     * save image
     * @param bool $show
     */
    public function save($show = false)
    {
        if($show) @header('Content-Type: image/'.$this->type);
        
        if(!$this->width && !$this->height) {
            $this->width = $this->image_width;
            $this->height = $this->image_height;
        } elseif (is_numeric($this->width) && empty($this->height)) {
            $this->height = round($this->width / ($this->image_width / $this->image_height));
        } elseif (is_numeric($this->height) && empty($this->width)) {
            $this->width = round($this->height / ($this->image_height / $this->image_width));
        } else {
            if ($this->width <= $this->height) {
                $height = round($this->width / ($this->image_width / $this->image_height));
                if($height != $this->height) {
                    $percentage = ($this->image_height * 100) / $height;
                    $this->image_height = round($this->height * ($percentage / 100));
                }
            } else {
                $width = round($this->height / ($this->image_height / $this->image_width));
                if($width != $this->width) {
                    $percentage = ($this->image_width * 100) / $width;
                    $this->image_width = round($this->width * ($percentage / 100));
                }
            }
        }
        
        if($this->is_crop) {
            $this->image_width = $this->width;
            $this->image_height = $this->height;
        }

        if($this->type === 'jpeg') $image = imagecreatefromjpeg($this->file);
        if($this->type === 'png') $image = imagecreatefrompng($this->file);
        if($this->type === 'gif') $image = imagecreatefromgif($this->file);
        
        $new_image = imagecreatetruecolor($this->width, $this->height);
        imagecopyresampled($new_image, $image, 0, 0, $this->top, $this->left, $this->width, $this->height, $this->image_width, $this->image_height);
        
        $name = $show ? null: $this->dir.DIRECTORY_SEPARATOR.$this->name.'.'.$this->ext;
        if($this->type === 'jpeg') imagejpeg($new_image, $name, $this->quality);
        if($this->type === 'png') imagepng($new_image, $name);
        if($this->type === 'gif') imagegif($new_image, $name);
        
        imagedestroy($image); 
        imagedestroy($new_image);
    }
}
