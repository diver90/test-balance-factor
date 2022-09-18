# test-balance-factor

## Overview

This project has just two functions - Balance and Factor.

### Balance
Accepts a string as input and returns a boolean as output. The function determine if all parenthetical characters in the string—(, ), [, ], {, }—are balanced, that is, for each opening parenthesis, there is a corresponding closing parenthesis of the same form, and in the reversed sequence as they were opened. Parentheses may be nested.

This is balanced: mary (had a [little] lamb)

This is unbalanced: mary (had a [little) lamb]

### Factor
Accepts two arguments, an array of numbers and a single integer, and returns an array similar to the first argument, but with all the values multiplied by the integer. The input array may be nested arbitrarily deeply. For example:

input: [1, 2, [10, [100, 200], 20, 30], 3, [40, 50]], 2
output: [2, 4, [20, [200, 400], 40, 60], 6, [80, 100]]


## Follow the next steps to deploy the application:

1. Clone it into your project directory from GitHub repository:

```sh
git clone https://github.com/diver90/test-balance-factor.git
```
2. Go to the project directory. Add your tasks to _balancer.txt_ and __factor.txt__ files, each new string is a new task.
3. Run application with command below and follow the instructions
```sh
php start.php
```

*Note: for running this aplication you need PHP installed on your OS
