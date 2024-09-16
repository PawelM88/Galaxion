# Technical Documentation – Updating and Summarizing Module Costs

## Script Description

Script: `galaxion\assets\js\componentCosts.js`

This script is designed to dynamically retrieve data on the costs of spacecraft modules selected by the user, and then display these costs in appropriate places on the page. After summing the costs of all selected modules, the script calculates the total cost and updates the displayed information on the user's available points.

## Input data

1. `componentCostsData` – A global object in window that contains the costs of available modules.
2. `componentSelects` – DOM objects representing the spaceship module selection form that are associated with module costs.
3. `costDisplays` – DOM elements that display the costs of individual modules.
4. `available-points` – A DOM element that displays the current number of available user points.

## Script operation

1. Getting data from the form:<br>
The script starts by assigning references to form elements using `componentSelects` and `costDisplays` objects. Each form element corresponds to a different ship module (e.g. `armor`, `cockpit`, `engine`, etc.).

2. `updateCost(component)` function:<br>
Gets the cost of the selected module from the data (`componentCostsData`) and displays it in the appropriate element on the page. If the selected module is the same as the one previously saved (i.e. there are no changes), the cost is set to `0`.

3. `updateTotalCost()` function:<br>
Goes through all modules, sums up their costs, and updates
- Total cost of modules.
- Remaining points available to the user, after subtracting the sum of module costs from their initial points.

4. Event handling:<br>
Each change of module selection in the form (`change` event) triggers a recalculation of the total cost and available points.

## Final Effect

1. The costs of the selected modules are dynamically updated and displayed in the appropriate fields on the page.

2. The total cost of the modules is added up and displayed.

3. The remaining number of user points is automatically calculated and displayed in the appropriate field.

## Dependencies

- Global variable `window.componentCostsData`, which stores information about module costs.

- Module selection forms must have appropriate attributes (`data-savedId`) and associated fields to display costs.

## Limitations

- The script assumes that the data structure in `window.componentCostsData` contains correctly mapped module IDs and their costs.
- The selection form must have a `data-savedId` attribute to be able to compare the currently selected modules with previous selections.
