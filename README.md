# Bowling Kata

##  Problem Description
   
Create a program, which, given a valid sequence of rolls for one line of American Ten-Pin Bowling, produces the total score for the game. Here are some things that the program will not do:
   
 - We will not check for valid rolls.
 - We will not check for correct number of rolls and frames.
 - We will not provide scores for intermediate frames. 
   
Depending on the application, this might or might not be a valid way to define a complete story, but we do it here for purposes of keeping the kata light. I think you'll see that improvements like those above would go in readily if they were needed for real.
   
We can briefly summarize the scoring for this form of bowling:

 - Each game, or "line" of bowling, includes ten turns, or "frames" for the bowler.
 - In each frame, the bowler gets up to two tries to knock down all the pins.
 - If in two tries, he fails to knock them all down, his score for that frame is the total number of pins knocked down in his two tries.
 - If in two tries he knocks them all down, this is called a "spare" and his score for the frame is ten plus the number of pins knocked down on his next throw (in his next turn).
 - If on his first try in the frame he knocks down all the pins, this is called a "strike". His turn is over, and his score for the frame is ten plus the simple total of the pins knocked down in his next two rolls.
 - If he gets a spare or strike in the last (tenth) frame, the bowler gets to throw one or two more bonus balls, respectively. These bonus throws are taken as part of the same turn. If the bonus throws knock down all the pins, the process does not repeat: the bonus throws are only used to calculate the score of the final frame.
 - The game score is the total of all frame scores. 

More info on the rules at: <http://www.topendsports.com/sport/tenpin/scoring.htm>

### Clues

What makes this game interesting to score is the lookahead in the scoring for strike and spare. At the time we throw a strike or spare, we cannot calculate the frame score: we have to wait one or two frames to find out what the bonus is.

### Suggested Test Cases

(When scoring "X" indicates a strike, "/" indicates a spare, "-" indicates a miss)

"XXXXXXXXXXXX" (12 rolls: 12 strikes) = 10+10+10 + 10+10+10 + 10+10+10 + 10+10+10 + 10+10+10 + 10+10+10 + 10+10+10 + 10+10+10 + 10+10+10 + 10+10+10 = 300
"9-9-9-9-9-9-9-9-9-9-" (20 rolls: 10 pairs of 9 and miss) = 9 + 9 + 9 + 9 + 9 + 9 + 9 + 9 + 9 + 9 = 90
"5/5/5/5/5/5/5/5/5/5/5" (21 rolls: 10 pairs of 5 and spare, with a final 5) = 10+5 + 10+5 + 10+5 + 10+5 + 10+5 + 10+5 + 10+5 + 10+5 + 10+5 + 10+5 = 150 

## Method

Work in pairs to implement a solution following the laws of Test Driven Development:

1. You may not write any production code until you have written a failing unit test
2. You may not write more of a unit test than is sufficient to fail. Not compiling is failing.
3. You may not write more production code than is sufficient to pass the currently failing test.

If it is taking longer than 2 minutes to write the production code to make your currently failing test pass, delete the
test and write a new one tackling a smaller part of the problem. Small steps are the key.

Follow the RED-GREEN-REFACTOR cycle as you code. Make a failing test, make it pass using _whatever_ code is necessary,
then remove duplication while keeping the tests passing.

## Testing

I've provided a behat .feature file that you may choose to use to test your solution once it is complete, but only use
it for verification - write the unit tests yourself as you code. I have purposely not completed the feature context file
for this reason, though this is easy enough to do and there are comments in there to help you verify your solution
afterwards.

## Tools

I have put composer into this repository (you'll need PHP installed to use it) along with a `composer.json` and
`composer.lock` that will install the latest versions of Behat, PHPUnit and PHPSpec that you can make use of if you want
to. You can use this opportunity to learn about one of these tools that you haven't used before if you like.

Use the namespace `Cdt\BowlingKata\` in both the src and test folders.

## Commands

After cloning the repository, run:

    composer install
    
You may need to make the 'composer' file in this repository executable first.

### PHPUnit

To run PHPUnit tests, run:

    bin/phpunit

### PHPSpec

To use PHPSpec, use this command to describe a class:

    bin/phpspec desc Cdt\\BowlingKata\\<classname>

Note the escaping of the PHP namespace separator on command line. A `spec` folder will be created with your test class.
To test, run:

    bin/phpspec run
    
### Behat

To run the behat tests, run:

    bin/behat

If you get errors, you may need to add the following to your `php.ini` file:

    xdebug.max_nesting_level=500