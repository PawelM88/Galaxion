# Technical documentation – Submit button activation control based on available points

## Script description

Script: `galaxion\assets\js\costValidation.js`

This script is responsible for dynamically managing the state of the submit button of the user form depending on the number of available points and the sum of the costs of the selected modules. The save button is enabled or disabled based on a comparison of the available points with the total cost of the modules.

## Input data
1. `available-points` – DOM element displaying the number of available user points.
2. `total-cost` – DOM element displaying the total cost of the selected modules.
3. `user_spaceship_save` – The form save button (submit button), which is activated or deactivated depending on the result of the comparison.

## Script operation

1. Getting references to DOM elements:
At first, the script retrieves DOM elements responsible for displaying the number of available points (`available-points`), the sum of costs (`total-cost`) and the save button (`user_spaceship_save`). If one of these elements cannot be found, the script aborts and displays an error in the console.

2. `checkIfCanSave()` function:
This function compares the value of the user's available points with the total cost of the modules. If the number of available points is greater than or equal to the cost, the save button is enabled. Otherwise, the button is disabled.

3. MutationObserver:
The script uses `MutationObserver` to monitor changes in the `total-cost` element. When this element changes (e.g., due to a change in the selected module), the script automatically checks whether the save button should be enabled or disabled.

4. Event handling:
Each selection from the dropdown list (modules form) triggers a re-check for the possibility of activating the save button. The `change` event is logged for all `<select>` elements on the page.

## End result
1. Dynamic activation of the save button: The save button is enabled only when the user has enough points to cover the total cost of the selected modules.

2. Real-time change checking: The script automatically monitors changes in the displayed costs and number of points, allowing the button state to be updated continuously.

## Dependencies

- DOM elements such as `available-points`, `total-cost` and `user_spaceship_save` must be loaded correctly in the document for the script to work.
- The script depends on external mechanisms to update the total costs, such as the first script responsible for calculating the module costs.

## Limitations

- The script assumes that the `available-points`, `total-cost` and save button elements are always present in the DOM. Otherwise, an error is displayed in the console.

- The script monitors changes to the `total-cost` element, but other sources of changes that may affect the save button must be manually added.