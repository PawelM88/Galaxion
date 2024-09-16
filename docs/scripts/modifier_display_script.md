# Technical Documentation – Update Displayed Modifiers for Modules

## Script Description

The script is responsible for dynamically displaying stat modifiers for individual modules of a spaceship based on user selections. Each module can affect stats such as armor, energy shield, missile weapons, energy weapons, cockpit, engine, and defense system. The script retrieves these modifiers from the `window.componentModifiersData` variable and displays them in the appropriate places on the page.

## Input data
1. componentModifiersData – A global object containing information about modifiers for individual modules that affect various ship statistics.

2. componentSelects – DOM objects that represent drop-down lists for each module (e.g. armor, shield, cockpit, etc.).

3. modifierDisplays – DOM objects that display the modifier values ​​for the appropriate stats (e.g. armor, shield, initiative, etc.).

## Script operation
1. Getting data from the form:<br>
The script assigns references to the form elements responsible for selecting user modules using the `componentSelects` object. At the same time, it assigns references to the elements displaying modifiers using the `modifierDisplays` object.

2. `updateModifier(component)` function:<br>
This function retrieves the selected module identifier from the appropriate drop-down list (`componentSelects`) and based on it retrieves the modifier value from the data in `componentModifiersData`. The modifier is then displayed in the appropriate field on the page. If the modifier is greater than 0, it is displayed with a plus sign, and if less than 0, it is displayed without a sign (e.g. -5).

3. `updateAllModifiers()` function:<br>
This function iterates through all modules, updating the modifiers for each of them.

4. Event handling:<br>
The script registers a `change` event for each module selection element (`select`). Each change to the selected module causes the modifiers to be recalculated and updated. The script also performs an initial update of the modifiers after the page loads.

## Final Effect
1. Dynamic update of modifiers: Whenever the module selection is changed, the stat modifiers associated with the selected module are dynamically updated and displayed on the page.

2. Clear information for the user: The user can see how the selected module will affect the stats of their ship (e.g. adding +5 to armor).

## Dependencies

- The script requires the existence of a global `componentModifiersData` object, which contains a mapping of module IDs to their modifiers.

- Module selection forms must be correctly bound to the appropriate DOM elements displaying modifiers.

## Limitations

- The script assumes that the `componentModifiersData` variable contains correctly mapped module IDs and their modifiers.
- The script only works on those elements that are available on the page at the time of loading.