<?php
/**
 * Class SquaresModel
 */
namespace Models;

class squares_model {
    
    public $count;

    public function __construct() {

    }

    /**
     * @return array
     */
    public function get_all() {

        return $this->squares_arr;
    }

    /**
     * @param int $index
     *
     * @return string
     */
    public function get_one($index=0) {

        $count = count($this->squares_arr);
        // Prevent index undefined/out of bounds error
        if ($index >= $count) $index = $count - 1;

        return $this->squares_arr[$index];
    }

    /**
     * @param int $ct -- number of random elements to return
     *
     * @return array
     */
    public function get_random($ct){

        shuffle($this->squares_arr);

        return array_slice($this->squares_arr, 0, $ct);
    }


    public function validate_str_length($max_len){

        $err = '';
        foreach($this->squares_arr as $square){
            if(mb_strlen($square) > $max_len){
                $err.="Data entry '$square' exceeds maximum length of $max_len characters.<br>";
            }
        }
        if(!empty($err)) {
            throw new \Exception($err);
        }
    }
    
    /**
     * @var array
     */
    protected $squares_arr = array(
        'American Flag Fanny Pack',
        'American Flag baseball cap',
        'American Flag Sunglasses',
        'Confederate flag',
        'Cut off jean shorts on a woman',
        'Cut off jean shorts on a man',
        'Parking for less than $25',
        'Light up hats',
        'Paper fan with Budweiser logo',
        'Street corner evangelist',
        'Selfie stick',
        'Tour bus',
        'Yazoo Beer',
        'Guitar pick earrings',
        'Texas flag',
        'A local pretending to be a tourist',
        'Journey being sung in a bar on Broadway',
        'A street musician performing music by Johnny Cash',
        'Lyft or Uber',
        'Homemade fan shirt',
        'A serious sunburn',
        'Cowboy hat with flip flops',
        'Food truck',
        'Someone being photo-bombed',
        'Elvis impersonator',
        'Autographed guitar',
        'Bachelorette party',
        'Energy drinks being given away',
        'Cell phone charging station',
        'Crocs',
        'Pedal tavern',
        'Yosemite Sam tattoo',
        'Jorts',
        'Beer dispensing apparel',
        'Keith Urban fan apparel',
        'Carrie Underwood fan apparel',
        'Reba Shirt',
        'Full camo outfit',
        'Water spray fan',
        'Sundress',
        'Crop top on a man',
        'Crop top on a woman',
        'Child size cowboy hat',
        'Pink cowgirl boots',
        'Cowboy boots covered in glitter',
        'Rhinestones on a jean jacket',
        'Shirt with sleeves cut off',
        'Predators water cooler',
        'Kids wagon full of cases of beer',
        'Johnny Cash tattoo',
        'Achey Breaky Heart tattoo',
        'Achey Breaky Heart playing over loudspeakers'
    );

}
