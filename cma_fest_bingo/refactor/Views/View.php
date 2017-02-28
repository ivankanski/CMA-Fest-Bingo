<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 2/25/17
 * Time: 3:37 PM
 */
namespace Views;

class View {

    const TAG_OPEN  = '{{';
    const TAG_CLOSE = '}}';
    /*
     * Filename of view
     * @var string
     */
    protected $file;

    /*
     * An array of values for replacing each tag in the view
     * @var array
     */
    protected $values = array();

    /*
     * Creates a new View and set filename
     * @param string $file
     */
    public function __construct($file) {
        $this->file = $file;
    }

    /*
     * Sets a value for replacing a specific tag
     * @param string $key - name of the tag
     * @param string $val - value to replace
     */
    public function set($key, $val) {
        $this->values[$key] = $val;
    }

    /*
     * Outputs the template content and replace the keys with respective values.
     * @return string
     */
    public function output() {

        if (!file_exists($this->file)) {
            return "Error loading view file: '" . $this->file . "'<br />";
        }
        $output = file_get_contents($this->file);

        foreach ($this->values as $key => $val) {
            $replace_tag = self::TAG_OPEN . $key . self::TAG_CLOSE;
            $output = str_replace($replace_tag, $val, $output);
        }

        return $output;
    }

    /*
     * Merges the content from an array of views.
     * @param array $views_arr -  Array of View objects to merge
     * @param string $separator - the string that is used between each View object
     * @return string
     */
    static public function merge($views_arr, $separator = "\n") {

        $output = '';

        foreach ($views_arr as $view) {
            if (get_class($view) !== "View") {
                $content = 'Incorrect type, expected View.';
            }else{
                $content = $view->output();
            }
            $output .= $content . $separator;
        }

        return $output;
    }
}

