window.addEventListener('load', function() {
    const saveButton = document.getElementById('user_spaceship_save');
    const availablePointsElement = document.getElementById('available-points');
    const totalCostElement = document.getElementById('total-cost');

    if (!saveButton || !availablePointsElement || !totalCostElement) {
        console.error('Save button, available points, or total cost element not found!');
        return;
    }

    function checkIfCanSave() {
        const availablePoints = parseInt(availablePointsElement.textContent);
        const totalCost = parseInt(totalCostElement.textContent);

        if (availablePoints >= totalCost) {
            saveButton.removeAttribute('disabled');
        } else {
            saveButton.setAttribute('disabled', 'disabled');
        }
    }

    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'childList' || mutation.type === 'characterData') {
                checkIfCanSave();
            }
        });
    });

    observer.observe(totalCostElement, {
        childList: true,
        characterData: true,
        subtree: true
    });

    checkIfCanSave();
});