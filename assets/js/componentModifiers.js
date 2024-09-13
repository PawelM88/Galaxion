function initializeModifierUpdate() {
    const componentSelects = {
        'armor': document.querySelector('#user_spaceship_armor'),
        'energyShield': document.querySelector('#user_spaceship_energyShield'),
        'rocketWeapon': document.querySelector('#user_spaceship_rocketWeapon'),
        'energyWeapon': document.querySelector('#user_spaceship_energyWeapon'),
        'cockpit': document.querySelector('#user_spaceship_cockpit'),
        'engine': document.querySelector('#user_spaceship_engine'),
        'defenceSystem': document.querySelector('#user_spaceship_defenceSystem')
    };

    const modifierDisplays = {
        'armor': document.getElementById('armor-modifier'),
        'energyShield': document.getElementById('energyShield-modifier'),
        'rocketWeapon': document.getElementById('rocketWeapon-modifier'),
        'energyWeapon': document.getElementById('energyWeapon-modifier'),
        'cockpit': document.getElementById('accuracy-modifier'),
        'engine': document.getElementById('initiative-modifier'),
        'defenceSystem': document.getElementById('defenceSystem-modifier')
    };

    const componentModifiers = window.componentModifiersData;

    function updateModifier(component) {
        const selectedComponentId = componentSelects[component].value;
        const modifier = parseFloat(componentModifiers[selectedComponentId]) || 0;

        modifierDisplays[component].textContent = modifier > 0 ? `+${modifier}` : (modifier < 0 ? `${modifier}` : '');
    }

    function updateAllModifiers() {
        for (const component in componentSelects) {
            updateModifier(component);
        }
    }

    for (const component in componentSelects) {
        if (componentSelects[component]) {
            componentSelects[component].addEventListener('change', function() {
                updateAllModifiers();
            });
            
            updateModifier(component);
        }
    }

    updateAllModifiers();
}

document.addEventListener('DOMContentLoaded', initializeModifierUpdate);
