# Welcome to NASBA CMA Fest Bingo!
## Application Overview
NASBA CMA Fest Bingo is a simple responsive web app that generates a printable CMA Fest bingo card.

Load `index.php` to test output.

## Objectives
1. The code in this simple web app is written in a procedure style. Please refactor it so that it is object oriented.
2. Please apply best practices for legacy code refactoring and improve the overall readability and efficiency of the code base. 
3. Please ensure that the HTML output is responsive.
4. The code must compile without error.

## Deliverables
The completed challenge can be submitted in the form of a repository on Github or Bitbucket, or it can be delivered as a compressed directory and emailed to Jeff Oliver at joliver@nasba.org.
 
In your submission, please indicate the following: 
1. Changes made and the reasons for those changes.
   * Created a basic MVC structure by creating a class for the business logic - Classes/CmaFestBingo.php, data model - Models/SquaresModel.php, and view rendering - Views/View.php. The View class performs basic tag substitution of content within the template Views/bingo.tpl.
   * I've been adopting the process of using namespaces and the spl_autoload PHP functions to dynamically load classes rather than maintaining 'require' statements across the codebase, if not using a more modern framework. By using namespaces and respective directory names for classes this is done very simply.
   * I enjoyed styling the bingo card a bit with colors and a background image to make the boxes more legible and the presentation more interesting. 
   
2. Any roadblocks encountered and how they were overcome:
   * One challenge was getting the bingo card squares to format correctly and scale responsively but this was achieved through some css tricks using the width and padding-bottom properties.
   * Another was displaying the text inside the boxes with strings that varied greatly in length. I came up with a rudimentary algorithm for assigning a custom font size in 'em's based on char length and then modifying the parent container's font point size in css media queries viewport width. So if further refinements are needed, they can be accomoplished by altering a few constants in the controller class and just a few base point sizes in the css.
   * I discovered that you never want to use array_rand() in PHP 5. It produces very non-random results and was fixed in PHP 7. Fortunately I realized an easier way to achieve randomization without array_rand() simply by using shuffle(). Another alternative would be to use mt_rand() to generate a set of random keys and is a good substitute for the older rand() function which is based on the same randomization library that array_rand() uses.

3. How you tested your code:
   * Used MAMP PHP 5.6 for local server testing
   * Debugged front end code and responsive layout with Chrome developer inspect panel
   * Tailed the PHP log for errors
   * Compile errors displayed in PHP Storm and php lint on command line

4. Recommendations for future changes that are outside of the scope for this project:
   * Maintaining a dataset of card options in MySQL may be desirable for administration capabilities.
   * I allowed for a constant to be set for the output's grid size, however additional calculations would need to be made to alter the font sizes for grids with more and smaller boxes. This could be done with a percentage offset to make the initial calculated sizes larger or smaller, proportionate to the change in grid box count.
   * Allowing a PDF to be downloaded could be convenient and allow for the bingo card to be shared.
   * Social media integration to post the card or link to the card page might get more friends involved.
   * Allowing the bingo card to be marked with progress saved on mobile devices might be preferred to printing it out. This could be achieved with a Google or Facebook login and a simple database to store user input.
   * Adding thumbnail images to the boxes would be fun for larger format displays or printed cards.
