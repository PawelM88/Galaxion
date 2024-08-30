function initializeCostUpdate() {
    const componentSelects = {
        'armor': document.querySelector('#user_spaceship_armor'),
        'cockpit': document.querySelector('#user_spaceship_cockpit'),
        'defenceSystem': document.querySelector('#user_spaceship_defenceSystem'),
        'energyShield': document.querySelector('#user_spaceship_energyShield'),
        'energyWeapon': document.querySelector('#user_spaceship_energyWeapon'),
        'engine': document.querySelector('#user_spaceship_engine'),
        'rocketWeapon': document.querySelector('#user_spaceship_rocketWeapon')
    };

    const costDisplays = {
        'armor': document.getElementById('armor-cost'),
        'cockpit': document.getElementById('cockpit-cost'),
        'defenceSystem': document.getElementById('defenceSystem-cost'),
        'energyShield': document.getElementById('energyShield-cost'),
        'energyWeapon': document.getElementById('energyWeapon-cost'),
        'engine': document.getElementById('engine-cost'),
        'rocketWeapon': document.getElementById('rocketWeapon-cost')
    };

    const componentCosts = window.componentCostsData;

    function updateCost(component) {
        const selectedComponentId = componentSelects[component].value;
        const cost = parseFloat(componentCosts[selectedComponentId]) || 0;
        costDisplays[component].textContent = cost;
        return cost;
    }

    function updateTotalCost() {
        let totalCost = 0;
        for (const component in componentSelects) {
            totalCost += updateCost(component);
        }
        document.getElementById('total-cost').textContent = totalCost;
    }

    for (const component in componentSelects) {
        if (componentSelects[component]) {
            componentSelects[component].addEventListener('change', function() {
                updateTotalCost();
            });
            
            updateCost(component);
        }
    }
    
    updateTotalCost();
}

document.addEventListener('DOMContentLoaded', initializeCostUpdate);
document.addEventListener('turbo:load', initializeCostUpdate);