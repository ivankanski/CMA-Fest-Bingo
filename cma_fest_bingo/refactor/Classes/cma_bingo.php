<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 2/25/17
 * Time: 1:32 PM
 */
namespace Classes;

class cma_bingo {

    const       GRID_SIZE       = 5; // Number of rows and columns in grid
    const       STR_LEN_1       = 13;
    const       STR_LEN_2       = 17;
    const       STR_LEN_3       = 30;
    const       STR_LEN_MAX     = 50;

    const       CHAR_EM_XL    = 1.5;
    const       CHAR_EM_LG    = 1.3;
    const       CHAR_EM_MD    = 1.1;
    const       CHAR_EM_SM    = 1.0;

    private     $width_pct;
    private     $square_ct;
    private     $squares_model;
    public      $squares_arr;

    public function __construct() {

            $this->width_pct = 100/self::GRID_SIZE;
            $this->square_ct = pow(self::GRID_SIZE,2);
            $this->squares_model = new \Models\squares_model();

        try {
            $this->squares_model->validate_str_length(self::STR_LEN_MAX);
        }catch(Exception $e){
            echo '<b>Data validation Error:<br></b>';
            echo $e->getMessage();
        }
    }

    public function show_card(){

        $this->squares_arr = $this->squares_model->get_random($this->square_ct);

        $view       = new \Views\view('Views/bingo.tpl');
        $output     = '<div class="card">';
        $key        = 0;

        foreach($this->squares_arr as $square){

            // Use mb_strlen for multi-byte character support
            $str_len = mb_strlen($square);

            $size_em = $this->calc_font_size($str_len);


            $altcolor = (!($key % 2)) ? 'alt-color' : '';

            $row_open = (!($key % self::GRID_SIZE))
                ? '<div class="row">'
                : '';

            $row_close = (!(($key+1) % self::GRID_SIZE))
                ? '</div>'
                : '';

            $key++;
            $output .= $row_open;
            $output .= '<div class="col-xs-2 '.$altcolor.'" style="width:'.$this->width_pct.'%;padding-bottom:'.$this->width_pct.'%;">';

            $output .= '<div class="square" style="font-size:'.$size_em.'em">' . $square . '</div>';
            $output .= '</div>';
            $output .= $row_close;
        }
        $output .= '</div>';
        $view->set('BINGO_CARD', $output);

        return $view->output();
    }

    public function show_one($random=true, $index=0){

        if($random){
            $index = mt_rand(0, $this->squares_model->count - 1);
        }
        return $this->squares_model->get_one($index);
    }

    public function show_all(){

        return $this->squares_model->get_all();
    }

    /**
     * Set font size based on range of char length in box text
     * Note: font sizes currently only optimized for a 5x5 grid.
     */
    private function calc_font_size($str_len){

        switch(true) {
            case ($str_len <= self::STR_LEN_1):
                $size_em = self::CHAR_EM_XL;
                break;

            case ($str_len <= self::STR_LEN_2):
                $size_em = self::CHAR_EM_LG;
                break;

            case ($str_len <= self::STR_LEN_3):
                $size_em = self::CHAR_EM_MD;
                break;

            case ($str_len <= self::STR_LEN_MAX):
                $size_em = self::CHAR_EM_SM;
                break;

            default:
                $size_em = self::CHAR_EM_SM;
        }
        return $size_em;
    }
}


