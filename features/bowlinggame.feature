Feature: Bowling
    As a developer
    In order to improve my skills with tools and techniques
    I want to solve a coding problem using some tools and techniques I haven't tried before

    Scenario Outline: A series of rolls in a game of bowling are scored correctly
        Given I have started a new game of bowling
        When I roll a sequence of balls "<Rolls>"
        Then my score should be "<Score>"

        Examples:
            | Rolls                 | Score |
            | XXXXXXXXXXXX          | 300   |
            | 9-9-9-9-9-9-9-9-9-9-  | 90    |
            | 5/5/5/5/5/5/5/5/5/5/5 | 150   |
            | 9/7--64---X4/9/9-5-   | 106   |
